<?php
require_once 'module/connection/conn.php';

if(!isset($_SESSION["LOGINID_INV"]))
{
    ?><script>alert('Silahkan login dahulu');</script><?php
    ?><script>document.location.href='index.php';</script><?php
    die(0);
}

if ($_SESSION["LOGINAKS_INV"] != "KTU") {
    ?><script>alert('Anda tidak memiliki akses ke halaman ini');</script><?php
    ?><script>document.location.href='dashboard.php';</script><?php
    die(0);
}

include 'module/backend/master/barang/t_barang.php';
?>

<!DOCTYPE html>
<html class="backend">
    <!-- START Head -->
    <head>
        <?php include 'module/head.php'; ?>
    </head>
    <!--/ END Head -->

    <!-- START Body -->
    <body>
        <!-- START Template Header -->
        <header id="header" class="navbar">
            <?php include 'module/header.php'; ?>
        </header>
        <!--/ END Template Header -->

        <!-- START Template Sidebar (Left) -->
        <aside class="sidebar sidebar-left sidebar-menu">
            <?php include 'module/sidebar.php'; ?>
        </aside>
        <!--/ END Template Sidebar (Left) -->

        <!-- START Template Main -->
        <section id="main" role="main">
            <?php include 'module/view/master/barang/v_barang.php'; ?>
        </section>
        <br><br>
        <!--/ END Template Main -->

        <!-- START Template Footer -->
        <footer id="footer">
            <?php include 'module/footer.php'; ?>
        </footer>
        <!--/ END Template Footer -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <?php include 'module/js.php'; ?>
        <script type="text/javascript" src="js/master/barang/barang.js"></script>
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>