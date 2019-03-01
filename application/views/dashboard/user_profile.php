<!DOCTYPE html>
<html>
<head>
    <?= stick_template("resources/meta") ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?= stick_template("resources/admin_header") ?>
        <?= stick_template("resources/admin_sidebar") ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    User Profile
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?= form_open('',['class' => 'form-horizontal']) ?>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="username">Username</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='username' class='form-control' value="<?= $this->session->username; ?>" disabled>
                                            <?= form_error('username') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="first_name">First Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='first_name' class='form-control' id='first_name'>
                                            <?= form_error('first_name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="last_name">Last Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='last_name' class='form-control' id='last_name'>
                                            <?= form_error('last_name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="birth_date">Birth Date</label>
                                        <div class="col-sm-6">
                                            <input type="date" class="form-control" name="birth_date" id="birth_date">
                                            <?= form_error('birth_date') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="email">Email</label>
                                        <div class="col-sm-6">
                                            <input type="email" class="form-control" name="email" id="email">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-1"></div>
                                        <label class="col-sm-2 control-label" for="photo">Photo</label>
                                        <div class="col-sm-6">
                                            <input type="file" name="photo" id="photo">
                                            <?= form_error('photo') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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

        <?= stick_template("resources/admin_footer") ?>
    </div>
    <!-- ./wrapper -->
    <?= stick_template("resources/admin_scripts") ?>
</body>
</html>
