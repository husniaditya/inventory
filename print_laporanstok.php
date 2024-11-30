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
            // Select font
            $this->SetFont('helvetica', 'BU', 18);
            
            // Add a logo (optional)
            // $this->Image('logo.png', 10, 10, 30); // Example image path
            
            // Title
            $this->Cell(0, 10, 'Laporan Stok Material', 0, 1, 'C'); // Centered title
            
            // Date and time at the right
            $this->SetFont('helvetica', '', 10);
            $this->Cell(0, 10, 'Periode: ' . $DATEA . ' s.d ' . $DATEB, 0, 1, 'R'); // Right aligned date
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
    $pdf->SetMargins(10, 30, 10); // Left, top, right margins
    $pdf->SetHeaderMargin(5); // Header margin
    $pdf->SetFooterMargin(10); // Footer margin

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, 15);

    // Add a page
    $pdf->AddPage('L');

    // Content of the page
    $pdf->SetFont('helvetica', '', 12);

    // Table Header - Set fonts and alignment
    $pdf->SetFont('helvetica', 'B', 12); // Bold header
    $pdf->Cell(20, 10, 'No.', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(40, 10, 'ID Transaksi', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(30, 10, 'Tanggal', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(40, 10, 'Kategori', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(85, 10, 'Material', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(30, 10, 'Masuk', 1, 0, 'C'); // Add border with alignment
    $pdf->Cell(30, 10, 'Keluar', 1, 1, 'C'); // Add border with alignment

    
    $getBatch = "SELECT b.ID_KATEGORI,b.ID_BARANG, b.NAMA_BARANG, d.NO_BATCH 
    FROM t_persediaan d
    LEFT JOIN t_pemasukan m ON d.ID_TRANSAKSI = m.ID_PEMASUKAN AND m.TANGGAL_MASUK BETWEEN :DATEA AND :DATEB AND m.STATUS = 1
    LEFT JOIN t_pengeluaran k ON d.ID_TRANSAKSI = k.ID_PENGELUARAN AND k.TANGGAL_KELUAR BETWEEN :DATEA AND :DATEB AND k.STATUS = 1
    LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
    WHERE b.ID_KATEGORI LIKE :ID_KATEGORI AND d.ID_BARANG LIKE :ID_BARANG  AND d.STATUS = 1 AND d.NO_BATCH LIKE :NO_BATCH 
    GROUP BY b.ID_BARANG, d.NO_BATCH
    ORDER BY b.ID_BARANG, d.NO_BATCH";
    $paramsBatch = array(
        ":ID_KATEGORI" => "%" . $ID_KATEGORI . "%",
        ":ID_BARANG" => "%" . $ID_BARANG . "%",
        ":NO_BATCH" => "%" . $NO_BATCH . "%",
        ":DATEA" => $DATEA,
        ":DATEB" => $DATEB
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
            $pdf->Cell(20, 10, $rowNumber.'.', 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(40, 10, $ID_TRANSAKSI, 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(30, 10, $TANGGAL, 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(40, 10, $NAMA_KATEGORI, 1, 0, 'C'); // Add border with alignment
            $pdf->Cell(85, 10, $NAMA_BARANG, 1, 0, 'L'); // Add border with alignment
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
    $pdf->Output('example.pdf', 'I');
}
?>
