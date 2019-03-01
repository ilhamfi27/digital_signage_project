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
                <ul class=" nav-tabs--vertical nav" role="navigation">
                    <li class="nav-item">
                        <a href="#migration-list" class="nav-link active" data-toggle="tab" role="tab" aria-controls="migration-list">Migration List</a>
                    </li>
                </ul>
            </div>
            <div class="right_bar">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="migration-list" role="tabpanel">
                        <h1>Migration list</h1>
                        <?= $migration_status ?>
                        <table class="table table-bordered" id="migration-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Migration Name</th>
                                    <th>Version</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                foreach ($files as $key => $value) : 
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $value ?></td>
                                    <td><?= $key ?></td>
                                    <td>
                                        <?php if ($no <= $migration_version) { ?>
                                        <span class="badge badge-success">Migrated</span>
                                        <?php } else { ?>
                                        <span class="badge badge-warning">Pending</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($no <= $migration_version) { ?>
                                        <a href="<?= site_url("migrate/execute/") . ($no-1) ?>"><button class="btn btn-sm btn-danger">Rollback</button></a>
                                        <?php } else { ?>
                                        <a href="<?= site_url("migrate/execute/") . $no ?>"><button class="btn btn-sm btn-success">Migrate</button></a>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="<?= base_url("migrate/execute"); ?>"><button type="button" class="btn btn-primary">Migrate All</button></a>
                                <a href="<?= base_url("migrate/execute/0"); ?>"><button type="button" class="btn btn-danger">Rollback All</button></a>
                                <a href="<?= base_url("migrate/"); ?>"><button type="button" class="btn btn-success"><span class="ion-android-refresh"></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?= base_url("assets/vendor/jquery/dist/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/bootstrap_v4/js/bootstrap.min.js"); ?>"></script>
    <script src="<?= base_url("assets/vendor/datatables.net-bs4/js/jquery.dataTables.js"); ?>"></script>
    <script src="<?= base_url("assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"); ?>"></script>
    <script>
        $(document).ready(function(){
            $("#migration-table").DataTable({
                "pageLength": 5,
                "order": [[ 0, "desc" ]]
            });
        });
    </script>
</body>
</html>