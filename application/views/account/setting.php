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
                    Dashboard
                    <small>Version 2.0</small>
                </h1>
                <!-- <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol> -->
            </section>

            <!-- Main content -->
            <section class="content">
                
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
