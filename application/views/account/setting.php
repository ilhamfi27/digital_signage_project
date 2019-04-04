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
                                <?= form_open('account/update_account_data', ['class' => 'form-horizontal']) ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="username">Username</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='username' class='form-control' value="<?= $this->session->username; ?>" disabled>
                                            <?= form_error('username') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="email">Email Aktif</label>
                                        <div class="col-sm-6">
                                            <input type='email' name='email' class='form-control' id='email' value="<?= $auth_setting->email ?>">
                                            <?= form_error('email') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="password">Password</label>
                                        <div class="col-sm-6">
                                            <input type='password' name='password' class='form-control' id='password' placeholder="Password">
                                            <?= form_error('password') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="password_confirmation">Password Confirmation</label>
                                        <div class="col-sm-6">
                                            <input type='password' name='password_confirmation' class='form-control' id='password_confirmation' placeholder="Password Confirmation">
                                            <?= form_error('password_confirmation') ?>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="password_verification">Old Password Verification</label>
                                        <div class="col-sm-6">
                                            <input type='password' name='password_verification' class='form-control' id='password_verification' placeholder="Old Password Verification">
                                            <?= form_error('password_verification') ?>
                                            <?= NULL !== $this->session->flashdata('password_verification_wrong') ? $this->session->flashdata('password_verification_wrong') : NULL; ?>
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
        <?= $page_resource['admin_footer'] ?>
    </div>
    <!-- ./wrapper -->
    <?= $page_resource['admin_scripts'] ?>
</body>
</html>
