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
        New Theme
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
        <p style="font-size: 25px">Input New Theme</p>
        </div>
        <div class="box-body">
          <?= form_open_multipart('theme/insert',['class' => 'form-horizontal']) ?>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="title">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" value="<?= set_value('title') ?>">
                <?= form_error('title')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label" for="description">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" name="description"><?= set_value('description') ?></textarea>
                <?= form_error('description')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label" for="category">Category</label>
              <div class="col-sm-10">
                <select id="category" class="form-control" name="category">
                  <option value="">-- Select Category --</option>
                  <?php foreach($categories as $category): ?>
                  <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('category')?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label" for="creator">Creator</label>
              <div class="col-sm-10">
                <select id="creator" class="form-control" name="creator">
                  <option value="">-- Select Creator --</option>
                  <?php foreach($creators as $creator): ?>
                  <option value="<?= $creator->id ?>"><?= $creator->name ?></option>
                  <?php endforeach; ?>
                </select>
                <?= form_error('creator')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="screenshots">Screenshots</label>
              <div class="col-sm-10">
                <input type="file" name="screenshots" id="screenshots">
                <?= form_error('screenshots')?>
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
