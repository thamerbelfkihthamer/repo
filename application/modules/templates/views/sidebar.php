<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Rechercher...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">
                NAVIGATION PRINCIPALE
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('dashboard') ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('moniteurs') ?>">
                    <i class="fa fa-globe"></i> <span>Moniteurs</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('projets') ?>">
                    <i class="fa fa-book"></i> <span>Projets</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('serveurs') ?>">
                    <i class="fa fa-server"></i> <span>Serveurs</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('services') ?>">
                    <i class="fa fa-server"></i> <span>Accés</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('contrats') ?>">
                    <i class="fa fa-globe"></i> <span>Contrats</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('fournisseurs') ?>">
                    <i class="fa fa-globe"></i> <span>Fournisseurs</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('clients') ?>">
                    <i class="fa fa-user"></i> <span>Clients</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('groupes') ?>">
                    <i class="fa fa-group"></i> <span>Groupes</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('auth') ?>">
                    <i class="fa fa-circle-o text-yellow"></i> <span>Utilisateurs</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-group"></i>
                    <span>Gestion Utilisateurs </span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="<?php echo site_url('groupes') ?>">
                            <i class="fa fa-circle-o text-aqua"></i> <span>Groupes</span>
                        </a></li>
                    <li><a href="<?php echo site_url('auth') ?>">
                            <i class="fa fa-circle-o text-yellow"></i> <span>Utilisateurs</span>
                        </a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>