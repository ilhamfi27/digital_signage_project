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
        LIST USER PAYMENT
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
                  <th>Id_Billing</th>
                  <th>Id_package</th>
                  <th>User_id</th>
                  <th>Duration_first</th>
                  <th>Duration_last</th>
                  <th>Email</th>
                  <th>name</th>
                 <!--  <th>Keterangan</th> -->
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($billing as $row):
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->id_billing; ?></td>
                  <td><?php echo $row->id_package; ?></td>
                  <td><?php echo $row->user_id; ?></td>
                  <td><?php echo $row->duration_first; ?></td>
                  <td><?php echo $row->duration_last; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <!-- <td>
                    <a href="<?php echo site_url('add_ons_new/details/' . $row->id); ?>">
                      <button class="btn btn-success">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons_new/edit_plugin/' . $row->id); ?>">
                      <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons_new/delete_plugin/' . $row->id); ?>">
                      <button class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                      </button>
                    </a>
                  </td> -->
                </tr>
                <?php 
                $no++;
                endforeach;
                ?>
                </tfoot>
           </table>
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
