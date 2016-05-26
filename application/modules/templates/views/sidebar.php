<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <style type="text/css">
.disabled{
    pointer-events:none;
    opacity:0.4;
}
        </style>
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
                <a href="<?php echo site_url('services') ?>" <?php if($this->session->userdata('role') == "Administrateur Systéme"){echo 'class="disabled"';}?>>
                    <i class="fa fa-book"></i> <span>Services</span>
                </a>
            </li>


            <li class="treeview">
                <a href="<?php echo site_url('contrats') ?>" <?php if($this->session->userdata('role') == "Administrateur Systéme"){echo 'class="disabled"';}?>>
                    <i class="fa fa-globe"></i> <span>Contrats</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo site_url('clients') ?>" <?php if($this->session->userdata('role') == "Administrateur Systéme"){echo 'class="disabled"';}?>>
                    <i class="fa fa-user"></i> <span>Clients</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo site_url('fournisseurs') ?>" <?php if($this->session->userdata('role') == "Administrateur finance"){echo 'class="disabled"';}?>>
                    <i class="fa fa-globe"></i> <span>Fournisseurs</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo site_url('serveurs') ?>" <?php if($this->session->userdata('role') == "Administrateur finance"){echo 'class="disabled"';}?>>
                    <i class="fa fa-server"></i> <span>Serveurs</span>
                </a>
            </li>

            <li class="treeview">
                <a href="<?php echo site_url('acces') ?>" <?php if($this->session->userdata('role') == "Administrateur finance"){echo 'class="disabled"';}?>>
                    <i class="fa fa-server"></i> <span>Accés</span>
                </a>
            </li>
            <!--
            <li class="treeview">
                <a href="<?php echo site_url('moniteurs') ?>" <?php if($this->session->userdata('role') == "Administrateur finance"){echo 'class="disabled"';}?>>
                    <i class="fa fa-globe"></i> <span>Moniteurs</span>
                </a>
            </li>
        -->
            <li class="treeview"><a href="<?php echo site_url('auth') ?>" <?php if($this->session->userdata('role') == "Administrateur Systéme" || $this->session->userdata('role') == "Administrateur finance"){echo 'class="disabled"';}?>>
                    <i class="fa fa-circle-o text-yellow"></i> <span>Utilisateurs</span>
                </a>
            </li>
            <li class="treeview"><a href="<?php echo site_url('groupes') ?>" <?php if($this->session->userdata('role') == "Administrateur Systéme" || $this->session->userdata('role') == "Administrateur finance" ){echo 'class="disabled"';}?>>
                    <i class="fa fa-circle-o text-aqua"></i> <span>Roles</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>