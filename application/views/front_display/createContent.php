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
                  <center><h2 class="panel-title"><b>Add Content</b></h2>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class 
                    </div>
                  </div>
                  <div class="row">
                  	 <div class="col-md-12">
                      <?= form_open_multipart('front_display/inputContent')?>
                        <table>
                        <tr>
                          <td>ID</td>
                          <td>:</td>
                          <td><?= form_input('id')?></td>
                        </tr>
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
                           <td>
                              <select name="category">
                                <option value="iklan">Iklan</option>
                                <option value="umum">Umum</option>
                              </select>
                           </td>
                         </tr>
                       </table>
                      <center>
                        <a href='<?= site_url("front_display/munculcontent") ?>'>
                          <?= form_submit('ok','CREATE CONTENT', 'class="btn btn-primary"')?>
                        </a>
                      </center>
                      <?= form_close()?>
                       
                  	 </div>
                  </div>
                   <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12"> 
                      <!-- <center><a href='<?= site_url("front_display/munculcontent"); ?>'><button class="btn btn-primary">CREATE CONTENT</button></a> -->
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

   <?= $page_resource['admin_footer'] ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
