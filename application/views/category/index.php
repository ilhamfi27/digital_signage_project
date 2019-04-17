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
                    Categories
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?= form_open('category/insert', ['class' => 'form-horizontal', 'id' => 'category-form', 'data-action-transaction' => 'insert']) ?>
                                    <input type="hidden" name="id" id="id-hidden" value="">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="category_name">Category Name</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='category_name' id="category_name" class='form-control' value="" placeholder="Name">
                                            <?= form_error('category_name') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary" id="insert-button">Submit</button>
                                            <button type="reset" class="btn btn-danger" id="reset-button" style="display:none;">Reset</button>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="category-list" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($categories as $category):
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $category->category_name; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('category/edit/' . $category->id); ?>" data-action="<?php echo site_url('category/update/' . $category->id); ?>" data-id="<?= $category->id ?>" class="btn btn-primary btn-edit-category">
                                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                            </a>
                                            <a href="<?php echo site_url('category/delete/' . $category->id); ?>" data-action="<?php echo site_url('category/delete/' . $category->id); ?>" data-id="<?= $category->id ?>" class="btn btn-danger delete-category-button">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $no++;
                                    endforeach;
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
