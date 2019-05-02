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
        DETAIL LAYOUT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Detail Layout</p>
          </center>
        </div>
        <div class="box-body">
      <div class="box-body">
           
            <div class="col-md-6">
                <div class="panel panel-default" style="padding: 15px">
                  <a href="<?php echo site_url('front_display_new/detaillayout/'.$layout->id_layout) ?>"><img style="width: 100%;height: 250px" src="<?php echo site_url('storage/images/front_display/'.$layout->image) ?>"></a>
                  <p>Layout <?php echo $layout->id_layout ?></p>
                </div>
              </div>

             <div class="col-md-6">
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="row">
                    <div>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                     <a href="<?php echo base_url('front_display_new/detailInput/'.$layout->id_layout) ?>" class="btn btn-success">Input Content</a>
                     <a href="<?php echo base_url('front_display_new/vieww/'.$layout->id_layout.'/'.$this->session->userdata('id')) ?>" class="btn btn-success">view</a>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                  </div>
                </div>
              </div>
            </div>
           
           
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
