<?php
require_once 'module/connection/conn.php';
include 'module/backend/loginprofil/login/t_login.php';
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
        <!-- START Template Main -->
        <section id="main" role="main">
            <?php include 'module/view/loginprofil/login/v_login.php'; ?>
        </section>
        <!--/ END Template Main -->

        <!-- START JAVASCRIPT SECTION (Load javascripts at bottom to reduce load time) -->
        <!-- Application and vendor script : mandatory -->
        <script type="text/javascript" src="../javascript/vendor.js"></script>
        <script type="text/javascript" src="../javascript/core.js"></script>
        <script type="text/javascript" src="../javascript/backend/app.js"></script>
        <!--/ Application and vendor script : mandatory -->

        <!-- Plugins and page level script : optional -->
        <script type="text/javascript" src="../javascript/pace.min.js"></script>
		<script type="text/javascript" src="../plugins/parsley/js/parsley.js"></script>
        <script type="text/javascript" src="../javascript/backend/pages/login.js"></script>
        <!--/ Plugins and page level script : optional -->
        <!--/ END JAVASCRIPT SECTION -->
    </body>
    <!--/ END Body -->
</html>