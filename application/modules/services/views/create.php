<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Services
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('services'); ?>">Services</a></li>
            <li class="active"><a href="<?php echo site_url('services/create'); ?>">Creation</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Nouveau Service</h3><br>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('services/store') ?>" method="post">
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Type d'acces</label>
                                <select name="typeacces" ng-model="url"
                                        class="form-control select2 select2-hidden-accessible choosen"
                                        style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option value="ftp">FTP</option>
                                    <option value="ssh">SSH</option>
                                    <option value="mysql">Mysql</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Identifiant</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" ng-model="nom" name="Identifiant">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Mot de passe </label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" ng-model="motdepass" name="motdepass">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <?php if($serveur_id == null){?>
                            <div class="form-group">
                                <label>Serveur</label>
                                <select name="serveur_id" class="form-control select2 select2-hidden-accessible choosen"
                                        style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option disabled selected>Selectionner client</option>
                                    <?php foreach ($serveurs as $serveur) { ?>
                                        <option value="<?php echo $serveur->id ?>"><?php echo $serveur->name;
                                            ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <?php }else{?>
                            <input type="hidden" class="form-control" name="serveur_id"
                                   value="<?php echo $serveur_id; ?>">
                            <?php } ?>
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
<script src="<?php echo base_url(); ?>application/assets/js/ModelAccesView.js"></script>



