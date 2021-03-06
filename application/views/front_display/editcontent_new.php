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
        EDIT CONTENT
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-header with-border">
          <center>
            <p style="font-size: 25px">Edit Content</p>
          </center>
        </div>
        <div class="box-body">
          <?= form_open_multipart('front_display_new/updatecontent',['class' => 'form-horizontal']) ?>
           <?php// foreach($content as $content){ ?>
            <!--  -->

             <div class="form-group">
              <label class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="subject"  value="<?= $content->subject ?>">
                <?= form_error('subject')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="description" rows="3" name="description"><?= $content->description ?></textarea>
                <?= form_error('description')?>
              </div>
           </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="date" name="date" value="<?= $content->date ?>">
                <?= form_error('date')?>
              </div>
           </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">file</label>
              <div class="col-sm-10">
                <input type="file" name="file">
                <?= form_error('file')?>
              </div>
            </div>

           <div class="form-group">
              <label class="col-sm-2 control-label">Category</label>
              <div class="col-sm-10">
                <select class="form-control" name="id_content_category">
                  <?php foreach ($content_category as $a):   ?>
                    <option value="<?php echo $a->id_content_category?>" <?php echo $a->id_content_category == $content->id_content_category ? 'selected' : '' ?>><?php echo $a->category ?></option>
                  <?php endforeach; ?>
                </select>
                  <?=form_error('id_content_category')  ?>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="id_content" value="<?php echo $content->id_content ?>">
                <button type="submit" class="btn btn-default">Submit</button>
              </div>
            </div>
              <?php// } ?>
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
