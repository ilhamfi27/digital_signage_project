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
            <p style="font-size: 25px">Create Content</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('front_display/inputContent',['class' => 'form-horizontal']) ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID</label>
              <div class="col-sm-10">
                <input type="text" name="id" class="form-control" id="id">
                <?= form_error('id')?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="subject">
                <?= form_error('subject')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                <?= form_error('description')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date">
                <?= form_error('date')?>
              </div>
           </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Image</label>
              <div class="col-sm-10">
                <input type="file" name="image">
                <?= form_error('image')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <select id="category" class="form-control" name="category">
                  <option>category</option>
                  <option>iklan</option>
                  <option>umum</option>
                </select>
                <?= form_error('category')?>
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
