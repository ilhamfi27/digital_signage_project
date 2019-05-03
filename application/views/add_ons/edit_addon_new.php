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
        EDIT ADD ONS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Add On</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('Add_ons_new/update_add_on',['class' => 'form-horizontal']) ?>
          <input type="hidden" name="id" value="<?= $plugins->id_plugin ?>">
            <div class="form-group">
              <label class="col-sm-2 control-label">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="<?= $plugins->title ?>">
                <?= form_error('title')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Uploaded</label>
              <div class="col-sm-10">
                <input type="file" name="uploaded">
                <?= form_error('uploaded')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" value="<?= $plugins->description?>" name="description"><?= $plugins->description ?></textarea>
                <?= form_error('description')?>
              </div>
           </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Price</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="price" name="price" value="<?= $plugins->price?>">
                <?= form_error('price')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Creator</label>
              <div class="col-sm-10">
                <select name="id_creator" class="form-control">
                  <?php foreach ($creator as $c): ?>
                    <option value="<?php echo $c->id_creator ?>" <?php echo $plugins->id_creator == $c->id_creator ? 'selected' : '' ?>><?php echo $c->name ?></option>
                  <?php endforeach ?>
                </select>
                <?= form_error('name')?>
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
