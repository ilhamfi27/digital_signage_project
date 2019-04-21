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
        LIST CONTENT Category
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
  
       <div class="col-lg-3 col-lg-offset-9">
          <div class="input-group">
            <!-- search -->
            <?php echo form_open('front_display_new/search') ?>
            <input type="text" class="form-control" name ='keyword'placeholder="Search for...">
            <span class="input-group-btn">
            <a href="<?= site_url('front_display_new/search') ?>">
              <button class="btn btn-default" type="button">Go</button>   
              </a>
            </span>
            <?php echo form_close() ?>
          </div><!-- /input-group -->
        </div><!-- /.col-lg-6 -->

        </div>
        <div class="box-body">
           <table id="list-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Category</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  //pagination
                  // $paging = $this->uri->segment('3')+1;
                $no = 1;
                foreach($content_category as $s):
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $s->category; ?></td>
                  <td>
                    <a href="<?php echo site_url('front_display_new/editcontent_category/'.$s->id_content_category); ?>">
                      <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('front_display_new/hapuscontent_category/'.$s->id_content_category); ?>">
                      <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php 
                $no++;
                endforeach;
                ?>
           </table>
           <?php
           //pagination
              // echo $this->pagination->create_link();
           ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
           </tfoot>
                 <a href="<?php echo site_url('front_display_new/input_content_category'); ?>">
                      <button class="btn btn-primary">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                      </button>
                  </a>
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
