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
        FRONT DISPLAY
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
  

        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <center><h2 class="panel-title"><b>Enter Your Content</b></h2>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class 
                    </div>
                  </div>
                  <div class="row">
                  	 <div class="col-md-12">
                       <table>
                         <tr>
                           <td>Subject</td>
                           <td>:</td>
                           <td><?= form_input('subject')?></td>
                         </tr>
                         <tr>
                           <td>Description</td>
                           <td>:</td>
                           <td><?= form_input('description')?></td>
                         </tr>
                         <tr>
                           <td>Date</td>
                           <td>:</td>
                           <td><input type="date" name="date"></td>
                         </tr>
                         <tr>
                           <td>Image/video</td>
                           <td>:</td>
                           <td><input type="file" name="image"></td>
                         </tr>
                         <tr>
                           <td>Category</td>
                           <td>:</td>
                           <td><input type="dropdown" name="category"></td>
                         </tr>
                       </table>
                  	 </div>
                  </div>
                   <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12"> 
                      <center><a href='<?= site_url("#"); ?>'><button class="btn btn-primary">Submit</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          </div>
        <!-- /.box-body -->
        <!-- /.box-footer-->
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
