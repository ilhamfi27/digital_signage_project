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
        EDIT LAYOUT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Layout</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('front_display_new/updateLayoutAdmin',['class' => 'form-horizontal']) ?>
           <?php// foreach($content as $content){ ?>
            <!--  -->

            <div class="form-group">
              <label class="col-sm-2 control-label">Position</label>
              <div class="col-sm-10">
                <input type="text" name="position" class="form-control" id="position"  value="<?= $layout->position ?>">
                <?= form_error('position')?>
              </div>
            </div>         

            <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image">
                <?= form_error('image')?>
              </div>
            </div>

           
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="id_layout" value="<?php echo $layout->id_layout ?>">
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
