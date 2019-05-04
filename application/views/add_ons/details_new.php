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
        DETAILS ADD ONS
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?= base_url('storage/images/add_ons/') . $plugins->photo_icon ?>" class="img-responsive">
                </div>
                <div class="col-md-9">
                  <h2><?= $plugins->title ?></h2>
                  <span style="font-size: 30px; font-weight: 700; position: absolute; top: 10px; right: 20px;"><?= $plugins->price?></span>
                  <p style="font-size: 16px;">Creator :<a href=" <?= site_url('creator/detail/'.$plugins->id_creator)?>"> <?= $plugins->name ?></p></a>
                  <p style="font-size: 16px;"><?= $plugins->uploaded_date ?></p>
                  <!-- <p style="font-size: 16px;">Rating</p> -->
                  <?php //for ($i=0; $i < 5; $i++) { ?>
                  <!-- <span class="fa fa-star"></span> -->
                  <?php //} ?>
                  <br>
                  <br>
                  <!-- <span class="fa fa-download" style="font-size: 20px;"></span> 56 -->
                  <?php if($status == 1): ?>
                  <a href="#" class="btn btn-primary" type="button" style="position: absolute; bottom: 0px; right: 20px;">Install</a>
                  <?php else: ?>
                  <a href="<?= site_url("billing_new/create")?>" class="btn btn-success" type="button" style="position: absolute; bottom: 0px; right: 20px;">Buy</a>
                  <?php endif; ?> 
                </div>
              </div>


              <div class="row">
                <div class="col-md-12"> 
                  <p align="justify" style="position: relative; margin-top: 20px;"><?= $plugins->description?> </p>
                </div>
              </div>
             
              <hr>
              <div class="row">
                <div class="col-md-12">
                  <span style="font-size: 20px; font-weight: 900; display: block;">Review</span> 
                </div>
              </div>

              <div class="row">
                <div class=" col-md-12">
                    <div class="actionBox">
                        <ul class="commentList">
                          <?php foreach ($comment->result() as $com): ?>
                            
                            <li>
                                <div class="commenterImage">
                                  <img src="http://placekitten.com/50/50" />
                                </div>
                                <div class="commentText">
                                    <h5 style="font-weight: bold"><?php echo $com->username ?></h5>
                                    <p class=""><?php echo $com->content_comment ?></p> <span class="date sub-text">on <?php echo $com->date_time ?></span>

                                </div>
                            </li>
                          <?php endforeach ?>
                            
                        </ul>
                        <form class="form-inline" role="form" action="<?= site_url('comment/insert') ?>" method="post">
                          <div class="form-group">
                              <input class="form-control" type="text" name="content_comment" placeholder="Your comments" required/>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-default">Add</button>
                          </div>
                          <input type="hidden" name="id_plugin" value="<?= $id_plugin ?>">
                          <input type="hidden" name="user_id" value=<?= $this->session->userdata('id') ?>>
                      </form>
                    </div>
                  </div>
                </div>
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
<?= $page_resource['admin_scripts'] ?>
</body>
</html>
