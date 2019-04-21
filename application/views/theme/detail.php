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

    <!-- ============================================================================================== -->
            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Theme Details
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
                                    <img src="<?= base_url('storage/images/theme_photo/' . $theme->photo_icon) ?>" class="img-responsive">
                                </div>
                                <div class="col-md-9">
                                    <h2><?= $theme->title ?></h2>
                                    <p style="font-size: 16px;">Creator : <?= $theme->creator_name ?></p>
                                    <p style="font-size: 16px;">Added : <?= $theme->uploaded_date ?></p>
                                    <p style="font-size: 16px;">Category : <?= $theme->category_name ?></p>
                                    <p style="font-size: 16px;">Rating : <?= $theme->rating ?></p>
                                    <button class="btn btn-success">Install</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"> 
                                    <p align="justify"><?= $theme->description?> </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-size:20px" align="center">Sreenshoots</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="theme-screenshots-carousel" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php 
                                            $img_number = 0;
                                            foreach($screenshots as $screenshot): 
                                            ?>
                                            <li data-target="#theme-screenshots-carousel" data-slide-to="<?= $img_number ?>" class="<?= $img_number == 0 ? 'active' : NULL; ?>"></li>
                                            <?php 
                                            $img_number++;
                                            endforeach; 
                                            ?>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner" role="listbox">
                                            <?php 
                                            $img_number = 0;
                                            foreach($screenshots as $screenshot): 
                                            ?>
                                            <div class="item <?= $img_number == 0 ? 'active' : NULL; ?>">
                                                <img src="<?= base_url($screenshot->url.$screenshot->file_name) ?>" alt="<?= $screenshot->file_name ?>">
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                            <?php 
                                            $img_number++;
                                            endforeach; 
                                            ?>
                                            </div>
                                        </div>

                                        <!-- Controls -->
                                        <a class="left carousel-control" href="#theme-screenshots-carousel" role="button" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#theme-screenshots-carousel" role="button" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
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
    <!-- ============================================================================================== -->

    <?= $page_resource['admin_footer'] ?>
</div>
<!-- ./wrapper -->
    <?= $page_resource['admin_scripts'] ?>
</body>
</html>
