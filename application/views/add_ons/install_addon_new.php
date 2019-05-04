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
        Data Install Add Ons
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <div class="box-body">
              <div class="row">
                  <!-- <div class="col-lg-3 col-lg-offset-9">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for...">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go</button>
                      </span>
                    </div>
                  </div> -->
                  <div class="col-md-12">
                    <table class="table table-responsive" id="installed-add-ons">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Add On Title</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 0; 
                        foreach($add_ons as $add_on){ 
                        ?>
                        <tr>
                          <td><?= ($i + 1) ?></td>
                          <td>
                            <label><?= $add_on->title ?></label><br>
                            <img src="<?= base_url('storage/images/add_ons/' . $add_on->photo_icon) ?>" width="150" height="150">
                          </td>
                          <td><a class="btn btn-success">Install</a></td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
              </div>
              <!-- <div class="row">
                <div class="col-md-12">
                  <nav aria-label="Page navigation" class="col-md-offset-4">
                    <ul class="pagination">
                      <li class="disabled">
                        <a href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                      </li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                      <li>
                        <a href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                      </li>
                    </ul>
                  </nav> -->
                  <!-- end nav -->
                <!-- </div>
              </div> -->
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
<!-- ./wrapper -->

<?= $page_resource['admin_scripts'] ?>
</body>
</html>

