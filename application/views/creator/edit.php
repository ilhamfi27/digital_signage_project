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
                                <input type='hidden' name='id_creator' value="<?= $creator->id_creator ?>">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='name' class='form-control' value="<?= $creator->name ?>" placeholder="Name">
                                            <?= form_error('name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Place Of Birth</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='place_of_birth' class='form-control' value="<?= $creator->place_of_birth ?>" placeholder="PLace Of Birth">
                                            <?= form_error('place_of_birth') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Date Of Birth</label>
                                        <div class="col-sm-6">
                                            <input type='date' name='date_of_birth' class='form-control' value="<?= $creator->date_of_birth ?>" placeholder="Date Of Birth">
                                            <?= form_error('date_of_birth') ?>
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
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Gender</label>
                                        <div class="col-sm-6">
                                            <select name='gender' class="form-control" id="gender">
                                                <option value="Male" <?= $creator->gender == "Male" ? "selected" : NULL ?>>Male</option>
                                                <option value="Female" <?= $creator->gender == "Female" ? "selected" : NULL ?>>Female</option>
                                            </select>
                                        <?= form_error('gender')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Religion</label>
                                        <div class="col-sm-6">
                                            <select name='religion' class="form-control" id="religion">
                                                <option value="Islam" <?= $creator->religion == "Islam" ? "selected" : NULL ?>>Islam</option>
                                                <option value="Christianity" <?= $creator->religion == "Christianity" ? "selected" : NULL ?>>Christianity</option>
                                                <option value="Buddhism" <?= $creator->religion == "Buddhism" ? "selected" : NULL ?>>Buddhism</option>
                                                <option value="Confucianism" <?= $creator->religion == "Confucianism" ? "selected" : NULL ?>>Confucianism</option>
                                                <option value="Hinduism" <?= $creator->religion == "Hinduism" ? "selected" : NULL ?>>Hinduism</option>
                                            </select>
                                        <?= form_error('religion')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Blood Type</label>
                                        <div class="col-sm-6">
                                            <select name='blood_type' class="form-control" id="blood_type">
                                                <option value="A" <?= $creator->blood_type == "A" ? "selected" : NULL ?>>A</option>
                                                <option value="B" <?= $creator->blood_type == "B" ? "selected" : NULL ?>>B</option>
                                                <option value="AB" <?= $creator->blood_type == "AB" ? "selected" : NULL ?>>AB</option>
                                                <option value="O" <?= $creator->blood_type == "O" ? "selected" : NULL ?>>O</option>
                                            </select>
                                        <?= form_error('blood_type')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Citizenship</label>
                                        <div class="col-sm-6">
                                            <input type="text" name='citizenship' value="<?= $creator->citizenship ?>" class="form-control" id="citizenship">
                                        <?= form_error('citizenship')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="name">Address</label>
                                        <div class="col-sm-6">
                                            <textarea name='address' class='form-control' placeholder="Address"><?= $creator->address ?></textarea>
                                            <?= form_error('address') ?>
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
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="creator_image">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="image" id="creator_image" accept="image/x-png,image/gif,image/jpeg">
                                            <?= $this->session->flashdata('photo_error') ?>
                                            <img src="<?= base_url("storage/images/creator_photo/" . $creator->image) ?>" id="creator_photo_image" alt="Creator Image" width="200" data-img-url="<?= base_url("storage/images/creator_photo/") ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Creator Who Made</label>
                                        <div class="col-sm-6">
                                            <select name='made' class="form-control" id="made">
                                                <option value="a" <?= $creator->made == "a" ? "selected" : NULL ?>>Add On</option>
                                                <option value="t" <?= $creator->made == "t" ? "selected" : NULL ?>>Themes</option>
                                            </select>
                                        <?= form_error('made')?>
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
