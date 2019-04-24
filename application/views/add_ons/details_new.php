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
                  <img src="<?= base_url('storage/images/add_ons/') . $plugins->uploaded ?>" class="img-responsive">
                </div>
                <div class="col-md-9">
                  <h2><?= $plugins->name ?></h2>
                  <span style="font-size: 30px; font-weight: 700; position: absolute; top: 10px; right: 20px;"><?= $plugins->price?></span>
                  <p style="font-size: 16px;">Creator :<a href=" <?= site_url('add_ons/detail_creator_new')?>"> <?= $plugins->name ?></p></a>
                  <p style="font-size: 16px;"><?= $plugins->date?></p>
                  <!-- <p style="font-size: 16px;">Rating</p> -->
                  <?php for ($i=0; $i < 5; $i++) { ?>
                  <span class="fa fa-star"></span>
                  <?php } ?>
                  <br>
                  <br>
                  <span class="fa fa-download" style="font-size: 20px;"></span> 56
                  <button class="btn btn-success" type="button" style="position: absolute; bottom: 0px; right: 20px;">BUY</button>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12"> 
                  <p align="justify" style="position: relative; margin-top: 20px;"><?= $plugins->description?> </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p style="font-size:20px" align="center">Sreenshoots</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <center>
                  <img src="<?= base_url('storage/images/memo.jpg')?>" width="400px" height="300px">
                  <P>Gambar 1</P>
                  </center>
                </div>
              </div>
              <div class="row">
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
                  </nav>
                  <!-- end nav -->
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
                            <li>
                                <div class="commenterImage">
                                  <img src="http://placekitten.com/50/50" />
                                </div>
                                <div class="commentText">
                                    <p class="">this is my 3rd edit. the game developers deserved a 5star rating in my 1 and 2 reveiws. But now sadly *sighs. Idk where or when the game went downhill. The offline and online mode lag, the inability to dribble in superstar difficulty level and also the opponets (superstar) are programmed very baddly...</p> <span class="date sub-text">on March 5th, 2014</span>

                                </div>
                            </li>
                            <li>
                                <div class="commenterImage">
                                  <img src="http://placekitten.com/45/45" />
                                </div>
                                <div class="commentText">
                                    <p class="">I liked the former version more though I'm quite okay with the current one too. As to quality of the game graphics, gameplay, commentators,goal celebrations, these above lined up features are just unbelievably advanced. The are so many big football game producers but i have to say KONAMI is beating ...</p> <span class="date sub-text">on March 5th, 2014</span>

                                </div>
                            </li>
                            <li>
                                <div class="commenterImage">
                                  <img src="http://placekitten.com/40/40" />
                                </div>
                                <div class="commentText">
                                    <p class="">1. The game offers no OFFLINE play. I understand that since this was to be downloaded for free but.. 2. It's more of a game of luck in collection of players. 3. t's tied up on collecting players. And guess what? You have to buy them if you need more of course. 4. No direction really, No Season, No C...</p> <span class="date sub-text">on March 5th, 2014</span>

                                </div>
                            </li>
                        </ul>
                        <form class="form-inline" role="form">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Your comments" />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default">Add</button>
                            </div>
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
