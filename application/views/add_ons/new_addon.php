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
        NEW ADD ONS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Input New Add On</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('add_ons/insert_add_on',['class' => 'form-horizontal']) ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">Judul</label>
              <div class="col-sm-10">
                <input type="text" name="judul" class="form-control" id="judul">
                <?= form_error('judul')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" name="foto">
                <?= form_error('foto')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Deskripsi</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="deskripsi" rows="3" name="deskripsi"></textarea>
                <?= form_error('deskripsi')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="harga" name="harga">
                <?= form_error('harga')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-10">
                <select id="kategori" class="form-control" name="kategori">
                  <option>kategori</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                <?= form_error('kategori')?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Pembuat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="pembuat" name="pembuat">
                <?= form_error('pembuat')?>
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
