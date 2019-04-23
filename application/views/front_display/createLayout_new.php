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
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="font-size: 3em;">
                      <i class="fa fa-plus-circle fa-5x"></i>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    
                  </div>
                </div>
              </div>
            </div>
           
            <div class="col-md-6">
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href="<?= site_url('front_display_new/detailLayout') ?>"><img src="https://storage.lookit.hk/company/58b98ec201c8f01cd08eaf23/layout/5aed7c01fd962569b3fc7606/1525518790010_list_preview.jpg" width="470" height="200"></a>
                      Layout 1
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href=""><img src="https://storage.lookit.hk/company/58b98ec201c8f01cd08eaf23/layout/5aed94bffd962569b3fc7635/1525520626307_list_preview.jpg" width="470" height="200"></a>
                      Layout 2
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
