<!DOCTYPE html>
<html>
<head>
    <?= stick_template('resources/meta'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <?= stick_template('resources/admin_header') ?>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <?= stick_template('resources/admin_sidebar') ?>

    <!-- ============================================================================================== -->
            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Theme Details
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="box">
                        <div class="box-body">
                            
                        </div>
                        <!-- End Box Body -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- ============================================================================================== -->

    <?= stick_template('resources/admin_footer') ?>
</div>
<!-- ./wrapper -->
    <?= stick_template('resources/admin_scripts') ?>
</body>
</html>
