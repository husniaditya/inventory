<?php
if (isset($_GET['id']) && $_GET['method'] == 'view') {
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Tambah Pengeluaran Barang</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengeluaran.php"> Pengeluaran Barang</a></li>
                        <li class="active">Tambah Pengeluaran Barang</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pengeluaran</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID Pengeluaran</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="ID_PENGELUARAN" name="ID_PENGELUARAN" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pengeluaran</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="TANGGAL_KELUAR" name="TANGGAL_KELUAR" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor MRIS</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NOMOR_MRIS" id="NOMOR_MRIS" placeholder="Nomor MRIS" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pemohon</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" id="NAMA" placeholder="Nama Pemohon" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Operasi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="OPERATING_UNIT" id="OPERATING_UNIT" placeholder="Unit Operasi" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Divisi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DIVISI" id="DIVISI" placeholder="Nama Divisi" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Blok</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="BLOCK" id="BLOCK" placeholder="Blok" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PENGELUARAN" id="KETERANGAN_PENGELUARAN" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Barang</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Barang</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="ID_KATEGORI" id="ID_KATEGORI" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Barang</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="ID_BARANG" id="ID_BARANG" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Satuan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="SATUAN" id="SATUAN" value="" readonly>
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
                                    <input class="form-control" type="number" name="QTY" id="QTY" placeholder="Qty" readonly >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="EXPIRATION" id="EXPIRATION" placeholder="Tanggal Kadaluarsa" readonly >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PERSEDIAAN" id="KETERANGAN_PERSEDIAAN" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                            <div class="col-sm-9 col-sm-offset-2">
                                <a href="pengeluaran.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
    if ($_SESSION["LOGINAKS_INV"] != "KTU") {
        ?><script>alert('Anda tidak memiliki akses ke halaman ini');</script><?php
        ?><script>document.location.href='pengeluaran.php';</script><?php
        die(0);
    }
    ?>
    <!-- START Template Container -->
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header page-header-block">
            <div class="page-header-section">
                <h4 class="title semibold">Ubah Pengeluaran Barang</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengeluaran.php"> Pengeluaran Barang</a></li>
                        <li class="active">Ubah Pengeluaran Barang</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pengeluaran</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pengeluaran</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker52" name="TANGGAL_KELUAR" placeholder="Pilih tanggal" readonly data-parsley-required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor MRIS</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NOMOR_MRIS" id="NOMOR_MRIS" placeholder="Nomor MRIS" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pemohon</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" id="NAMA" placeholder="Nama Pemohon" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Operasi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="OPERATING_UNIT" id="OPERATING_UNIT" placeholder="Unit Operasi" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Divisi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DIVISI" id="DIVISI" placeholder="Nama Divisi" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Blok</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="BLOCK" id="BLOCK" placeholder="Blok" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PENGELUARAN" placeholder="Keterangan" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Barang</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Barang</label>
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
                                <label class="col-sm-2 control-label"> Barang</label>
                                <div class="col-sm-5">
                                    <select name="ID_BARANG" id="selectize-select2" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Barang --</option>
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
                                <label class="col-sm-2 control-label">Nomor Batch</label>
                                <div class="col-sm-2">
                                    <select name="NO_BATCH" id="selectize-select3" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih No Batch --</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label">Stok saat ini</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="STOK" id="STOK" value="" readonly>
                                </div>
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="EXPIRATION" id="EXPIRATION" value="" readonly>
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
                                <a href="pengeluaran.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                <h4 class="title semibold">Tambah Pengeluaran Barang</h4>
            </div>
            <div class="page-header-section">
                <!-- Toolbar -->
                <div class="toolbar">
                    <ol class="breadcrumb breadcrumb-transparent nm">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li >Master</li>
                        <li><a href="pengeluaran.php"> Pengeluaran Barang</a></li>
                        <li class="active">Tambah Pengeluaran Barang</li>
                    </ol>
                </div>
                <!--/ Toolbar -->
            </div>
        </div>
        <!-- Page Header -->
        
        <form class="form-horizontal form-bordered" action="" method="post" data-parsley-validate>
        <!-- START row -->
            <div class="row">
                <!-- make a input form for kategori barang -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Pengeluaran</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Tanggal Pengeluaran</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="datepicker52" name="TANGGAL_KELUAR" placeholder="Pilih tanggal" readonly data-parsley-required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nomor MRIS</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NOMOR_MRIS" placeholder="Nomor MRIS" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Pemohon</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="NAMA" placeholder="Nama Pemohon" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Unit Operasi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="OPERATING_UNIT" placeholder="Unit Operasi" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Divisi</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="DIVISI" placeholder="Nama Divisi" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Blok</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="BLOCK" placeholder="Blok" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="text" name="KETERANGAN_PENGELUARAN" placeholder="Keterangan" value="">
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Barang</h3>
                        </div>
                        <hr>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Kategori Barang</label>
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
                                <label class="col-sm-2 control-label"> Barang</label>
                                <div class="col-sm-5">
                                    <select name="ID_BARANG" id="selectize-select2" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih Barang --</option>
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
                                <label class="col-sm-2 control-label">Nomor Batch</label>
                                <div class="col-sm-2">
                                    <select name="NO_BATCH" id="selectize-select3" class="form-control" data-parsley-required>
                                        <option value="">-- Pilih No Batch --</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 control-label">Stok saat ini</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="STOK" id="STOK" value="" readonly>
                                </div>
                                <label class="col-sm-2 control-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="text" name="EXPIRATION" id="EXPIRATION" value="" readonly>
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
                                <a href="pengeluaran.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali</a>
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
