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
        ADD ONS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
  
         <div class="col-lg-3 col-lg-offset-9">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go</button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /.col-lg-6 -->


        </div>
        <div class="box-body">
         
          <div class="row">
           <?php 
              $no = 1;
              foreach($addon as $row):
            ?>
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title"><?php echo $row->title; ?></h3>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-5">
                      <img  src="<?= base_url('storage/images/add_ons/') . $row->uploaded ?>" width='200' height='200'><br>
                    </div>
                    <div class="col-md-7">
                     <p align="justify"><?php echo $row->description; ?></p>
                    </div>
                  </div>
                  <div class="row" style="margin-top: 10px;">
                    <div class="col-md-8 col-md-offset-4"> 
                      <?php if($this->session->level === "admin"){ ?>
                         <a href='<?= site_url("add_ons_new/details/")?>'><button class="btn btn-primary">Read More</button></a>
                      <?php } ?>
                      <?php if($this->session->level !== "admin"){ ?>
                          <a href='<?= site_url("add_ons_new/details/")?>'><button class="btn btn-primary">Read More</button></a>
                         <a href="<?= site_url("billing_new/create")?>"><button class="btn btn-success">Buy</button></a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
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
