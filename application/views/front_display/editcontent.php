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
        FRONT DISPLAY
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
  

        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <center><h2 class="panel-title"><b>Edit Content</b></h2>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class 
                    </div>
                  </div>
                  <div class="row">
                  	 <div class="col-md-12">
                      <?php foreach($content as $s){ ?>
							<form action="<?php echo base_url(). 'index.php/front_display/updatecontent'; ?>" method="post" enctype="multipart/form-data">
								<table border="1">
									<tr>
										<td>Subject</td>
										<td>
											<input type="hidden" name="id" value="<?php echo $s->id ?>">
											<input type="text" name="subject" value="<?php echo $s->subject ?>">
										</td>
									</tr>
									<tr>
										<td>Description</td>
										<td><input type="text" name="description" value="<?php echo $s->description ?>"></td>
									</tr>
									<tr>
										<td>Image</td>
										<td><input type="file" name="image"></td>
									</tr>
									<tr>
										<td>Date</td>
										<td><input type="date" name="date" value="<?php echo $s->date ?>"></td>
									</tr>
									<tr>
										<td>Category</td>
										<td><select id="category" name="category" value="<?php echo $s->category ?>">
											<option selected>Iklan</option>
											<option selected>Umum</option>
										</select>
									</tr>
									<tr>
										<td></td>
										<td><input type="submit" value="Simpan"></td>
									</tr>
								</table>
							</form>	
							<?php } ?>
                  	 </div>
                  </div>
                   <div class="row" style="margin-top: 10px;">
                    <div class="col-md-12"> 
                      <!-- <center><a href='<?= site_url("front_display/munculcontent"); ?>'><button class="btn btn-primary">CREATE CONTENT</button></a> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          </div>
        <!-- /.box-body -->
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


