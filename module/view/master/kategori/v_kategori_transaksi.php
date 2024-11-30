<?php
if (isset($_GET['id']) && $_GET['method'] == 'view') {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Lihat Data Kategori Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="kategori.php">Kategori Material</a></li>
                        <li class="active">Lihat Kategori Material</li>
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
                        <h3 class="panel-title">Form Kategori Material</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA_KATEGORI" value="<?= $NAMA_KATEGORI; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DESKRIPSI" value="<?= $DESKRIPSI; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="STATUS" value="<?= $STATUS_DETAIL; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <a href="kategori.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                <h4 class="title semibold">Ubah Data Kategori Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="kategori.php">Kategori Material</a></li>
                        <li class="active">Ubah Kategori Material</li>
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
                        <h3 class="panel-title">Form Kategori Material</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA_KATEGORI" placeholder="Nama Kategori" value="<?= $NAMA_KATEGORI; ?>" data-parsley-error-message="Mohon masukkan nama kategori" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DESKRIPSI" placeholder="Deskripsi" value="<?= $DESKRIPSI; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-5">
                                    <select name="STATUS" id="selectize-select" required="" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="1" <?php if ($STATUS == 1) echo 'selected'; ?>>Aktif</option>
                                        <option value="0" <?php if ($STATUS == 0) echo 'selected'; ?>>Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="kategori.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                <h4 class="title semibold">Tambah Data Kategori Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="kategori.php">Kategori Material</a></li>
                        <li class="active">Tambah Kategori Material</li>
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
                        <h3 class="panel-title">Form Kategori Material</h3>
                    </div>
                    <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Kategori</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA_KATEGORI" placeholder="Nama Kategori" value="" data-parsley-error-message="Mohon masukkan nama kategori" data-parsley-required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Deskripsi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DESKRIPSI" placeholder="Deskripsi" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="kategori.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
