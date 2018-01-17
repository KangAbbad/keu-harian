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