<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<style>
    .foo {
        width: 1000px;
        height: 10000px;
        overflow-y: hidden;
    }
</style>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo  site_url('dashboard'); ?>">Dashboard</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <iframe src="http://localhost:8082/"
                class="foo"
                scrolling="no"
                seamless="seamless">
        </iframe>
    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>


