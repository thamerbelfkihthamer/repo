<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Serveurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('serveurs'); ?>">Serveurs</a></li>
            <li class="active"><a href="<?php echo site_url('serveurs/edit'); ?>">Modification</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Serveur</h3><br>
                        <?php if( $this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('serveurs/update/'.$serveur[0]->id) ?>" method="post">
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nom" value="<?php echo $serveur[0]->lastname ;?>" />
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <!-- /.form group -->
                            <div class="form-group">
                                <label>Mot de passe </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-keyboard-o"></i>
                                    </div>
                                    <input type="text" class="form-control" name="motdepasss">
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
                                        <option value="1" <?php echo ('Admin' == $user[0]->name) ? "selected" : "";  ?>>Admin</option>
                                        <option value="2" <?php echo ('User' == $user[0]->name) ? "selected" : "";  ?>>user</option>
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
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>


