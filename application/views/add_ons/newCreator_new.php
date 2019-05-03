<!DOCTYPE html>
<html>
<head>
    <?= $page_resource['meta'] ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?= $page_resource['admin_header'] ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <?= $page_resource['admin_sidebar'] ?>

    <!-- =============================================== -->

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

            <!-- Default box --> 
            <div class="box">
                <div class="box-header with-border">
                    <center>
                        <p style="font-size: 25px">Input New Creator</p>
                    </center>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('Add_ons_new/insert_creator',['class' => 'form-horizontal']) ?>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="name">
                                <?= form_error('name')?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="image">
                                <?= form_error('image')?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Place Of Birth</label>
                            <div class="col-sm-10">
                                <input type="text" name="place_of_birth" class="form-control" id="place_of_birth">
                            <?= form_error('place_of_birth')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Date Of Birth</label>
                            <div class="col-sm-10">
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                            <?= form_error('date_of_birth')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Gender</label>
                            <div class="col-sm-10">
                                <select name ="gender" class="form-control" id="gender">
                                    <option value="Male" >Male</option>
                                    <option value="Female" >Female</option>
                                </select>
                            <?= form_error('gender')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Religion</label>
                            <div class="col-sm-10">
                                <select name ="religion" class="form-control" id="religion">
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
                            <label class="col-sm-2 control-label">Citizenship</label>
                            <div class="col-sm-10">
                                <input type="text" name="citizenship" class="form-control" id="citizenship">
                            <?= form_error('citizenship')?>
                            </div>
                     </div>


                     <div class="form-group">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                            <?= form_error('address')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Blood Gruop</label>
                            <div class="col-sm-10">
                                <select name ="blood_group" class="form-control" id="blood_group">
                                    <option value="A" >A</option>
                                    <option value="B" >B</option>
                                    <option value="AB" >AB</option>
                                    <option value="O" >O</option>
                                </select>
                            <?= form_error('blood_group')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_number" class="form-control" id="phone_number">
                            <?= form_error('phone')?>
                            </div>
                     </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Email</label>
                            <div class="col-sm-10">
                                <input type="text" name="email" class="form-control" id="email" placeholder="@gmail.com">
                            <?= form_error('email')?>
                            </div>
                     </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    <?= form_close() ?>
                 </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $page_resource['admin_footer'] ?>

    <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
