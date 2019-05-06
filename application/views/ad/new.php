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
                    New Ad
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?= form_open_multipart('ad/insert', ['class' => 'form-horizontal', 'id'=>'new-ad-form']) ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="subject">Subject</label>
                                        <div class="col-sm-6">
                                            <input type='text' name='subject' class='form-control' value="" placeholder="Subject">
                                            <?= form_error('subject') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Description</label>
                                        <div class="col-sm-6">
                                            <textarea class="form-control" id="description" rows="3" name='description'></textarea>
                                        <?= form_error('description')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label">Content Category</label>
                                        <div class="col-sm-6">
                                            <select name='content_category' class="form-control" id="content_category">
                                                <?php foreach($content_categories as $category): ?>
                                                <option value="<?= $category->id_content_category ?>" ><?= $category->category ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?= form_error('content_category')?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-offset-1 control-label" for="file">File</label>
                                        <div class="col-sm-6">
                                            <input type="file" name='file' id="file" accept="image/x-png,image/gif,image/jpeg">
                                            <?= $this->session->flashdata('file_error') ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-6">
                                            <button type="submit" id="form-creator-button" class="btn btn-primary">Submit</button>
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
