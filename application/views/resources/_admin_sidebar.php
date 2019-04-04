<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image" style="height: 40px;">
                <img src="<?= base_url('storage/images/user_avatar/' . $user_data->avatar) ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $user_data->public_identity ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Add Ons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('add_ons/index') ?>"><i class="fa fa-circle-o"></i> Add Ons</a></li>
                    <li><a href="<?= site_url('add_ons/install_addon') ?>"><i class="fa fa-circle-o"></i> Installed Add On</a></li>
                    <?php if($this->session->level === "admin"){ ?>
                    <li><a href="<?= site_url('add_ons/new_addon')?>"><i class="fa fa-circle-o"></i> New Add-on</a></li>
                    <li><a href="<?= site_url('add_ons/new_creator') ?>"><i class="fa fa-circle-o"></i> New Creator</a></li>
                    <li><a href="<?= site_url('add_ons/list_addon') ?>"><i class="fa fa-circle-o"></i> List Add On</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Appearance</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= base_url('appearance/') ?>"><i class="fa fa-circle-o"></i> Themes</a></li>
                    <?php if($this->session->level === "admin"){ ?>
                    <li><a href="<?= base_url('appearance/new_theme') ?>"><i class="fa fa-circle-o"></i> New Theme</a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Front Display</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('front_display/index') ?>"><i class="fa fa-circle-o"></i> Content</a></li>
                    <li><a href="<?= site_url('front_display/indexLayout') ?>"><i class="fa fa-circle-o"></i> Layout</a></li>
                    <li><a href="<?= site_url('#')?>"><i class="fa fa-circle-o"></i> Play</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Billing</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?= site_url('#') ?>"><i class="fa fa-circle-o"></i> Payment</a></li>
                    <li><a href="<?= site_url('#') ?>"><i class="fa fa-circle-o"></i> Cetak</a></li>
                    <li><a href="<?= site_url('#')?>"><i class="fa fa-circle-o"></i> View</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
