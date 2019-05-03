<!DOCTYPE html>
<html>
<head>
  <?= $page_resource['meta']; ?>
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
        Themes
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
  
       <div class="col-lg-3 col-lg-offset-9">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search themes">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

        </div>
        <div class="box-body">
          <div class="row">
            <?php foreach($themes as $theme): ?>
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?= $theme->title ?></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="<?= base_url('storage/images/theme_photo/' . $theme->photo_icon) ?>" width="150" height="150" class="img-responsive" alt="<?= $theme->title . " Photo Icon" ?>"><br>
                    </div>
                    <div class="col-md-8">
                     <p align="justify"><?= $theme->description ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-4 col-md-offset-4"> 
                      <a href='<?= site_url("theme/details/" . $theme->id_plugin ); ?>'><button class="btn btn-primary">Read More</button></a>
                      <a href="#"><button class="btn btn-primary">Install</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
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
