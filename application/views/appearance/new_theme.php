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

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        New Theme
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
        <p style="font-size: 25px">Input New Theme</p>
        </div>
        <div class="box-body">
          <?= form_open_multipart('appearance/insert_new_theme',['class' => 'form-horizontal']) ?>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="title">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="<?= set_value('title') ?>">
                <?= form_error('title')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label" for="description">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" name="description"><?= set_value('description') ?></textarea>
                <?= form_error('description')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label" for="category">Category</label>
              <div class="col-sm-10">
                <select id="category" class="form-control" name="category">
                  <option value="">-- Select Category --</option>
                  <option value="Abstract">Abstract</option>
                  <option value="Nature">Nature</option>
                  <option value="Cartoon">Cartoon</option>
                  <option value="Comics">Comics</option>
                </select>
                <?= form_error('category')?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label" for="creator">Creator</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="creator" name="creator" <?= set_value('creator') ?>>
                <?= form_error('creator')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="screenshots">Screenshots</label>
              <div class="col-sm-10">
                <input type="file" name="screenshots" id="screenshots">
                <?= form_error('screenshots')?>
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

  <?= stick_template('resources/admin_footer') ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/vendor/template_admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/vendor/template_admin-lte/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
