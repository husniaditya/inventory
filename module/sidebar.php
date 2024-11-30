
<!-- START Sidebar Content -->
<section class="content slimscroll">
    <!-- START Template Navigation/Menu -->
    <ul class="topmenu topmenu-responsive" data-toggle="menu">
        <li>
            <a href="dashboard.php" data-target="#dashboard" data-parent=".topmenu">
                <span class="figure"><i class="ico-home2"></i></span>
                <span class="text">Dashboard</span>
            </a>
        </li>
        <?php
        if ($_SESSION["LOGINAKS_INV"] == "Admin") {
            ?>
            <li >
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#master" data-parent=".topmenu">
                    <span class="figure"><i class="ico-grid"></i></span>
                    <span class="text">Master</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="master" class="submenu collapse ">
                    <li class="submenu-header ellipsis">Master</li>
                    <li >
                        <a href="pengguna.php">
                            <span class="text">Pengguna</span>
                        </a>
                    </li>
                    <li >
                        <a href="kategori.php">
                            <span class="text">Kategori Material</span>
                        </a>
                    </li>
                    <li >
                        <a href="barang.php">
                            <span class="text">Material</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <?php
        }
        if ($_SESSION["LOGINAKS_INV"] == "Admin" || $_SESSION["LOGINAKS_INV"] == "Pegawai Gudang") {
            ?>
            <li >
                <a href="javascript:void(0);" data-toggle="submenu" data-target="#transaksi" data-parent=".topmenu">
                    <span class="figure"><i class="ico-file"></i></span>
                    <span class="text">Transaksi</span>
                    <span class="arrow"></span>
                </a>
                <!-- START 2nd Level Menu -->
                <ul id="transaksi" class="submenu collapse">
                    <li class="submenu-header ellipsis">Transaksi</li>
                    <li>
                        <a href="pemasukan.php">
                            <span class="text">Pemasukan Material</span>
                        </a>
                    </li>
                    <li >
                        <a href="pengeluaran.php">
                            <span class="text">Pengeluaran Material</span>
                        </a>
                    </li>
                </ul>
                <!--/ END 2nd Level Menu -->
            </li>
            <?php
        }
        ?>
        <li >
            <a href="javascript:void(0);" data-toggle="submenu" data-target="#laporan" data-parent=".topmenu">
                <span class="figure"><i class="ico-copy4"></i></span>
                <span class="text">Laporan</span>
                <span class="arrow"></span>
            </a>
            <!-- START 2nd Level Menu -->
            <ul id="laporan" class="submenu collapse ">
                <li class="submenu-header ellipsis">Laporan</li>
                <li >
                    <a href="laporanpemasukan.php">
                        <span class="text">Laporan Pemasukan </span>
                    </a>
                </li>
                <li >
                    <a href="laporanpengeluaran.php">
                        <span class="text">Laporan Pengeluaran</span>
                    </a>
                </li>
                <li >
                    <a href="laporanstok.php">
                        <span class="text">Laporan Stok</span>
                    </a>
                </li>
            </ul>
            <!--/ END 2nd Level Menu -->
        </li>
    </ul>
    <!--/ END Template Navigation/Menu -->
</section>
<!--/ END Sidebar Container -->
