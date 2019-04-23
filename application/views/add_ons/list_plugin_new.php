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
        LIST ADD ON
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
           <table id="list-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Uploaded</th>
                  <th>Description</th>
                  <th>Ratings</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Creator</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($plugins as $row):
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->title; ?></td>
                  <td><img src="<?=base_url().'./storage/images/add_ons/'.$row->uploaded;?>" width = '100' height ='100'></td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->ratings; ?></td>
                  <td><?php echo $row->date; ?></td>
                  <td><?php echo $row->price; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td>
                    <a href="<?php echo site_url('add_ons_new/edit_plugin/' . $row->id_plugin); ?>">
                      <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons_new/delete_plugin/' . $row->id_plugin); ?>">
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
                </tfoot>
           </table>
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

 <!--  Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
