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
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Type service</label>
                                <select name="typeservice" ng-model="url"
                                        class="form-control select2 select2-hidden-accessible choosen"
                                        style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option value="Nom domaine">Nom domaine</option>
                                    <option value="Service Emailing">Service Emailing</option>
                                    <option value="Certification SSR">Cetification SSR</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date Début </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="date" class="form-control" name="datedebut">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date Fin</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="date" class="form-control" name="datefin">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Prix Achat</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="number" class="form-control" name="prixachat" placeholder="1000 dt">
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
                                        <input type="number" class="form-control" name="prixvente" placeholder="1000 dt">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner Status</option>
                                        <?php foreach ($status as $statu) { ?>
                                            <option value="<?php echo $statu->id ?>"><?php echo $statu->description;
                                                ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Serveur</label>
                                    <select name="serveur" class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner serveur</option>
                                        <?php foreach ($serveurs as $serveur) { ?>
                                            <option value="<?php echo $serveur->serveur_id ?>"><?php echo $serveur->serveur_name;
                                                ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client</label>
                                    <select name="client" class="form-control select2 select2-hidden-accessible choosen"
                                            style="width: 100%;"
                                            tabindex="-1" aria-hidden="true">
                                        <option disabled selected>Selectionner Client</option>
                                        <?php foreach ($clients as $client) { ?>
                                            <option value="<?php echo $client->client_id ?>"><?php echo $client->firstname; echo $client->lastname;
                                                ?></option>
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
<script src="<?php echo base_url(); ?>application/assets/js/ModelAccesView.js"></script>



