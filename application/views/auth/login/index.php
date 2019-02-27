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
        <p class="login-box-msg">Sign in to start your session</p>
        <?= form_open('auth/login/create_session'); ?>
            <div class="form-group has-feedback">
                <?= form_input('username', set_value('username'), ['class' => 'form-control', 'placeholder' => 'Username']) ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <?= form_error('username') ?>
            <div class="form-group has-feedback">
                <?= form_password('password', set_value('password'), ['class' => 'form-control', 'placeholder' => 'Password']) ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <?= form_error('password') ?>
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
        </form>

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
