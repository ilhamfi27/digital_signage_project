<header class="main-header">
    <!-- Logo -->
    <a href="<?= site_url("dashboard/") ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>DS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Digital Signage</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <!-- <span class="label label-warning">10</span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10 notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= base_url('storage/images/user_avatar/' . $user_data->avatar) ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $user_data->public_identity ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url('storage/images/user_avatar/' . $user_data->avatar) ?>" class="img-circle" alt="User Image">

                            <p>
                                <?= $user_data->public_identity . " - ". ucfirst($this->session->level) ?>
                                <small>Joined since <?= date("d M Y", strtotime($user_data->joined)) ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 col-xs-offset-8 text-center">
                                    <a href="<?= base_url('account/setting') ?>"><i class="fa fa-gears"></i></a>
                                </div>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url('dashboard/user_profile') ?>" class="btn btn-default btn-flat">Edit Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/login/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>