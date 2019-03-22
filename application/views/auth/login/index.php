<!DOCTYPE html>
<html>
<head>
    <?= stick_template('resources/meta') ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"><?= $this->session->flashdata('registration_message') ?></p>
        <?= form_open('auth/login/create_session'); ?>
            <div class="form-group">
                <?= form_input('user_auth', set_value('user_auth'), ['class' => 'form-control', 'placeholder' => 'Username or Email']) ?>
                <?= form_error('user_auth') ?>
            </div>
            <div class="form-group">
                <?= form_password('password', NULL, ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                <?= form_error('password') ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        <?= form_close() ?>

        <a href="#">I forgot my password</a><br>
        <a href="<?= site_url('auth/register') ?>" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
