
<!-- START Template Container -->
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header page-header-block">
        <div class="page-header-section">
            <h4 class="title semibold">Master Barang</h4>
        </div>
        <div class="page-header-section">
            <!-- Toolbar -->
            <div class="toolbar">
                <ol class="breadcrumb breadcrumb-transparent nm">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li >Master</li>
                    <li class="active"> Barang</li>
                </ol>
            </div>
            <!--/ Toolbar -->
        </div>
    </div>
    <!-- Page Header -->

    <!-- START row -->
    <div class="row">
        <div class="col-lg-12">
            <a href="barang_transaksi.php" class="open-AddTingkatGelar btn btn-inverse btn-outline mb5 btn-rounded" ><i class="ico-plus2"></i> Tambah Data Barang</a>
        </div>
    </div>
    <br>
    <!--/ END row -->

    <!-- START row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" id="demo">
                <div class="panel-heading">
                    <h3 class="panel-title">Tabel Master Barang</h3>
                </div>
                <table class="table table-striped table-bordered" id="barang-table">
                    <thead>
                        <tr>
                            <th>ID Barang</th>
                            <th>Kategori</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Satuan</th>
                            <th>Status</th>
                            <th>Dibuat Oleh</th>
                            <th>Dibuat Tanggal</th>
                            <th>Diubah Oleh</th>
                            <th>Diubah Tanggal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rowBarang as $dataBarang) {
                            extract($dataBarang);
                            ?>
                            <tr>
                                <td align="center"><?= $ID_BARANG; ?></td>
                                <td align="center"><?= $NAMA_KATEGORI; ?></td>
                                <td align="center"><?= $NAMA_BARANG; ?></td>
                                <td><?= $DESKRIPSI; ?></td>
                                <td align="center"><?= $SATUAN; ?></td>
                                <td align="center"><?= $STATUS_DETAIL; ?></td>
                                <td align="center"><?= $CREATED_BY; ?></td>
                                <td align="center"><?= $CREATED_DATE; ?></td>
                                <td align="center"><?= $UPDATED_BY; ?></td>
                                <td align="center"><?= $UPDATED_DATE; ?></td>
                                <td align="center">
                                    <form id="eventoption-form-<?= uniqid(); ?>" method="post" class="form">
                                        <div class="btn-group" style="margin-bottom:5px;">
                                            <button type="button" class="btn btn-primary btn-outline btn-rounded mb5 dropdown-toggle" data-toggle="dropdown">Opsi <span class="caret"></span></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="barang_transaksi.php?method=view&id=<?= $ID_BARANG; ?>" style="color:#222222;"><i class="fa-solid fa-magnifying-glass"></i> Lihat</a></li>
                                                <li><a href="barang_transaksi.php?method=edit&id=<?= $ID_BARANG; ?>" style="color:#00a5d2;"><span class="ico-edit"></span> Ubah</a></li>
                                                <li class="divider"></li>
                                                <li><a href="module/backend/master/barang/t_barang.php?method=delete&id=<?= $ID_BARANG; ?>" onclick="return confirm('Hapus data ini ?')" style="color:firebrick;"><i class="fa-regular fa-trash-can"></i> Hapus</a></li>
                                            </ul>
                                        </div>
                                    </form>
                                </td>
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
