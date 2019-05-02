<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Database Migration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url("assets/vendor/bootstrap_v4/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url("assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css"); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= base_url("assets/vendor/Ionicons/css/ionicons.min.css"); ?>" />
    <style>
        .content_box{
            float:left;
            width:100%;
        }
        .left_bar{
            float:left;
            width:15%;
            background:#eaf4ff;
            height:100vh;
        }

        .right_bar{
            float:left;
            width:85%;
            padding:15px;
                /*border-left:1px solid #ccc;*/
                height:100%;
        }

        .nav-tabs--vertical li{
            float:left;
            width:100%;
            padding:0;
            position:relative;
        }


        .nav-tabs--vertical li a{
            float:left;
            width:100%;
            padding: 15px;
            border-bottom:1px solid #adcff7;
            color:#1276F0;
        }

        .nav-tabs--vertical li a.active::after {
            content: "";
            border-color: #1276F0;
            border-style: solid;
            position: absolute;
            right: -8px;
            /* border-top: transparent; */
            border-right: transparent;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            /*border-bottom: 16px solid #1276F0;*/
            border-bottom: 16px solid #fff;
            border-top: 0;
            transform: rotate(270deg);
            z-index:999;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #eaf4ff;">
        <a class="navbar-brand" href="<?= base_url("migrate/"); ?>">Migrations</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url("/"); ?>">Home <span class="sr-only">(current)</span></a>
                </li>   
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="content_box">
            <div class="left_bar">
                <ul class=" nav-tabs--vertical nav">
                    <li class="nav-item">
                        <a href="<?= site_url('migrate/') ?>" class="nav-link">Migration List</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= site_url('migrate/add_migration_file') ?>" class="nav-link active">Add Migration File</a>
                    </li>
                </ul>
            </div>
            <div class="right_bar">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="migration-list" role="tabpanel">
                        <h1>Migration list</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= base_url("assets/vendor/jquery/dist/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/bootstrap_v4/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= base_url("assets/vendor/datatables.net-bs4/js/jquery.dataTables.js"); ?>"></script>
    <script src="<?= base_url("assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
</body>
</html>