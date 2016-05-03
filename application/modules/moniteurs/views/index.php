<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<style>
    .foo {
        width: 100%;
        min-height: 900px;
    }
</style>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Moniteur
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo  site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo  site_url('moniteurs'); ?>">Moniteur</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
                <iframe src="http://192.168.10.129:8082/"
                class="foo"
                scrolling="no"
                seamless="seamless" style="padding: 20px; border: 0px" onload="resizeIframe(this)">
        </iframe>
    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script language="javascript" type="text/javascript">
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
    }
</script>


