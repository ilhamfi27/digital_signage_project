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
        <?= form_open_multipart('#',['class' => 'form-horizontal']) ?>
      <div class="box-body">
           
            <div class="col-md-6">
              <div class="panel panel-default">
                
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <a href=""><img src="https://storage.lookit.hk/company/58b98ec201c8f01cd08eaf23/layout/5aed7c01fd962569b3fc7606/1525518790010_list_preview.jpg" width="470" height="200"></a>
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
                    <div>
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
                     <button class="btn btn-success">Input Content</button>
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
