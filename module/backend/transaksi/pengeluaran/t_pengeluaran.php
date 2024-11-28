<?php
if (isset($_GET['method']) && $_GET['method'] == 'delete') {
    require_once '../../../connection/conn.php';
    
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $ID_PENGELUARAN = $_GET['id'];
    $query = "DELETE FROM t_pengeluaran WHERE ID_PENGELUARAN = :ID_PENGELUARAN";
    $params = array(':ID_PENGELUARAN' => $ID_PENGELUARAN);
    $deletePengeluaran = GetQuery2($query, $params);

    $query2 = "DELETE FROM t_persediaan WHERE ID_TRANSAKSI = :ID_PENGELUARAN";
    $params2 = array(':ID_PENGELUARAN' => $ID_PENGELUARAN);
    $deletePersediaan = GetQuery2($query2, $params2);

    if ($deletePengeluaran->rowCount() > 0 && $deletePersediaan->rowCount() > 0) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>document.location.href='../../../../pengeluaran.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
} else {
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $query = "SELECT p.*,d.NO_BATCH,CASE WHEN d.DK = 'D' THEN 'Debit' ELSE 'Kredit' END DK_DESK,REPLACE(d.QTY,'-','') QTY,b.ID_BARANG,b.NAMA_BARANG,b.SATUAN,k.NAMA_KATEGORI,d.ID_PERSEDIAAN
            FROM t_pengeluaran p
            LEFT JOIN t_persediaan d ON p.ID_PENGELUARAN = d.ID_TRANSAKSI
            LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
            LEFT JOIN m_kategori k ON k.ID_KATEGORI = b.ID_KATEGORI
            WHERE p.`STATUS` = 1";
    $params = array();
    $getPemasukan = GetQuery2($query, $params);
    $rowPemasukan = $getPemasukan->fetchAll(PDO::FETCH_ASSOC);

    $kategori = "SELECT ID_KATEGORI,NAMA_KATEGORI FROM m_kategori WHERE STATUS = 1 ORDER BY NAMA_KATEGORI";
    $params = array();
    $getKategori = GetQuery2($kategori, $params);
    $rowKategori = $getKategori->fetchAll(PDO::FETCH_ASSOC);

    // Get Data for Edit or View
    if (isset($_GET['id'])) {
        // Update Data
        if (isset($_POST['simpan'])) {
            // Data Pengeluaran
            $ID_PENGELUARAN = $_GET['id'];
            $TANGGAL_KELUAR = $_POST['TANGGAL_KELUAR'];
            $NOMOR_MRIS = $_POST['NOMOR_MRIS'];
            $NAMA = $_POST['NAMA'];
            $OPERATING_UNIT = $_POST['OPERATING_UNIT'];
            $DIVISI = $_POST['DIVISI'];
            $BLOCK = $_POST['BLOCK'];
            $KETERANGAN_PENGELUARAN = $_POST['KETERANGAN_PENGELUARAN'];
            // Data Barang
            $ID_BARANG = $_POST['ID_BARANG'];
            $QTY = $_POST['QTY'];
            $NO_BATCH = $_POST['NO_BATCH'];
            $KETERANGAN_PERSEDIAAN = $_POST['KETERANGAN_PERSEDIAAN'];

            $QTY = $QTY * -1;


            // Update Query
            $query = "UPDATE t_pengeluaran SET TANGGAL_KELUAR = :TANGGAL_KELUAR, NOMOR_MRIS = :NOMOR_MRIS, NAMA = :NAMA, OPERATING_UNIT = :OPERATING_UNIT, DIVISI = :DIVISI, BLOCK = :BLOCK, KETERANGAN = :KETERANGAN, UPDATED_BY = :UPDATED_BY, UPDATED_DATE = NOW() WHERE ID_PENGELUARAN = :ID_PENGELUARAN";
            $params = array(
                ':ID_PENGELUARAN' => $ID_PENGELUARAN,
                ':TANGGAL_KELUAR' => $TANGGAL_KELUAR,
                ':NOMOR_MRIS' => $NOMOR_MRIS,
                ':NAMA' => $NAMA,
                ':OPERATING_UNIT' => $OPERATING_UNIT,
                ':DIVISI' => $DIVISI,
                ':BLOCK' => $BLOCK,
                ':KETERANGAN' => $KETERANGAN_PENGELUARAN,
                ':UPDATED_BY' => $ID_USER
            );
            $editPengeluaran = GetQuery2($query, $params);

            $query2 = "UPDATE t_persediaan SET ID_BARANG = :ID_BARANG, QTY = :QTY, NO_BATCH = :NO_BATCH, KETERANGAN = :KETERANGAN WHERE ID_TRANSAKSI = :ID_PENGELUARAN";
            $params2 = array(
                ':ID_PENGELUARAN' => $ID_PENGELUARAN,
                ':ID_BARANG' => $ID_BARANG,
                ':QTY' => $QTY,
                ':NO_BATCH' => $NO_BATCH,
                ':KETERANGAN' => $KETERANGAN_PERSEDIAAN
            );
            $updatePersediaan = GetQuery2($query2, $params2);

            // Check if the query executed successfully
            if ($editPengeluaran->rowCount() > 0) {
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>document.location.href='pengeluaran.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    } else { // Add Data
        if (isset($_POST['simpan'])) {
            // Data Pengeluaran
            $ID_PENGELUARAN = createKode('t_pengeluaran', 'ID_PENGELUARAN', 'KLR', 3);
            $TANGGAL_KELUAR = $_POST['TANGGAL_KELUAR'];
            $NOMOR_MRIS = $_POST['NOMOR_MRIS'];
            $NAMA = $_POST['NAMA'];
            $OPERATING_UNIT = $_POST['OPERATING_UNIT'];
            $DIVISI = $_POST['DIVISI'];
            $BLOCK = $_POST['BLOCK'];
            $KETERANGAN_PENGELUARAN = $_POST['KETERANGAN_PENGELUARAN'];
            // Data Barang
            $ID_BARANG = $_POST['ID_BARANG'];
            $QTY = $_POST['QTY'];
            $NO_BATCH = $_POST['NO_BATCH'];
            $KETERANGAN_PERSEDIAAN = $_POST['KETERANGAN_PERSEDIAAN'];

            $QTY = $QTY * -1;

            $getstok = GetQuery2("SELECT SUM(QTY) AS TOTAL_QTY FROM t_persediaan WHERE ID_BARANG = :ID_BARANG AND NO_BATCH = :NO_BATCH AND STATUS = 1", [':ID_BARANG' => $ID_BARANG, ':NO_BATCH' => $NO_BATCH]);
            $rowStok = $getstok->fetch(PDO::FETCH_ASSOC);
            $stok = $rowStok['TOTAL_QTY'];

            if ($stok + $QTY < 0) {
                echo "<script>alert('Stok tidak mencukupi');</script>";
                echo "<script>document.location.href='pengeluaran_transaksi.php';</script>";
                exit;
            }

            // Update Query
            $query = "INSERT INTO t_pengeluaran (ID_PENGELUARAN, TANGGAL_KELUAR, NOMOR_MRIS, NAMA, OPERATING_UNIT, DIVISI, BLOCK, KETERANGAN, CREATED_BY, CREATED_DATE) VALUES (:ID_PENGELUARAN, :TANGGAL_KELUAR, :NOMOR_MRIS, :NAMA, :OPERATING_UNIT, :DIVISI, :BLOCK, :KETERANGAN, :CREATED_BY, NOW())";
            $params = array(
                ':ID_PENGELUARAN' => $ID_PENGELUARAN,
                ':TANGGAL_KELUAR' => $TANGGAL_KELUAR,
                ':NOMOR_MRIS' => $NOMOR_MRIS,
                ':NAMA' => $NAMA,
                ':OPERATING_UNIT' => $OPERATING_UNIT,
                ':DIVISI' => $DIVISI,
                ':BLOCK' => $BLOCK,
                ':KETERANGAN' => $KETERANGAN_PENGELUARAN,
                ':CREATED_BY' => $ID_USER
            );
            $insertPemasukan = GetQuery2($query, $params);

            $query2 = "INSERT INTO t_persediaan (ID_PERSEDIAAN, ID_TRANSAKSI, ID_BARANG, DK, QTY, NO_BATCH, KETERANGAN) VALUES (:ID_PERSEDIAAN, :ID_TRANSAKSI, :ID_BARANG, :DK, :QTY, :NO_BATCH, :KETERANGAN)";
            $params2 = array(
                ':ID_PERSEDIAAN' => createKode('t_persediaan', 'ID_PERSEDIAAN', 'PSD', 3),
                ':ID_TRANSAKSI' => $ID_PENGELUARAN,
                ':ID_BARANG' => $ID_BARANG,
                ':DK' => 'K',
                ':QTY' => $QTY,
                ':NO_BATCH' => $NO_BATCH,
                ':KETERANGAN' => $KETERANGAN_PERSEDIAAN
            );
            $updatePersediaan = GetQuery2($query2, $params2);

            // Check if the query executed successfully
            if ($insertPemasukan->rowCount() > 0) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                echo "<script>document.location.href='pengeluaran.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    }
}
?>