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
        New Creator
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Input New Creator</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('Add_ons_new/insert_creator',['class' => 'form-horizontal']) ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
                <?= form_error('name')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
              <?= form_error('address')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" name="phone_number" class="form-control" id="phone_number">
              <?= form_error('phone')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label"> Email</label>
              <div class="col-sm-10">
                <input type="text" name="email" class="form-control" id="email" placeholder="@gmail.com">
              <?= form_error('email')?>
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

  <?= $page_resource['admin_footer'] ?>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
