<!DOCTYPE html>
<html>
<head>
  <?= stick_template('resources/meta'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <?= stick_template('resources/admin_header') ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <?= stick_template('resources/admin_sidebar') ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DETAILS ADD ONS
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
                  <h2><?= $judul ?></h2>
                  <span style="font-size: 30px; font-weight: 700; position: absolute; top: 10px; right: 20px;"><?=$harga?></span>
                  <p style="font-size: 16px;">Creator : <?= $pembuat ?></p>
                  <p style="font-size: 16px;">27 February 2019</p>
                  <p style="font-size: 16px;">Rating</p>
                  <button class="btn btn-success">BUY</button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12"> 
                  <p align="justify"><?= $deskripsi?> </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p style="font-size:20px" align="center">Sreenshoots</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <center>
                  <img src="<?= base_url('storage/images/memo.jpg')?>" width="400px" height="300px">
                  <P>Gambar 1</P>
                  </center>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <nav aria-label="Page navigation" class="col-md-offset-4">
                    <ul class="pagination">
                      <li class="disabled">
                        <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <!-- end nav -->
                </div>
              </div>
            </div>
            <!-- End Box Body -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?= stick_template('resources/admin_footer') ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url() ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url() ?>assets/vendor/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/vendor/template_admin-lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/vendor/template_admin-lte/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
