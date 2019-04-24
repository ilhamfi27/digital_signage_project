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
        CREATE LAYOUT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Create Layout</p>
          </center>
        </div>
        <div class="box-body">
        <?= form_open_multipart('front_display_new/inputLayout',['class' => 'form-horizontal']) ?>
      <div class="box-body">
         
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default" style="padding: 15px;font-size: 3em;">
                <div style="height: 250px; width: 100%;text-align: center">
                  <i class="fa fa-plus-circle fa-5x"></i>
                </div>
              </div>
            </div>

            <?php foreach ($layout as $lay): ?>
              <div class="col-md-6">
                <div class="panel panel-default" style="padding: 15px">
                  <a href="<?php echo site_url('front_display_new/detaillayout/'.$lay->id_layout) ?>"><img style="width: 100%;height: 250px" src="<?php echo site_url('storage/images/front_display/'.$lay->image) ?>"></a>
                  <p>Layout <?php echo $lay->id_layout ?></p>
                </div>
              </div>
            <?php endforeach ?>
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
