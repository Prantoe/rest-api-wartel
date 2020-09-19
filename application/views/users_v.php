<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Wartel | data users</title>
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
                    Wartel
                    <small>Daftar Users</small>
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
                                    Data Users</h3>
                                <div class="pull-right">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#addUsers">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
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
                                            <th>username</th>
                                            <th>full name</th>
                                            <th>last login</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php for ($i = 0; $i < count($users); $i++) { ?>
                                            <tr>
                                                <td><?= $i + 1 ?></td>
                                                <td><?= $users[$i]['username'] ?></td>
                                                <td><?= $users[$i]['full_name'] ?></td>
                                                <td><?= $users[$i]['last_login'] ?></td>
                                                <td align="center">

                                                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-default<?= $users[$i]['user_id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?= base_url("users/deleteUsers/") . $users[$i]['user_id'] ?>" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <!-- Modal Edit Customers -->
                                <?php foreach ($users as $row) { ?>
                                    <div class="modal fade" id="modal-default<?= $row['user_id'] ?>" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Edit Data User</h4>
                                                </div>
                                                <form action="<?php echo base_url("users/updateUsers") ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Username :</label>
                                                            <input type="hidden" name="user_id" value="<?= $row['user_id'] ?>">
                                                            <input type="text" class="form-control" name="username" value="<?= $row['username'] ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>full name :</label>
                                                            <input type="text" class="form-control" name="full_name" value="<?= $row['full_name'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php } ?>
                                <!-- /Modal Edit Customers -->

                                <!-- Tambah user -->
                                <?php foreach ($users as $row) { ?>
                                    <div class="modal fade" id="addUsers" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Tambah user</h4>
                                                </div>
                                                <form action="<?php echo base_url("users/createUsers/") ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>username :</label>
                                                            <input type="text" class="form-control" name="username">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>password :</label>
                                                            <input type="text" class="form-control" name="password">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>full name :</label>
                                                            <input type="text" class="form-control" name="full_name">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                <?php } ?>
                                <!-- /Tambah user -->
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