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
                List Creator
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
    
             <div class="col-lg-3 col-lg-offset-9">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go</button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->

                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="list-data" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Birth Place</th>
                                <th>Birth Date</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($creators as $creator):
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $creator->name; ?></td>
                                <td><?php echo $creator->address; ?></td>
                                <td><?php echo $creator->birth_place; ?></td>
                                <td><?php echo $creator->birth_date; ?></td>
                                <td><?php echo $creator->phone_number; ?></td>
                                <td><?php echo $creator->email; ?></td>
                                <td>
                                    <a href="<?php echo site_url('creator/detail/' . $creator->id); ?>" class="btn btn-success">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo site_url('creator/edit/' . $creator->id); ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo site_url('creator/delete/' . $creator->id); ?>" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                            $no++;
                            endforeach;
                            ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <!-- <div class="box-footer">
                    Footer
                </div> -->
                <!-- /.box-footer-->
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
