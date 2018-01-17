<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin QODR by GhafirGroup</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
<?= $this->tag->stylesheetLink('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>
<!-- Font Awesome -->
<?= $this->tag->stylesheetLink('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>
<!-- Ionicons -->
<?= $this->tag->stylesheetLink('assets/bower_components/Ionicons/css/ionicons.min.css') ?>
<!-- DataTables -->
<!-- <?= $this->tag->stylesheetLink('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?> -->
<!-- Theme style -->
<?= $this->tag->stylesheetLink('assets/dist/css/AdminLTE.min.css') ?>
<!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
<?= $this->tag->stylesheetLink('assets/dist/css/skins/_all-skins.min.css') ?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- Pnotify -->
<?= $this->tag->stylesheetLink('assets/pnotify/pnotify.css') ?>
<?= $this->tag->stylesheetLink('assets/pnotify/pnotify.brighttheme.css') ?>
<!-- jQuery 3 -->
<?= $this->tag->javascriptInclude('assets/bower_components/jquery/dist/jquery.min.js') ?>
<!-- DataTables -->
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>
<?= $this->tag->javascriptInclude('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>
<?= $this->tag->javascriptInclude('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>
<!-- Pnotify -->
<?= $this->tag->javascriptInclude('assets/pnotify/pnotify.js') ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
        <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Q</b>dr</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Qodr</b>MGL</span>
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
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- start message -->
                    <a href="#">
                        <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                    </li>
                    <!-- end message -->
                    <li>
                    <a href="#">
                        <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                    </li>
                    <li>
                    <a href="#">
                        <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                    </li>
                    <li>
                    <a href="#">
                        <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                    </li>
                    <li>
                    <a href="#">
                        <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
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
                    <li>
                    <a href="#">
                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                        page and may cause design problems
                    </a>
                    </li>
                    <li>
                    <a href="#">
                        <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                    </li>

                    <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                    </li>
                    <li>
                    <a href="#">
                        <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                    </li>
                </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
            </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                        </div>
                        </div>
                    </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">40% Complete</span>
                        </div>
                        </div>
                    </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">60% Complete</span>
                        </div>
                        </div>
                    </a>
                    </li>
                    <!-- end task item -->
                    <li><!-- Task item -->
                    <a href="#">
                        <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">80% Complete</span>
                        </div>
                        </div>
                    </a>
                    </li>
                    <!-- end task item -->
                </ul>
                </li>
                <li class="footer">
                <a href="#">View all tasks</a>
                </li>
            </ul>
            </li>
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <?php
                    if($this->session->has("auth")){
                        $auth = $this->session->get("auth");
                        $username = $auth['username'];
                        echo '<span class="hidden-xs">'.$username.'</span>';
                    }
                ?>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <?php
                    if($this->session->has("auth")){
                        $auth = $this->session->get("auth");
                        $username = $auth['username'];
                        $cabang_id = $auth['cabang_id'];
                        echo '<p>'
                             .$cabang_id.' - '.$username.
                             '</p>';
                    }
                ?>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                <div class="pull-right">
                    <a href="<?= $this->url->get('login/aksiLogout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </li>
            </ul>
            </li>
        </ul>
        </div>
    </nav>
</header>
        <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <?php
                if($this->session->has("auth")){
                    $auth = $this->session->get("auth");
                    $username = $auth['username'];
                    echo '<p>'.$username.'</p>';
                }
            ?>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN MENU</li>
            <li><a href="user"><i class="fa fa-book"></i> <span>User</span></a></li>
            <li class="treeview menu-open">
                <a href="#">
                  <i class="fa fa-laptop"></i> <span>Keuangan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" style="display: block;">
                  <li><a href="keu_harian"><i class="fa fa-circle-o"></i> Keuangan Harian</a></li>
                </ul>
              </li>
        </ul>
        
    </section>
    <!-- /.sidebar -->
</aside>

        <?= $this->getContent() ?>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017-2018 <a href="#">GhafirGroup</a>.</strong>
        </footer>
        </body>
        <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
        </div>
        <!-- Bootstrap 3.3.7 -->
<?= $this->tag->javascriptInclude('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>
<!-- SlimScroll -->
<?= $this->tag->javascriptInclude('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>
<!-- FastClick -->
<?= $this->tag->javascriptInclude('assets/bower_components/fastclick/lib/fastclick.js') ?>
<!-- AdminLTE App -->
<?= $this->tag->javascriptInclude('assets/dist/js/adminlte.min.js') ?>
<!-- AdminLTE for demo purposes -->
<?= $this->tag->javascriptInclude('assets/dist/js/demo.js') ?>
<!-- page script -->

<?= $this->tag->javascriptInclude('assets/pnotify/pnotify.js') ?>
<?= $this->tag->javascriptInclude('assets/pnotify/pnotify.buttons.js') ?>
<?= $this->tag->javascriptInclude('assets/pnotify/pnotify.nonblock.js') ?>
        <!-- ./wrapper -->
    </body>
</html>
