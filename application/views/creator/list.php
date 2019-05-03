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
                                <!-- 
                                    `id_creator`,
                                    `name`,
                                    `address`,
                                    `place_of_birth`,
                                    `date_of_birth`,
                                    `gender`,
                                    `religion`,
                                    `citizenship`,
                                    `blood_type`,
                                    `email`,
                                    `phone_number`,
                                    `image`,
                                    `made`
                                 -->
                                <th>No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Place Of Birth</th>
                                <th>Date Of Birth</th>
                                <th>Gender</th>
                                <th>Religion</th>
                                <th>Citizenship</th>
                                <th>Blood Type</th>
                                <th>Email</th>
                                <th>Phone_number</th>
                                <th>Image</th>
                                <th>Made</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $no = 1;
                            foreach($creators as $creator):
                            ?>
                            <tr id="<?= "creator-list-" . $creator->id_creator ?>">
                                <td class="no"><?php echo $no; ?></td>
                                <td><?php echo $creator->name; ?></td>
                                <td><?php echo $creator->address; ?></td>
                                <td><?php echo $creator->place_of_birth; ?></td>
                                <td><?php echo $creator->date_of_birth; ?></td>
                                <td><?php echo $creator->gender; ?></td>
                                <td><?php echo $creator->religion; ?></td>
                                <td><?php echo $creator->citizenship; ?></td>
                                <td><?php echo $creator->blood_type; ?></td>
                                <td><?php echo $creator->email; ?></td>
                                <td><?php echo $creator->phone_number; ?></td>
                                <td><?php echo $creator->image; ?></td>
                                <td><?php echo $creator->made; ?></td>
                                <td>
                                    <a href="<?php echo site_url('creator/detail/' . $creator->id_creator); ?>" class="btn btn-success">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo site_url('creator/edit/' . $creator->id_creator); ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </a>
                                    <a href="<?php echo site_url('creator/delete/' . $creator->id_creator); ?>" data-action="<?php echo site_url('creator/delete/' . $creator->id_creator); ?>" data-id="<?= $creator->id_creator ?>" class="btn btn-danger delete-creator-button">
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
