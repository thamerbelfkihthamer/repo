<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Status
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('auth'); ?>">Status</a></li>
            <li class="active"><a href="<?php echo site_url('auth/create_user'); ?>">Status</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Status</h3><br>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <?php echo form_open("auth/deactivate/" . $user->id); ?>
                        <!-- IP mask -->
                        <div class="form-group has-feedback">
                            <label>Activation</label>

                            <div class="input-group">
                                <?php echo lang('deactivate_confirm_y_label', 'confirm'); ?>
                                <input type="radio" name="confirm" value="yes" checked="checked"/>
                            </div>
                            <div class="input-group">

                                <div class="input-group">
                                    <?php echo lang('deactivate_confirm_n_label', 'confirm'); ?>
                                    <input type="radio" name="confirm" value="no"/>
                                </div>
                            </div>
                            <?php echo form_hidden($csrf); ?>
                            <?php echo form_hidden(array('id' => $user->id)); ?>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <?php echo form_submit('submit', 'Modifier', "class='btn btn-primary btn-block btn-flat'"); ?>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.box -->
                </div>
            </div>

    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>


