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
                    Edit Creator
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?= form_open_multipart('creator/update', ['class' => 'form-horizontal', 'id'=>'edit-creator-form']) ?>
                                <input type='hidden' name='id' value="<?= $creator->id ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='name' class='form-control' value="<?= $creator->name ?>" placeholder="Name">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Address</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='address' class='form-control' value="<?= $creator->address ?>" placeholder="Address">
                                            <?= form_error('address') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Birth Place</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='birth_place' class='form-control' value="<?= $creator->birth_place ?>" placeholder="Birth Place">
                                            <?= form_error('birth_place') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Birth Date</label>
                                        <div class="col-sm-6">
                                            <input type='date' name='birth_date' class='form-control' value="<?= $creator->birth_date ?>" placeholder="Birth Date">
                                            <?= form_error('birth_date') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Phone Number</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='phone_number' class='form-control' value="<?= $creator->phone_number ?>" placeholder="Phone Number">
                                            <?= form_error('phone_number') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Email</label>
                                        <div class="col-sm-6">
                                            <input type='email' name='email' class='form-control' value="<?= $creator->email ?>" placeholder="Email">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="creator_photo">Photo</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="photo" id="creator_photo" accept="image/x-png,image/gif,image/jpeg">
                                            <?= $this->session->flashdata('photo_error') ?>
                                            <img src="<?= base_url("storage/images/creator_photo/" . $creator->photo) ?>" id="creator_photo_image" alt="Creator Photo" width="200" data-img-url="<?= base_url("storage/images/creator_photo/") ?>">
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
