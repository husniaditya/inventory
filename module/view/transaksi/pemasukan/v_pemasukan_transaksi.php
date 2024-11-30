<?php
if (isset($_GET['id']) && $_GET['method'] == 'view') {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Lihat Pemasukan Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pemasukan.php"> Pemasukan Material</a></li>
                        <li class="active">Lihat Pemasukan Material</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->x
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pemasukan</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID Pemasukan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="ID_PEMASUKAN" name="ID_PEMASUKAN" value="" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pemasukan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="TANGGAL_MASUK" name="TANGGAL_MASUK" value="" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor PO</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="NOMOR_PO" name="NOMOR_PO" value="" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PEMASUKAN" id="KETERANGAN_PEMASUKAN" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Material</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Material</label>
                                <div class="col-sm-5">
                                <input class="form-control" type="text" name="ID_KATEGORI" id="ID_KATEGORI" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Material</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="ID_BARANG" id="ID_BARANG" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="SATUAN" id="SATUAN" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="EXPIRATION" name="EXPIRATION" value="" readonly/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Batch</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NO_BATCH" id="NO_BATCH" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QTY</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" name="QTY" id="QTY" placeholder="Qty" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PERSEDIAAN" id="KETERANGAN_PERSEDIAAN" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                            <div class="col-sm-9 col-sm-offset-2">
                                <a href="pemasukan.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!--/ END row -->
        </form>
    </div>
    <!--/ END Template Container -->
    <?php
}
elseif (isset($_GET['id']) && $_GET['method'] == 'edit') {
    if ($_SESSION["LOGINAKS_INV"] != "Admin") {
        ?><script>alert('Anda tidak memiliki akses ke halaman ini');</script><?php
        ?><script>document.location.href='pemasukan.php';</script><?php
        die(0);
    }
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Tambah Pemasukan Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Transaksi</li>
                        <li><a href="pemasukan.php"> Pemasukan Material</a></li>
                        <li class="active">Tambah Pemasukan Material</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->x
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pemasukan</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pemasukan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker52" name="TANGGAL_MASUK" value="" readonly data-parsley-required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor PO</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NOMOR_PO" id="NOMOR_PO" placeholder="Nomor PO" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PEMASUKAN" id="KETERANGAN_PEMASUKAN" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Material</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Material</label>
                                <div class="col-sm-5">
                                    <select name="ID_KATEGORI" id="selectize-select" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        foreach ($rowKategori as $dataKategori) {
                                            extract($dataKategori);
                                            ?>
                                            <option value="<?= $ID_KATEGORI; ?>"><?= $NAMA_KATEGORI; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Material</label>
                                <div class="col-sm-5">
                                    <select name="ID_BARANG" id="selectize-select2" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Material --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="SATUAN" id="SATUAN" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker12" name="EXPIRATION" placeholder="Pilih tanggal" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Batch</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NO_BATCH" id="NO_BATCH" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QTY</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" name="QTY" id="QTY" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PERSEDIAAN" id="KETERANGAN_PERSEDIAAN" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="pemasukan.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!--/ END row -->
        </form>
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
                <h4 class="title semibold">Tambah Pemasukan Material</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pemasukan.php"> Pemasukan Material</a></li>
                        <li class="active">Tambah Pemasukan Material</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->x
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pemasukan</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pemasukan</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker52" name="TANGGAL_MASUK" placeholder="Pilih tanggal" readonly data-parsley-required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor PO</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NOMOR_PO" id="NOMOR_PO" placeholder="Nomor PO" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PEMASUKAN" placeholder="Keterangan" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Material</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Material</label>
                                <div class="col-sm-5">
                                    <select name="ID_KATEGORI" id="selectize-select" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Kategori --</option>
                                        <?php
                                        foreach ($rowKategori as $dataKategori) {
                                            extract($dataKategori);
                                            ?>
                                            <option value="<?= $ID_KATEGORI; ?>"><?= $NAMA_KATEGORI; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Material</label>
                                <div class="col-sm-5">
                                    <select name="ID_BARANG" id="selectize-select2" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Material --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="SATUAN" id="SATUAN" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker12" name="EXPIRATION" placeholder="Pilih tanggal" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor Batch</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NO_BATCH" id="NO_BATCH" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">QTY</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" name="QTY" id="QTY" placeholder="Qty" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PERSEDIAAN" placeholder="Keterangan" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-9 col-sm-offset-2">
                                    <button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                    <a href="pemasukan.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <!--/ END row -->
        </form>
    </div>
    <!--/ END Template Container -->
    <?php
}
?>

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
<!--/ END To Top Scroller -->
