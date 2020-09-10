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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?= $customers ?></h3>
                                <p>Jumlah Users</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user"></i>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3><?= $jnsKomik ?></h3>
                                <p>Jumlah Panggilan</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-phone"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-50 col-xs-4">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3><?= $tersewa[0]['tersewa'] ?></h3>
                                <p>Tarif</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-money"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row"></div>
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