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
                Detail Creator
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?= $creator->name ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?= base_url("storage/images/creator_photo/".$creator->image) ?>" class="img-responsive" alt="Creators Photo">
                        </div>
                        <div class="col-md-9">
                            <p><?= $creator->address ?></p>
                            <p><?= $creator->place_of_birth . ", " . $creator->date_of_birth ?></p>
                            <p><?= $creator->phone_number ?></p>
                            <p><?= $creator->email ?></p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

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
