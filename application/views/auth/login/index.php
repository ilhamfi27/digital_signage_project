<!DOCTYPE html>
<html>
<head>
    <?= stick_template('resources/meta') ?>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0);"><b>Digital Signage</b></a>
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
                <div class="col-xs-4 col-md-offset-8">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
            <div class="form-group">
                
            </div>
        <?= form_close() ?>

        <a href="#">I forgot my password</a><br>
        <a href="<?= site_url('auth/register') ?>" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php if(NULL !== ($this->session->flashdata('login_failure_message'))): ?>
<div class="alert alert-warning alert-dismissible floating-alert login-fail-alert-js" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Login Failed!</strong> <?= $this->session->flashdata('login_failure_message') ?>.
</div>
<?php endif; ?>
<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- our own javascript -->
<script src="<?= base_url() ?>assets/js/app.js"></script>
</body>
</html>
