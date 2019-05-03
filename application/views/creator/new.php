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
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="place_of_birth">PLace Of Birth</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='place_of_birth' class='form-control' value="" placeholder="PLace Of Birth">
                                            <?= form_error('place_of_birth') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="date_of_birth">Date Of Birth</label>
                                        <div class="col-sm-6">
                                            <input type='date' name='date_of_birth' class='form-control' value="" placeholder="Date Of Birth">
                                            <?= form_error('date_of_birth') ?>
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
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Gender</label>
                                        <div class="col-sm-6">
                                            <select name='gender' class="form-control" id="gender">
                                                <option value="Male" >Male</option>
                                                <option value="Female" >Female</option>
                                            </select>
                                        <?= form_error('gender')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Religion</label>
                                        <div class="col-sm-6">
                                            <select name='religion' class="form-control" id="religion">
                                                <option value="Islam" >Islam</option>
                                                <option value="Christianity" >Christianity</option>
                                                <option value="Buddhism" >Buddhism</option>
                                                <option value="Confucianism" >Confucianism</option>
                                                <option value="Hinduism" >Hinduism</option>
                                            </select>
                                        <?= form_error('religion')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Blood Type</label>
                                        <div class="col-sm-6">
                                            <select name='blood_type' class="form-control" id="blood_type">
                                                <option value="A" >A</option>
                                                <option value="B" >B</option>
                                                <option value="AB" >AB</option>
                                                <option value="O" >O</option>
                                            </select>
                                        <?= form_error('blood_type')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Citizenship</label>
                                        <div class="col-sm-6">
                                            <input type="text" name='citizenship' class="form-control" id="citizenship">
                                        <?= form_error('citizenship')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Address</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" id="address" rows="3" name='address'></textarea>
                                        <?= form_error('address')?>
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
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="image">Image</label>
                                        <div class="col-sm-6">
                                            <input type="file" name='image' id="image" accept="image/x-png,image/gif,image/jpeg">
                                            <?= $this->session->flashdata('photo_error') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Creator Who Made</label>
                                        <div class="col-sm-6">
                                            <select name='made' class="form-control" id="made">
                                                <option value="a" >Add On</option>
                                                <option value="t" >Themes</option>
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
