<?php
if ($_SESSION['LOGINAKS_INV'] == "Admin") {
    include "menu/admin.php";
}
if ($_SESSION['LOGINAKS_INV'] == "Pegawai Gudang") {
    include "menu/pegawai.php";
}
if ($_SESSION['LOGINAKS_INV'] == "Kepala Gudang") {
    include "menu/kepala.php";
}
?>