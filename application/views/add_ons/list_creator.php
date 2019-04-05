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
                  <th>nama</th>
                  <th>alamat</th>
                  <th>tempat_lahir</th>
                  <th>tanggal_lahir</th>
                  <th>no_telp</th>
                  <th>email</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1;
                foreach($creator as $row):
                ?>
                <tr>
                  <!-- 
                  `id`
                  `nama`
                  `alamat`
                  `tempat_lahir`
                  `tanggal_lahir`
                  `no_telp`
                  `email` 
                -->
                  <td><?php echo $no; ?></td>
                  <td><?php echo $row->nama; ?></td>
                  <td><?php echo $row->alamat; ?></td>
                  <td><?php echo $row->tempat_lahir; ?></td>
                  <td><?php echo $row->tanggal_lahir; ?></td>
                  <td><?php echo $row->no_telp; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td>
                    <a href="<?php echo site_url('add_ons/details/' . $row->id); ?>">
                      <button class="btn btn-success">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons/edit_creator/' . $row->id); ?>">
                      <button class="btn btn-primary">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                      </button>
                    </a>
                    <a href="<?php echo site_url('add_ons/delete_creator/' . $row->id); ?>">
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

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<?= $page_resource['admin_scripts'] ?>
</body>
</html>
