<?php
if (isset($_GET['method']) && $_GET['method'] == 'delete') {
    require_once '../../../connection/conn.php';
    
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $ID_PEMASUKAN = $_GET['id'];
    $query = "DELETE FROM t_pemasukan WHERE ID_PEMASUKAN = :ID_PEMASUKAN";
    $params = array(':ID_PEMASUKAN' => $ID_PEMASUKAN);
    $deletePemasukan = GetQuery2($query, $params);

    $query2 = "DELETE FROM t_persediaan WHERE ID_TRANSAKSI = :ID_PEMASUKAN";
    $params2 = array(':ID_PEMASUKAN' => $ID_PEMASUKAN);
    $deletePersediaan = GetQuery2($query2, $params2);
    

    if ($deletePemasukan->rowCount() > 0 && $deletePersediaan->rowCount() > 0) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>document.location.href='../../../../pemasukan.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
} else {
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $query = "SELECT m.*,d.NO_BATCH,CASE WHEN d.DK = 'D' THEN 'Debit' ELSE 'Kredit' END DK_DESK,d.QTY,b.ID_BARANG,b.NAMA_BARANG,b.SATUAN,k.NAMA_KATEGORI
            FROM t_pemasukan m
            LEFT JOIN t_persediaan d ON m.ID_PEMASUKAN = d.ID_TRANSAKSI
            LEFT JOIN m_barang b ON d.ID_BARANG = b.ID_BARANG
            LEFT JOIN m_kategori k ON k.ID_KATEGORI = b.ID_KATEGORI
            WHERE m.`STATUS` = 1";
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
            $ID_PEMASUKAN = $_GET['id'];
            $TANGGAL_MASUK = $_POST['TANGGAL_MASUK'];
            $NOMOR_PO = $_POST['NOMOR_PO'];
            $KETERANGAN_PEMASUKAN = $_POST['KETERANGAN_PEMASUKAN'];
            $ID_BARANG = $_POST['ID_BARANG'];
            $QTY = $_POST['QTY'];
            $NO_BATCH = $_POST['NO_BATCH'];
            $KETERANGAN_PERSEDIAAN = $_POST['KETERANGAN_PERSEDIAAN'];
            if (isset($_POST['EXPIRATION'])) {
                $EXPIRATION = $_POST['EXPIRATION'];
            } else {
                $EXPIRATION = NULL;
            }


            // Update Query
            $query = "UPDATE t_pemasukan SET TANGGAL_MASUK = :TANGGAL_MASUK, NOMOR_PO = :NOMOR_PO, KETERANGAN = :KETERANGAN, UPDATED_BY = :UPDATED_BY, UPDATED_DATE = NOW() WHERE ID_PEMASUKAN = :ID_PEMASUKAN";
            $params = array(
                ':ID_PEMASUKAN' => $ID_PEMASUKAN,
                ':TANGGAL_MASUK' => $TANGGAL_MASUK,
                ':NOMOR_PO' => $NOMOR_PO,
                ':KETERANGAN' => $KETERANGAN_PEMASUKAN,
                ':UPDATED_BY' => $ID_USER
            );
            $editPemasukan = GetQuery2($query, $params);

            $query2 = "UPDATE t_persediaan SET ID_BARANG = :ID_BARANG, QTY = :QTY, EXPIRATION = :EXPIRATION, NO_BATCH = :NO_BATCH, KETERANGAN = :KETERANGAN WHERE ID_TRANSAKSI = :ID_PEMASUKAN";
            $params2 = array(
                ':ID_PEMASUKAN' => $ID_PEMASUKAN,
                ':ID_BARANG' => $ID_BARANG,
                ':QTY' => $QTY,
                ':EXPIRATION' => $EXPIRATION,
                ':NO_BATCH' => $NO_BATCH,
                ':KETERANGAN' => $KETERANGAN_PERSEDIAAN
            );
            $updatePersediaan = GetQuery2($query2, $params2);

            // Check if the query executed successfully
            if ($editPemasukan->rowCount() > 0) {
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>document.location.href='pemasukan.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    } else { // Add Data
        if (isset($_POST['simpan'])) {
            $ID_PEMASUKAN = createKode('t_pemasukan', 'ID_PEMASUKAN', 'MSK', 3);
            $TANGGAL_MASUK = $_POST['TANGGAL_MASUK'];
            $NOMOR_PO = $_POST['NOMOR_PO'];
            $KETERANGAN_PEMASUKAN = $_POST['KETERANGAN_PEMASUKAN'];
            $ID_BARANG = $_POST['ID_BARANG'];
            $QTY = $_POST['QTY'];
            $EXPIRATION = $_POST['EXPIRATION'];
            $NO_BATCH = $_POST['NO_BATCH'];
            $KETERANGAN_PERSEDIAAN = $_POST['KETERANGAN_PERSEDIAAN'];
            if ($_POST['EXPIRATION'] != '') {
                $EXPIRATION = $_POST['EXPIRATION'];
            } else {
                $EXPIRATION = NULL;
            }

            // Update Query
            $query = "INSERT INTO t_pemasukan (ID_PEMASUKAN, TANGGAL_MASUK, NOMOR_PO, KETERANGAN, CREATED_BY, CREATED_DATE) VALUES (:ID_PEMASUKAN, :TANGGAL_MASUK, :NOMOR_PO, :KETERANGAN, :CREATED_BY, NOW())";
            $params = array(
                ':ID_PEMASUKAN' => $ID_PEMASUKAN,
                ':TANGGAL_MASUK' => $TANGGAL_MASUK,
                ':NOMOR_PO' => $NOMOR_PO,
                ':KETERANGAN' => $KETERANGAN_PEMASUKAN,
                ':CREATED_BY' => $ID_USER
            );
            $insertPemasukan = GetQuery2($query, $params);

            $query2 = "INSERT INTO t_persediaan (ID_PERSEDIAAN, ID_TRANSAKSI, ID_BARANG, DK, QTY, EXPIRATION, NO_BATCH, KETERANGAN) VALUES (:ID_PERSEDIAAN, :ID_TRANSAKSI, :ID_BARANG, :DK, :QTY, :EXPIRATION, :NO_BATCH, :KETERANGAN)";
            $params2 = array(
                ':ID_PERSEDIAAN' => createKode('t_persediaan', 'ID_PERSEDIAAN', 'PSD', 3),
                ':ID_TRANSAKSI' => $ID_PEMASUKAN,
                ':ID_BARANG' => $ID_BARANG,
                ':DK' => 'D',
                ':QTY' => $QTY,
                ':EXPIRATION' => $EXPIRATION,
                ':NO_BATCH' => $NO_BATCH,
                ':KETERANGAN' => $KETERANGAN_PERSEDIAAN
            );
            $updatePersediaan = GetQuery2($query2, $params2);

            // Check if the query executed successfully
            if ($insertPemasukan->rowCount() > 0) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                echo "<script>document.location.href='pemasukan.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    }
}
?>