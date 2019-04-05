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
          <?= form_open_multipart('add_ons/update_creator',['class' => 'form-horizontal']) ?>
          <input type="hidden" name="id" value="<?= $creator->id ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $creator->nama ?>">
                <?= form_error('nama')?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= $creator->alamat ?></textarea>
                <?= form_error('alamat')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tempat" class="form-control" id="tempat" value="<?= $creator->tempat_lahir ?>">
                <?= form_error('tempat')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="text" name="tanggal" class="form-control" id="tanggal" value="<?= $creator->tanggal_lahir ?>">
                <?= form_error('tanggal')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">No Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $creator->no_telp ?>">
                <?= form_error('telepon')?>
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
