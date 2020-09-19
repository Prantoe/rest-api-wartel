<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wartel | Price</title>
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
                    Call
                    <small>Data Call</small>
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">
                                    <i class="fa fa-list-alt"></i>
                                    Data Call</h3>
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
                                            <th>No.Tujuan</th>
                                            <th>Tanggal</th>
                                            <th>Durasi</th>
                                            <th>Price</th>
                                            <th>Dibuat</th>
                                            <th>Dirubah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($call as $row) { ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= $row['nama'] ?></td>
                                                <td><?= $row['no_tujuan'] ?></td>
                                                <td><?= $row['tanggal'] ?></td>
                                                <td><?= $row['durasi'] ?></td>
                                                <td><?= $row['price'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td><?= $row['updated_at'] ?></td>
                                                <td align="center">

                                                    <a href="<?= base_url("call/deleteCall") . $row['id'] ?>" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view("templates/footer") ?>

        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view("templates/script") ?>
</body>