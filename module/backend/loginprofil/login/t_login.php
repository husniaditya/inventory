<?php

$USERNAME="";
$PASSWORD="";

if(isset($_POST["login"]))
{
    $USERNAME = $_POST["USERNAME"];
    $PASSWORD = $_POST['PASSWORD'];

    $query = "SELECT * FROM m_user WHERE USERNAME = ? AND STATUS = 1";
    // Execute the query without parameters
    $getUser =  GetQuery2($query, [$USERNAME]);
    $rowUser = $getUser->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rowUser as $row) {
        extract($row);
    }

    if ($STATUS == 1 && password_verify($PASSWORD, $USERPASSWORD)) {
        $_SESSION["LOGINID_INV"] = $ID_USER;
        $_SESSION["LOGINUS_INV"] = $USERNAME;
        $_SESSION["LOGINNAMA_INV"] = $NAMA;
        $_SESSION["LOGINAKS_INV"] = $AKSES;

        ?><script>document.location.href='dashboard.php';</script><?php
        die(0);
    } else {
        ?><script>alert('Username atau password salah');</script><?php
        ?><script>document.location.href='index.php';</script><?php
        die(0);
    }

}
?>