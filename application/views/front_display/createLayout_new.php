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
        CREATE CONTENT
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
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img  src="" width='200' height='200'><br>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <a href=''><button class="btn btn-primary">Read More</button></a>
                      <button class="btn btn-success">Buy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img  src="" width='200' height='200'><br>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <a href=''><button class="btn btn-primary">Read More</button></a>
                      <button class="btn btn-success">Buy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img  src="" width='200' height='200'><br>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <a href=''><button class="btn btn-primary">Read More</button></a>
                      <button class="btn btn-success">Buy</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
           <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img  src="" width='200' height='200'><br>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <a href=''><button class="btn btn-primary">Read More</button></a>
                      <button class="btn btn-success">Buy</button>
                    </div>
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
