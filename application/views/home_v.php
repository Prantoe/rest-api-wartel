<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wartel</title>
    <?php $this->load->view("templates/head") ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view("templates/sidebar") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- modal ubah tarif -->
                <div class="modal" id="ubahTarif" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ubah tarif panggilan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <tbody>
                                <?php foreach ($price as $row) { ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['price_per_detik'] ?></td>

                                        <td align="center">


                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>321</h3>
                                <p>Tarif Panggilan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-usd"></i>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#ubahTarif" class="small-box-footer">Lihat pendapatan
                                <span class="fa fa-edit"></span>
                            </a>
                        </div>
                    </div>

                    <!-- ------ -->
                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->


                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Rp. 321,-</h3>
                                <p>Pendapatan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-coffee"></i>
                            </div>
                            <a href="#" class="small-box-footer">Lihat pendapatan
                                <span class="fa fa-edit"></span>
                            </a>

                        </div>
                    </div>

                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>32</h3>
                                <p>Jumlah Panggilan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-tty"></i>
                            </div>
                            <a href="#" class="small-box-footer">Panggilan tersimpan
                                <span class="fa fa-edit"></span>
                            </a>

                        </div>
                    </div>
                    <!-- ./col -->



                </div>
                <!-- /.row -->
                <div class="row">
                    <section class="content">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">
                                            <i class="fa fa-list-alt"></i>
                                            Panggilan terakhir</h3>
                                    </div>
                                    <div class="box-body">
                                        <?php if ($this->session->flashdata("pesan")) { ?>
                                            <div class="alert alert-success alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <h5>
                                                    <i class="icon fa fa-check"></i><?php echo $this->session->flashdata("pesan") ?>
                                                </h5>
                                            </div>
                                        <?php } ?>
                                        <table class="table table-hover table-bordered table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- <?php foreach ($call as $row) { ?>
                                                    <tr>
                                                        <td><?= $row['id'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        
                                                        <td align="center">

                                                            <a href="<?= base_url("call/deleteCall") . $row['id'] ?>" class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?> -->
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </section>
                </div>
                <!-- /.row (main row) -->

            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <?php $this->load->view("templates/footer") ?>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed immediately after the
            control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("templates/script") ?>
</body>

</html>