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
        DETAILS CREATOR
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?= base_url('storage/images/memo.jpg') ?>" class="img-responsive">
                </div>
                <div class="col-md-9">
                  <h2>Sherli yualinda</h2>
                  <p style="font-size: 16px;">Jalan Sunan Ampel No 102A</p>
                  <p style="font-size: 16px;">lamongan, 11 November 1999</p>
                  <p style="font-size: 16px;">085856079291</p>
                  <p style="font-size: 16px;">yualindasherli@gmail.com</p>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= $page_resource['admin_footer'] ?>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
