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
        EDIT CREATOR
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Creator</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('add_ons_new/update_creator',['class' => 'form-horizontal']) ?>
          <input type="hidden" name="id_creator" value="<?= $creator->id_creator ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" value="<?= $creator->name ?>">
                <?= form_error('name')?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Address</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="address" rows="3" name="address"><?= $creator->address ?></textarea>
                <?= form_error('address')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?= $creator->phone_number ?>">
                <?= form_error('phone_number')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value="<?= $creator->email?>">
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
<!-- ./wrapper -->

    <?= $page_resource['admin_scripts'] ?>
</body>
</html>
