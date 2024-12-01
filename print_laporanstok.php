<?php
require_once 'module/connection/conn.php';

if(!isset($_SESSION["LOGINID_INV"])) {
    ?><script>alert('Silahkan login dahulu');</script><?php
    ?><script>document.location.href='index.php';</script><?php
    die(0);
}

$DATENOW = date("d-m-Y H:i:s");

// Include the main TCPDF library (search for installation path).
require_once('assets/tcpdf/tcpdf.php');

if (isset($_GET['DATEA']) && isset($_GET['DATEB']) && isset($_GET['ID_KATEGORI']) && isset($_GET['ID_BARANG']) && isset($_GET['NO_BATCH'])) {
    $DATEA = $_GET['DATEA'];
    $DATEB = $_GET['DATEB'];
    $ID_KATEGORI = $_GET['ID_KATEGORI'];
    $ID_BARANG = $_GET['ID_BARANG'];
    $NO_BATCH = $_GET['NO_BATCH'];
    $USER = $_SESSION['LOGINUS_INV'];

    // Extend the TCPDF class to create custom header and footer
    class MYPDF extends TCPDF {

        // Page header
        public function Header() {
            global $DATEA, $DATEB;
        
            // Title
            $this->SetFont('helvetica', 'BU', 18);
            $this->Cell(0, 10, 'Laporan Stok Material', 0, 1, 'C'); // Centered title
        
            // Date range
            $this->SetFont('helvetica', '', 10);
            $this->Cell(0, 10, 'Periode: ' . $DATEA . ' s.d ' . $DATEB, 0, 1, 'R'); // Right-aligned date
        
            // Line break to separate header content
            $this->Ln(5); // Reduce spacing if necessary
        
            // Table Header
            $this->SetFont('helvetica', 'B', 12); // Bold header
            $this->Cell(10, 10, 'No.', 1, 0, 'C'); 
            $this->Cell(30, 10, 'ID Transaksi', 1, 0, 'C');
            $this->Cell(20, 10, 'Tanggal', 1, 0, 'C');
            $this->Cell(40, 10, 'Kategori', 1, 0, 'C');
            $this->Cell(115, 10, 'Material', 1, 0, 'C');
            $this->Cell(30, 10, 'Masuk', 1, 0, 'C');
            $this->Cell(30, 10, 'Keluar', 1, 1, 'C'); // Move to the next line
        
            // Additional small line break
            $this->Ln(10); // Fine-tune the spacing here
        }                       

        // Page footer
        public function Footer() {
            global $USER;
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            
            // Select font
            $this->SetFont('helvetica', 'I', 8);
            
            // Print Date and Printed By in the footer
            $printDate = 'Printed on: ' . date("d-m-Y H:i:s");  // Current date and time
            $printedBy = 'Printed by: ' . ($USER ? $USER : 'Guest');  // Username from session or 'Guest' if not set
            
            // Footer content
            $this->Cell(0, 5, $printDate . ' | ' . $printedBy, 0, 1, 'L'); // Left aligned text
            $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . ' of ' . $this->getAliasNbPages(), 0, 0, 'C'); // Centered page number
        }
    }

    // Create new PDF document
    $pdf = new MYPDF();

    // Set document information
    $pdf->SetCreator('Your Creator');
    $pdf->SetAuthor('Your Author');
    $pdf->SetTitle('Laporan Stok Material');
    $pdf->SetSubject('Laporan Stok Material');

    // Set default header data (can be overridden in the custom header method)
    $pdf->SetHeaderData('', 0, '', '');

    // Set margins
    $pdf->SetMargins(10, 40, 10); // Left, top, right margins
    $pdf->SetHeaderMargin(5); // Header margin
    $pdf->SetFooterMargin(10); // Footer margin

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 15);

    // Add a page
    $pdf->AddPage('L');
    
    $getBatch = "SELECT 
        b.ID_KATEGORI,
        g.NAMA_KATEGORI,
        b.ID_BARANG,
        b.NAMA_BARANG,
        COALESCE(d.NO_BATCH, '-') AS NO_BATCH
    FROM 
        m_barang b
    LEFT JOIN
        m_kategori g on b.ID_KATEGORI = g.ID_KATEGORI
    LEFT JOIN 
        t_persediaan d ON b.ID_BARANG = d.ID_BARANG
    LEFT JOIN 
        t_pemasukan m ON d.ID_TRANSAKSI = m.ID_PEMASUKAN
    LEFT JOIN 
        t_pengeluaran k ON d.ID_TRANSAKSI = k.ID_PENGELUARAN
    WHERE 
        b.ID_KATEGORI LIKE :ID_KATEGORI 
        AND b.ID_BARANG LIKE :ID_BARANG
        AND (d.NO_BATCH LIKE :NO_BATCH OR d.NO_BATCH IS NULL)
    GROUP BY 
        b.ID_BARANG, d.NO_BATCH
    ORDER BY 
        b.ID_BARANG, d.NO_BATCH";
    $paramsBatch = array(
        ":ID_KATEGORI" => '%' . $ID_KATEGORI . '%',
        ":ID_BARANG" => '%' . $ID_BARANG . '%',
        ":NO_BATCH" => '%' . $NO_BATCH . '%'
    );
    $getBatch = GetQuery2($getBatch, $paramsBatch);

    foreach ($getBatch as $dataBatch) {
        extract($dataBatch);
        
        $rowNumber = 1; // Initialize row number

        $getSaldo = "SELECT CASE 
        WHEN SUM(CASE WHEN DATE(m.TANGGAL_MASUK) < :DATEA AND m.ID_PEMASUKAN IS NOT NULL THEN d.QTY ELSE 0 END) <= 0 
        THEN '' 
        ELSE SUM(CASE WHEN DATE(m.TANGGAL_MASUK) < :DATEA AND m.ID_PEMASUKAN IS NOT NULL THEN d.QTY ELSE 0 END) 
        END AS SALDO_AWAL_DEBIT,
        
        CASE 
            WHEN SUM(CASE WHEN DATE(k.TANGGAL_KELUAR) < :DATEA AND k.ID_PENGELUARAN IS NOT NULL THEN d.QTY ELSE 0 END) >= 0 
            THEN '' 
            ELSE ABS(SUM(CASE WHEN DATE(k.TANGGAL_KELUAR) < :DATEA AND k.ID_PENGELUARAN IS NOT NULL THEN d.QTY ELSE 0 END)) 
        END AS SALDO_AWAL_KREDIT
        FROM t_persediaan d
        LEFT JOIN t_pemasukan m ON d.ID_TRANSAKSI = m.ID_PEMASUKAN AND DATE(m.TANGGAL_MASUK) < :DATEA AND m.STATUS = 1
        LEFT JOIN t_pengeluaran k ON d.ID_TRANSAKSI = k.ID_PENGELUARAN AND DATE(k.TANGGAL_KELUAR) < :DATEA AND k.STATUS = 1
        LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
        LEFT JOIN m_kategori g ON b.ID_KATEGORI = g.ID_KATEGORI
        WHERE g.ID_KATEGORI = '$ID_KATEGORI' AND d.ID_BARANG = '$ID_BARANG' AND d.STATUS = 1 AND d.NO_BATCH = '$NO_BATCH'";

        $getBarang = "SELECT d.ID_TRANSAKSI,IFNULL(m.TANGGAL_MASUK,k.TANGGAL_KELUAR) TANGGAL,g.NAMA_KATEGORI,b.NAMA_BARANG,CASE WHEN d.QTY < 0 THEN '' ELSE d.QTY END Debit,CASE WHEN d.QTY > 0 THEN '' ELSE REPLACE(d.QTY,'-','') END Kredit FROM t_persediaan d
        LEFT JOIN t_pemasukan m ON d.ID_TRANSAKSI = m.ID_PEMASUKAN AND DATE(m.TANGGAL_MASUK) BETWEEN :DATEA AND :DATEB AND m.`STATUS` = 1
        LEFT JOIN t_pengeluaran k ON d.ID_TRANSAKSI = k.ID_PENGELUARAN AND DATE(k.TANGGAL_KELUAR) BETWEEN :DATEA AND :DATEB AND k.`STATUS` = 1
        LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
        LEFT JOIN m_kategori g ON b.ID_KATEGORI = g.ID_KATEGORI
        WHERE g.ID_KATEGORI = '$ID_KATEGORI' AND d.ID_BARANG = :ID_BARANG AND d.NO_BATCH = :NO_BATCH AND d.`STATUS` = 1 AND (m.TANGGAL_MASUK IS NOT NULL OR k.TANGGAL_KELUAR IS NOT NULL)";

        $getSaldoAkhir = "SELECT CASE WHEN IFNULL(SUM(d.QTY), 0) < 0 THEN '' ELSE IFNULL(SUM(d.QTY), 0) END SALDO_AKHIR_DEBIT,CASE WHEN IFNULL(SUM(d.QTY), 0) > 0 THEN '' ELSE REPLACE(IFNULL(SUM(d.QTY), 0),'-','') END SALDO_AKHIR_KREDIT
        FROM t_persediaan d
        LEFT JOIN t_pemasukan m ON d.ID_TRANSAKSI = m.ID_PEMASUKAN AND DATE(m.TANGGAL_MASUK) BETWEEN :DATEA AND :DATEB AND m.STATUS = 1
        LEFT JOIN t_pengeluaran k ON d.ID_TRANSAKSI = k.ID_PENGELUARAN AND DATE(k.TANGGAL_KELUAR) BETWEEN :DATEA AND :DATEB AND k.STATUS = 1
        LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
        LEFT JOIN m_kategori g ON b.ID_KATEGORI = g.ID_KATEGORI
        WHERE g.ID_KATEGORI = '$ID_KATEGORI' AND d.ID_BARANG = '$ID_BARANG' AND d.STATUS = 1 AND d.NO_BATCH = '$NO_BATCH'";

        $paramsSaldo = array(
            ":DATEA" => $DATEA
        );

        $paramsBarang = array(
            ":DATEA" => $DATEA,
            ":DATEB" => $DATEB,
            ":ID_BARANG" => $ID_BARANG,
            ":NO_BATCH" => $NO_BATCH
        );

        $paramsSaldoAkhir = array(
            ":DATEA" => $DATEA,
            ":DATEB" => $DATEB
        );

        $getSaldo = GetQuery2($getSaldo, $paramsSaldo);
        $getBarang = GetQuery2($getBarang, $paramsBarang);
        $getSaldoAkhir = GetQuery2($getSaldoAkhir, $paramsSaldoAkhir);

        // Reset font for table content
        $pdf->SetFont('helvetica', 'B', 10);
    
        // Table content row$pdf->Cell(137.5, 10, $ID_BARANG . ' - ' . $NAMA_BARANG, 'LTR', 0, 'L');
        $pdf->Cell(137.5, 10, $ID_BARANG . ' - ' . $NAMA_BARANG, '', 0, 'L');
        $pdf->Cell(137.5, 10, 'Batch : ' . $NO_BATCH, '', 0, 'R');
        $pdf->Ln();
        
        // Reset font for table content
        $pdf->SetFont('helvetica', '', 10);

        foreach ($getSaldo as $dataSaldo) {
            extract($dataSaldo);
            $pdf->Cell(215, 10, 'BALANCE', 1, 0, 'R'); // Add border with alignment
            $pdf->Cell(30, 10, $SALDO_AWAL_DEBIT, 1, 0, 'R');
            $pdf->Cell(30, 10, $SALDO_AWAL_KREDIT, 1, 0, 'R');
        }
        
        $pdf->Ln();

        $pdf->SetFont('helvetica', '', size: 9);

        foreach ($getBarang as $dataBarang) {
            extract($dataBarang);
            $pdf->Cell(10, 10, $rowNumber.'.', 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(30, 10, $ID_TRANSAKSI, 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(20, 10, $TANGGAL, 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(40, 10, $NAMA_KATEGORI, 1, 0, 'C'); // Add border with alignment
            // $pdf->MultiCell(85, 10, $NAMA_BARANG, 1, 'L', false, 0);
            $pdf->MultiCell(115, 10, $NAMA_BARANG, 1, 'L', 0, 0, '', '', true, 0, false, true, 10, 'M');
            $pdf->Cell(30, 10, $Debit, 1, 0, 'R'); // Add border with alignment
            $pdf->Cell(30, 10, $Kredit, 1, 1, 'R'); // Add border with alignment

            $rowNumber++; // Increment row number
        }

        $pdf->SetFont('helvetica', '', 10);

        foreach ($getSaldoAkhir as $dataSaldoAkhir) {
            extract($dataSaldoAkhir);
            $pdf->Cell(215, 10, 'BALANCE', 1, 0, 'R'); // Add border with alignment
            $pdf->Cell(30, 10, $SALDO_AKHIR_DEBIT, 1, 0, 'R');
            $pdf->Cell(30, 10, $SALDO_AKHIR_KREDIT, 1, 0, 'R');
        }
        
        $pdf->Ln(20);
    }

    // Output the PDF to browser
    $pdf->Output('Laporan Stok ' . $NAMA_KATEGORI . ' ' . $DATEA . ' s.d ' . $DATEB . '.pdf', 'I');
}
?>
