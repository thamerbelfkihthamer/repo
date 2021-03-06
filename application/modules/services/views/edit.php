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
            <li class="active"><a href="<?php echo site_url('services/edit'); ?>">Modification</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Service</h3><br>
                        <?php if ($this->session->flashdata('error')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('services/update/' . $service[0]->id_service) ?>"
                              method="post">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Type service</label>
                                    <select name="typeservice" ng-model="url"
                                            class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option
                                            value="Nom domaine" <?php echo ("Nom domaine" == $service[0]->type_service) ? "selected" : ""; ?>>
                                            Nom domaine
                                        </option>
                                        <option
                                            value="Service Emailing" <?php echo ("Service Emailing" == $service[0]->type_service) ? "selected" : ""; ?>>
                                            Service Emailing
                                        </option>
                                        <option
                                            value="Certification SSR" <?php echo ("Certification SSR" == $service[0]->type_service) ? "selected" : ""; ?>>
                                            Cetification SSR
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Date Début </label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-info"></i>
                                        </div>
                                        <input type="date" class="form-control" name="datedebut"
                                               value="<?php echo $service[0]->datedebut ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Date Fin</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-info"></i>
                                        </div>
                                        <input type="date" class="form-control" name="datefin"
                                               value="<?php echo $service[0]->datefin ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Prix Achat</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-info"></i>
                                        </div>
                                        <input type="number" class="form-control" name="prixachat" placeholder="1000 dt"
                                               value="<?php echo $service[0]->prix_achat ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Prix Vente</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa  fa-info"></i>
                                        </div>
                                        <input type="number" class="form-control" name="prixvente" placeholder="1000 dt"
                                               value="<?php echo $service[0]->prix_vente ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner Status</option>
                                        <?php foreach ($status as $statu) { ?>
                                            <option
                                                value="<?php echo $statu->id ?>" <?php echo ($statu->id == $service[0]->id_status) ? "selected" : ""; ?>><?php echo $statu->description;
                                                ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Serveur</label>
                                    <select name="serveur"
                                            class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner serveur</option>
                                        <?php foreach ($serveurs as $serveur) { ?>
                                            <option
                                                value="<?php echo $serveur->serveur_id ?>" <?php echo ($serveur->serveur_id == $service[0]->id_serveur) ? "selected" : ""; ?>><?php echo $serveur->serveur_name;
                                                ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client"
                                            class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner Client</option>
                                        <?php foreach ($clients as $client) { ?>
                                            <option value="<?php echo $client->client_id ?>" <?php echo ($client->client_id == $service[0]->id_client) ? "selected" :"";?>>
                                                <?php echo $client->firstname;
                                                echo $client->lastname;
                                                ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contrat</label>
                                    <select name="contrat" class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner Contrat</option>
                                        <?php foreach ($contrats as $contrat) { ?>
                                            <option value="<?php echo $contrat->id ?>" <?php echo ($contrat->id == $service[0]->id_contrat) ? "selected" :"";?>><?php echo $contrat->code;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
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


