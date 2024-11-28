<?php
if (isset($_GET['method']) && $_GET['method'] == 'delete') {
    require_once '../../../connection/conn.php';
    
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $ID_BARANG = $_GET['id'];
    $query = "DELETE FROM m_barang WHERE ID_BARANG = :ID_BARANG";
    $params = array(':ID_BARANG' => $ID_BARANG);
    $deleteKategori = GetQuery2($query, $params);

    if ($deleteKategori->rowCount() > 0) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>document.location.href='../../../../barang.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');</script>";
    }
} else {
    $ID_USER = $_SESSION['LOGINUS_INV'];

    $query = "SELECT b.*,CASE WHEN b.STATUS = 1 THEN 'Aktif' ELSE 'Tidak Aktif' END STATUS_DETAIL,k.NAMA_KATEGORI
            FROM m_barang b 
            LEFT JOIN m_kategori k ON b.ID_KATEGORI = k.ID_KATEGORI
            WHERE b.STATUS = 1";
    $params = array();
    $getBarang = GetQuery2($query, $params);
    $rowBarang = $getBarang->fetchAll(PDO::FETCH_ASSOC);

    $kategori = "SELECT ID_KATEGORI,NAMA_KATEGORI FROM m_kategori WHERE STATUS = 1";
    $params = array();
    $getKategori = GetQuery2($kategori, $params);
    $rowKategori = $getKategori->fetchAll(PDO::FETCH_ASSOC);

    // Get Data for Edit or View
    if (isset($_GET['id'])) {
        $ID_BARANG = $_GET['id'];
        $query = "SELECT b.*,CASE WHEN b.STATUS = 1 THEN 'Aktif' ELSE 'Tidak Aktif' END STATUS_DETAIL,k.NAMA_KATEGORI, b.ID_KATEGORI ID_KATEGORI_EDIT
            FROM m_barang b 
            LEFT JOIN m_kategori k ON b.ID_KATEGORI = k.ID_KATEGORI
            WHERE b.STATUS = 1 AND b.ID_BARANG = :ID_BARANG";
        $params = array(':ID_BARANG' => $ID_BARANG);
        $getBarang = GetQuery2($query, $params);
        $rowBarang = $getBarang->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rowBarang as $row) {
            extract($row);
        }

        // Update Data
        if (isset($_POST['simpan'])) {
            $ID_KATEGORI = $_POST['ID_KATEGORI'];
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $DESKRIPSI = $_POST['DESKRIPSI'];
            $SATUAN = $_POST['SATUAN'];
            $STATUS = $_POST['STATUS'];

            // Update Query
            $query = "UPDATE m_barang SET ID_KATEGORI = :ID_KATEGORI, NAMA_BARANG = :NAMA_BARANG, DESKRIPSI = :DESKRIPSI, SATUAN = :SATUAN, STATUS = :STATUS, UPDATED_BY = :UPDATED_BY, UPDATED_DATE = NOW() WHERE ID_BARANG = :ID_BARANG";
            $params = array(
                ':ID_KATEGORI' => $ID_KATEGORI,
                ':NAMA_BARANG' => $NAMA_BARANG,
                ':DESKRIPSI' => $DESKRIPSI,
                ':SATUAN' => $SATUAN,
                ':STATUS' => $STATUS,
                ':UPDATED_BY' => $ID_USER,
                ':ID_BARANG' => $ID_BARANG
            );
            $editTingkatan = GetQuery2($query, $params);

            // Check if the query executed successfully
            if ($editTingkatan->rowCount() > 0) {
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>document.location.href='barang.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    } else { // Add Data
        if (isset($_POST['simpan'])) {
            $ID_KATEGORI = $_POST['ID_KATEGORI'];
            $ID_BARANG = KodeBarang('m_barang', 'ID_BARANG', 'BRG', 3, $ID_KATEGORI);
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $DESKRIPSI = $_POST['DESKRIPSI'];
            $SATUAN = $_POST['SATUAN'];

            // Update Query
            $query = "INSERT INTO m_barang (ID_BARANG, ID_KATEGORI, NAMA_BARANG, DESKRIPSI, SATUAN, CREATED_BY, CREATED_DATE) VALUES (:ID_BARANG, :ID_KATEGORI, :NAMA_BARANG, :DESKRIPSI, :SATUAN, :CREATED_BY, NOW())";
            $params = array(
                ':ID_BARANG' => $ID_BARANG,
                ':ID_KATEGORI' => $ID_KATEGORI,
                ':NAMA_BARANG' => $NAMA_BARANG,
                ':DESKRIPSI' => $DESKRIPSI,
                ':SATUAN' => $SATUAN,
                ':CREATED_BY' => $ID_USER
            );
            $editTingkatan = GetQuery2($query, $params);

            // Check if the query executed successfully
            if ($editTingkatan->rowCount() > 0) {
                echo "<script>alert('Data berhasil ditambahkan');</script>";
                echo "<script>document.location.href='barang.php';</script>";
            } else {
                echo "<script>alert('Data gagal diubah');</script>";
            }
        }
    }
}
?>