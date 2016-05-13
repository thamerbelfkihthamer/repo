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
                        <form action="<?php echo site_url('serveurs/update/'.$serveur[0]->serveur_id) ?>" method="post">
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="<?php echo $serveur[0]->serveur_name?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Type serveur</label>
                                <select name="typeserveur" ng-model="url"
                                        class="form-control select2 select2-hidden-accessible choosen"
                                        style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option value="dédié" value="<?php echo $serveur[0]->type?>" <?php echo ($serveur[0]->type == 'dédié') ? "selected" : ""; ?>>Dédié</option>
                                    <option value="mutualisé"  value="<?php echo $serveur[0]->type?>" <?php echo ($serveur[0]->type == 'mutualisé') ? "selected" : ""; ?>>Mutualisé</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address IP</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="addressip" value="<?php echo $serveur[0]->addressip?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Système exploitation</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="system" value="<?php echo $serveur[0]->systemexploi?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Espace dique</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="espacedisque" value="<?php echo $serveur[0]->disquedur?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Prix</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="prix" value="<?php echo $serveur[0]->prix?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Fournisseur</label>
                                <select name="fournisseur" class="form-control select2 select2-hidden-accessible choosen" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option disabled>Selectionner fournisseur</option>
                                    <?php foreach($fournisseurs as $fournisseur){?>
                                        <option value="<?php echo $fournisseur->id?>" <?php echo ($serveur[0]->id_fournisseur == $fournisseur->id) ? "selected" : ""; ?> ><?php echo $fournisseur->name?></option>
                                    <?php }?>
                                </select>
                            </div>
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


