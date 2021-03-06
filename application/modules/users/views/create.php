<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Utilisateurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('auth'); ?>">Utilisateurs</a></li>
            <li class="active"><a href="<?php echo site_url('auth/create_user'); ?>">Creation</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Nouveau utilisateur</h3><br>
                        <?php if( $this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="box-body">
                        <?php echo form_open("auth/create_user");?>
                            <!-- IP mask -->
                        <div class="form-group has-feedback">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa  fa-info"></i>
                                </div>
                                <?php echo form_input($first_name);?>
                            </div>
                        </div>
                            <!-- /.form group -->
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Prenom</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="prenom">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Mot de passe </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-keyboard-o"></i>
                                    </div>
                                    <input type="password" class="form-control" name="motdepasss">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Role </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-keyboard-o"></i>
                                    </div>
                                    <select class="form-control" name="role">
                                        <option value="1">Admin</option>
                                        <option value="2">user</option>
                                    </select>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                    <?php echo form_close();?>
                </div>
                <!-- /.box -->
            </div>
        </div>

    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>


