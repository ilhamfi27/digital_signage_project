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
        EDIT CONTENT CATEGORY
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Content Category</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('front_display_new/updatecontent_category',['class' => 'form-horizontal']) ?>
           <?php// foreach($content as $content){ ?>
            <div class="form-group">
              <label class="col-sm-2 control-label"></label>
              <div class="col-sm-10">
                <input type="hidden" name="id_content_category" class="form-control" id="id_content_category" value="<?php echo $content_category->id_content_category ?>">
                <?= form_error('id_content_category')?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Content Category</label>
              <div class="col-sm-10">
                <input type="text" name="category" class="form-control" id="category"  value="<?= $content_category->category ?>">
                <?= form_error('category')?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
              <?php// } ?>
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
