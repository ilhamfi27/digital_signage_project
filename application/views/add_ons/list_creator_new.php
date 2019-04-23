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
        LIST CREATOR
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
          <div class="table-responsive">
            <table id="list-data" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Place Of Birth</th>
                  <th>Date Of Birth</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Gender</th>
                  <th>Religion</th>
                  <th>Citizenship</th>
                  <th>Blood Group</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($creator as $row):
                ?>
                <tr>
                  <!-- SELECT 
                    `id_creator`, 
                    `email`, 
                    `phone_number`, 
                    `name`, 
                    `address`, 
                    `image`, 
                    `place_of_birth`, 
                    `date_of_birth`, 
                    `gender`, 
                    `religion`, 
                    `citizenship`, 
                    `blood_group` 
                  FROM `creator` WHERE 1 -->
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->phone_number; ?></td>
                  <td><?php echo $row->name; ?></td>
                  <td><?php echo $row->address; ?></td>
                  <td><?php echo $row->image; ?></td>
                  <td><?php echo $row->place_of_birth; ?></td>
                  <td><?php echo $row->date_of_birth; ?></td>
                  <td><?php echo $row->gender; ?></td>
                  <td><?php echo $row->religion; ?></td>
                  <td><?php echo $row->citizenship; ?></td>
                  <td><?php echo $row->blood_group; ?></td>
                  <td>
                    <a href="<?php echo site_url('add_ons_new/edit_creator/' . $row->id_creator); ?>">
                      <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons_new/delete_creator/' . $row->id_creator); ?>">
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
           <a href="<?php echo site_url('add_ons_new/insert_creator/' . $row->id_creator); ?>">
                      <button class="btn btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                      </button>
                    </a>

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
