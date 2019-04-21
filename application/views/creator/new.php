<!DOCTYPE html>
<html>
<head>
    <?= $page_resource['meta'] ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?= $page_resource['admin_header'] ?>
        <?= $page_resource['admin_sidebar'] ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    New Creator
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?= form_open_multipart('creator/insert', ['class' => 'form-horizontal', 'id'=>'new-creator-form']) ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='name' class='form-control' value="" placeholder="Name">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Address</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='address' class='form-control' value="" placeholder="Address">
                                            <?= form_error('address') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Birth Place</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='birth_place' class='form-control' value="" placeholder="Birth Place">
                                            <?= form_error('birth_place') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Birth Date</label>
                                        <div class="col-sm-6">
                                            <input type='date' name='birth_date' class='form-control' value="" placeholder="Birth Date">
                                            <?= form_error('birth_date') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Phone Number</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='phone_number' class='form-control' value="" placeholder="Phone Number">
                                            <?= form_error('phone_number') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Email</label>
                                        <div class="col-sm-6">
                                            <input type='email' name='email' class='form-control' value="" placeholder="Email">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="photo">Photo</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="photo" id="photo" accept="image/x-png,image/gif,image/jpeg">
                                            <?= $this->session->flashdata('photo_error') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" id="form-creator-button" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                <?= form_close() ?>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?= $page_resource['admin_footer'] ?>
    </div>
    <!-- ./wrapper -->
    <?= $page_resource['admin_scripts'] ?>
</body>
</html>
