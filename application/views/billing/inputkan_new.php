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
        Payment
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Input Payment</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open('billing_new/aksiCreate',['class' => 'form-horizontal']) ?>

            <div class="form-group">
              <label class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name">
                <?= form_error('name')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Duration First</label>
              <div class="col-sm-10">
            
              <input type="date" name="duration_first">
              </div>
           </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Duration Last</label>
              <div class="col-sm-10">
            
              <input type="date" name="duration_last">
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Phone Number</label>
              <div class="col-sm-10">
                <input type="text" name="phone_number" class="form-control" id="phone_number">
              <?= form_error('phone_number')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label"> Method Payment</label>
              <div class="col-sm-10">
                <select name="method" class="form-control" id="method">
                  <option value="Indomart">Indomart</option>
                  <option value="Alfamart">Alfamart</option>
              </select>
              <?= form_error('method')?>
              </div>
           </div>
           <div class="form-group">
              <label class="col-sm-2 control-label"> Pilih Paket & Price</label>
              <div class="col-sm-10">
                <select name="package_method" class="form-control">
                  <?php foreach($package as $m): ?>
                  <option value="<?= $m->id_package?>"><?= $m->name . " - " . "Rp." .$m->price ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
           </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name='submit' value="Kirim" class="btn btn-default">Submit</button>
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
