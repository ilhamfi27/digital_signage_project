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
                  <img src="<?= base_url('storage/images/add_ons/') . $creator->image ?>" class="img-responsive">
                </div>
                <div class="col-md-9">
                  <h2><?= $creator->name ?></h2>
                  <dl class="row">  
                      <dt class="col-md-3">Email</dt>
                      <dd class="col-md-9"><?= $creator->email?></dd>

                      <dt class="col-md-3">Phone Number</dt>
                      <dd class="col-md-9"><?= $creator->phone_number?></dd>

                      <dt class="col-md-3">Address</dt>
                      <dd class="col-md-9"><?= $creator->address?></dd>

                      <dt class="col-md-3">Place Of Birth</dt>
                      <dd class="col-md-9"><?= $creator->place_of_birth?></dd>

                      <dt class="col-md-3">Date Of Birth</dt>
                      <dd class="col-md-9"><?= $creator->date_of_birth?></dd>

                      <dt class="col-md-3">Gender</dt>
                      <dd class="col-md-9"><?= $creator->gender?></dd>

                      <dt class="col-md-3">Religion</dt>
                      <dd class="col-md-9"><?= $creator->religion?></dd>

                      <dt class="col-md-3">Citizenship</dt>
                      <dd class="col-md-9"><?= $creator->citizenship?></dd>

                      <dt class="col-md-3">Blood Group</dt>
                      <dd class="col-md-9"><?= $creator->blood_type?></dd>
                  </dl> 
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

  <?= $page_resource['admin_footer'] ?>
</div>
<?= $page_resource['admin_scripts'] ?>
</body>
</html>
