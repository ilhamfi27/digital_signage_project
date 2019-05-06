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
        INSERT YOUR CONTENT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Insert your Content</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open('front_display_new/inputLayoutContent',['class' => 'form-horizontal']) ?>

           <div class="form-group">
              <label class="col-sm-2 control-label">Layout Kiri</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_content_kiri">
                  <?php foreach ($content as $s):   ?>
                    <option value="<?php echo $s->id_content?>"><?php echo $s->file ?></option>
                  <?php endforeach; ?>
                  <?=form_error('content[file]')  ?>
                </select>
                <?= form_error('file')?>
              </div>
            </div>

             <div class="form-group">
              <label class="col-sm-2 control-label">Layout Kanan</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_content_kanan">
                  <?php foreach ($content as $s):   ?>
                    <option value="<?php echo $s->id_content?>"><?php echo $s->file ?></option>
                  <?php endforeach; ?>
                  <?=form_error('content[file]')  ?>
                </select>
                <?= form_error('file')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Add On Kiri</label>
              <div class="col-sm-10">
                <select class="form-control" name="add_on_kiri">
                  <option value="">Kosong</option>
                  <?php 
                    foreach ($plugins as $p):   
                    if($p->add_on_avaliability == 1){
                  ?>
                    <option value="<?php echo $p->id_plugin?>"><?php echo $p->title ?></option>
                  <?php 
                    }
                    endforeach; 
                  ?>
                  <?=form_error('plugins[uploaded]')  ?>
                </select>
                <?= form_error('uploaded')?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Add On Kanan</label>
              <div class="col-sm-10">
                <select class="form-control" name="add_on_kanan">
                  <option value="">Kosong</option>
                  <?php 
                    foreach ($plugins as $p):   
                    if($p->add_on_avaliability == 1){
                  ?>
                    <option value="<?php echo $p->id_plugin?>"><?php echo $p->title ?></option>
                  <?php 
                    }
                    endforeach; 
                  ?>
                  <?=form_error('plugins[uploaded]')  ?>
                </select>
                <?= form_error('uploaded')?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="id_layout" value="<?php echo $layout->id_layout; ?>">
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
