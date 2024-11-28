
<!-- START Template Container -->
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Laporan Pengeluaran Barang</h4>
        </div>
        <div class="page-header-section">
            <!-- Toolbar -->
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li >Laporan</li>
                    <li class="active"> Laporan Pengeluaran Barang</li>
                </ol>
            </div>
            <!--/ Toolbar -->
        </div>
    </div>
    <!-- Page Header -->

    <!-- START row -->
    <form role="form" action="" method="post" data-parsley-validate>
        <div class="row">  
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> ID Pengeluaran</label>
                    <input type="text" name="ID_PENGELUARAN" class="form-control" value="<?= $ID_PENGELUARAN; ?>">
                </div>
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> Tanggal Periode Pengeluaran</label>
                    <input type="text" class="form-control" id="datepicker11" name="TANGGAL_KELUAR_AWAL" value="<?= $TANGGAL_KELUAR_AWAL; ?>" readonly data-parsley-required />
                </div> 
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="col-form-label" style="color: transparent;">.</label>
                    <input type="text" class="form-control" id="datepicker12" name="TANGGAL_KELUAR_AKHIR" value="<?= $TANGGAL_KELUAR_AKHIR; ?>" readonly data-parsley-required />
                </div>  
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> Keterangan Pengeluaran</label>
                    <input type="text" class="form-control" name="KETERANGAN_PENGELUARAN" value="<?= $KETERANGAN_PENGELUARAN; ?>" />
                </div>  
            </div>
        </div>
        <div class="row">
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label">Kategori Barang</label>
                    <select name="ID_KATEGORI" id="selectize-select" class="form-control" >
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        foreach ($rowKategori as $dataKategori) {
                            extract($dataKategori);
                            ?>
                            <option value="<?= $ID_KATEGORI; ?>" <?php if ($ID_KATEGORI == $ID_KATEGORI_EDIT) echo "selected"; ?>><?= $NAMA_KATEGORI; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> Barang</label>
                    <select name="ID_BARANG" id="selectize-select2" class="form-control" >
                        <option value="">-- Pilih Barang --</option>
                        <?php
                        if (isset($_POST['cari'])) {
                            foreach ($rowBarang as $dataBarang) {
                                extract($dataBarang);
                                ?>
                                    <option value="<?= $ID_BARANG; ?>" <?php if ($ID_BARANG == $ID_BARANG_EDIT) echo "selected"; ?>><?= $NAMA_BARANG; ?></option>
                                <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> No Batch</label>
                    <select name="NO_BATCH" id="selectize-select3" class="form-control" >
                        <option value="">-- Pilih No Batch --</option>
                        <?php
                        if (isset($_POST['cari'])) {
                            foreach ($rowBatch as $dataBatch) {
                                extract($dataBatch);
                                ?>
                                <option value="<?= $NO_BATCH; ?>" <?php if ($NO_BATCH == $NO_BATCH_EDIT) echo "selected"; ?>><?= $NO_BATCH; ?></option>
                                <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </select>
                </div>  
            </div>
            <div class="mb-4 col-md-3 col-12">
                <div class="form-group">
                    <label class="control-label"> Keterangan Persediaan</label>
                    <input type="text" class="form-control" name="KETERANGAN_PERSEDIAAN" value="<?= $KETERANGAN_PERSEDIAAN; ?>" />
                </div>  
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12 text-center">
                <button type="submit" name="cari" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                <a href="laporanpengeluaran.php" class="btn btn-default"><i class="fa fa-rotate-left"></i> Reset</a>
            </div>
        </div>
    </form>
    <br>
    <!--/ END row -->

    <!-- START row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" id="demo">
                <div class="panel-heading">
                    <h3 class="panel-title">Tabel Laporan Pengeluaran Barang</h3>
                </div>
                <table class="table table-striped table-bordered" id="laporanpengeluaran-table">
                    <thead>
                        <tr>
                            <th>ID Pengeluaran</th>
                            <th>Tanggal</th>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>No Batch</th>
                            <th>QTY</th>
                            <th>Satuan</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rowPengeluaran as $dataPengeluaran) {
                            extract($dataPengeluaran);
                            ?>
                            <tr>
                                <td align="center"><?= $ID_PENGELUARAN; ?></td>
                                <td align="center"><?= $TANGGAL_KELUAR; ?></td>
                                <td align="center"><?= $ID_BARANG; ?></td>
                                <td><?= $NAMA_BARANG; ?></td>
                                <td align="center"><?= $NAMA_KATEGORI; ?></td>
                                <td align="center"><?= $NO_BATCH; ?></td>
                                <td align="center"><?= $QTY; ?></td>
                                <td align="center"><?= $SATUAN; ?></td>
                                <td align="center"><?= $KETERANGAN; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ END row -->
</div>
<!--/ END Template Container -->

<!-- START To Top Scroller -->
<a href="#" class="totop animation" data-toggle="waypoints totop" data-showanim="bounceIn" data-hideanim="bounceOut" data-offset="50%"><i class="ico-angle-up"></i></a>
<!--/ END To Top Scroller -->

