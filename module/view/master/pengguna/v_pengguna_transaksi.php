<?php
if (isset($_GET['id']) && $_GET['method'] == 'view') {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Ubah Data Pengguna</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengguna.php"> Pengguna</a></li>
                        <li class="active">Ubah Pengguna</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <!-- make a input form for kategori barang -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Pengguna</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="USERNAME" placeholder="Username" value="<?= $USERNAME; ?>" data-parsley-error-message="Mohon masukkan username" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="password" name="USERPASSWORD" placeholder="Password" value="" data-parsley-error-message="Mohon masukkan password" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" placeholder="Nama" value="<?= $NAMA; ?>" data-parsley-error-message="Mohon masukkan nama" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="email" name="EMAIL" placeholder="Email" value="<?= $EMAIL; ?>" data-parsley-error-message="Mohon masukkan email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Akses Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="AKSES" placeholder="Email" value="<?= $AKSES; ?>" data-parsley-error-message="Mohon masukkan email" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="STATUS" placeholder="Email" value="<?= $STATUS; ?>" data-parsley-error-message="Mohon masukkan email" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="pengguna.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ END row -->
    </div>
    <!--/ END Template Container -->
    <?php
}
elseif (isset($_GET['id']) && $_GET['method'] == 'edit') {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Ubah Data Pengguna</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengguna.php"> Pengguna</a></li>
                        <li class="active">Ubah Pengguna</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <!-- make a input form for kategori barang -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Pengguna</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="USERNAME" placeholder="Username" value="<?= $USERNAME; ?>" data-parsley-error-message="Mohon masukkan username" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="password" name="USERPASSWORD" placeholder="Password" value="" data-parsley-error-message="Mohon masukkan password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" placeholder="Nama" value="<?= $NAMA; ?>" data-parsley-error-message="Mohon masukkan nama" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="email" name="EMAIL" placeholder="Email" value="<?= $EMAIL; ?>" data-parsley-error-message="Mohon masukkan email" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Akses Pengguna</label>
                                <div class="col-sm-5">
                                    <select name="AKSES" id="selectize-select" class="form-control" data-parsley-error-message="Mohon pilih akses pengguna" data-parsley-required>
                                        <option value="">-- Pilih Akses --</option>
                                        <option value="Admin" <?php if ($AKSES == "Admin") echo "selected"; ?>>Admin</option>
                                        <option value="Pegawai Gudang" <?php if ($AKSES == "Pegawai Gudang") echo "selected"; ?>>Pegawai Gudang</option>
                                        <option value="Kepala Gudang" <?php if ($AKSES == "Kepala Gudang") echo "selected"; ?>>Kepala Gudang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status Pengguna</label>
                                <div class="col-sm-5">
                                    <select name="STATUS" id="selectize-select" class="form-control" data-parsley-error-message="Mohon pilih akses pengguna" data-parsley-required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1" <?php if ($STATUS == "1") echo "selected"; ?>>Aktif</option>
                                        <option value="0" <?php if ($STATUS == "0") echo "selected"; ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="pengguna.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ END row -->
    </div>
    <!--/ END Template Container -->
    <?php
}
else {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Tambah Data Pengguna</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengguna.php"> Pengguna</a></li>
                        <li class="active">Tambah Pengguna</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->

        <!-- START row -->
        <div class="row">
            <!-- make a input form for kategori barang -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Pengguna</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="USERNAME" placeholder="Username" value="" data-parsley-error-message="Mohon masukkan username" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="password" name="USERPASSWORD" placeholder="Password" value="" data-parsley-error-message="Mohon masukkan password" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" placeholder="Nama" value="" data-parsley-error-message="Mohon masukkan nama" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email Pengguna</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="email" name="EMAIL" placeholder="Email" value="" data-parsley-error-message="Mohon masukkan email" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Akses Pengguna</label>
                                <div class="col-sm-5">
                                    <select name="AKSES" id="selectize-select" class="form-control" data-parsley-error-message="Mohon pilih akses pengguna" data-parsley-required>
                                        <option value="">-- Pilih Akses --</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Pegawai Gudang">Pegawai Gudang</option>
                                        <option value="Kepala Gudang">Kepala Gudang</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="pengguna.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/ END row -->
    </div>
    <!--/ END Template Container -->
    <?php
}
?>

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
<!--/ END To Top Scroller -->
