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
                NEW ADD ONS
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box --> 
            <div class="box">
                <div class="box-header with-border">
                    <center>
                        <p style="font-size: 25px">Input New Add On</p>
                    </center>
                </div>
                <div class="box-body">
                    <?= form_open_multipart('add_ons_new/new_addon',['class' => 'form-horizontal']) ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" name="plugins[title]" class="form-control" id="title">
                                <?= form_error('plugins[title]')?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Uploaded</label>
                            <div class="col-sm-10">
                                <input type="file" name="uploaded">
                                <?= form_error('uploaded')?>
                            </div>
                        </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="plugins[description]" rows="3" name="plugins[description]"></textarea>
                                <?= form_error('plugins[description]')?>
                            </div>
                     </div>

                     <div class="form-group">
                            <label class="col-sm-2 control-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="price" name="add_ons[price]">
                                <?= form_error('add_ons[price]')?>
                            </div>
                     </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Creator</label>
                            <div class="col-sm-10">
                                <select name="plugins[id_creator]" class="form-control">
                                    <?php foreach ($creator as $c): ?>
                                        <option value="<?= $c->id_creator ?>"><?php echo $c->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('creator[name]')?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    <?= form_close() ?>
                 </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?= $page_resource['admin_footer'] ?>

    <!-- Add the sidebar's background. This div must be placed
             immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
