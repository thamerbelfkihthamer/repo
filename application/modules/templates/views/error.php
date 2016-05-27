<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <br><br><br><br>
    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <div class="row">
                <div class="col-md-12">
                    <div class="error-content">
                        <h4><i class="fa fa-warning text-yellow"></i> Oops ! <br><br>
                            Vous n'avez pas les droits suffisants pour accéder à cette page.</h4>
                    </div>
                    <!-- /.error-content -->
                </div>
            </div>
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->


<?php echo Modules::run('templates/Templates/footer'); ?>
