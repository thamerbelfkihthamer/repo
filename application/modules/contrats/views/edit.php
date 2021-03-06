<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Contrats
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('contrats'); ?>">Contrats</a></li>
            <li class="active"><a href="<?php echo site_url('contrats/edit'); ?>">Modification</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Modifier Contrat</h3><br>
                        <?php if( $this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('contrats/update/'.$contrat[0]->id) ?>" method="post">
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="name" value="<?php echo $contrat[0]->name ;?>" />
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Date début contrat</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="date" class="form-control" name="datedebut" value="<?php echo $contrat[0]->datedebut?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date Fin contrat</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="date" class="form-control" name="datefin" value="<?php echo $contrat[0]->datefin?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Etat Payement</label>
                                <select name="projets[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selectionner les projet de ce contrat " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php foreach($projets as $projet){?>
                                        <option value="<?php echo $projet->id?>" <?php echo ($contrat[0]->id == $projet->id_contrat) ? "selected" : ""; ?>><?php echo $projet->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Etat Hebergement</label>
                                <select name="projets[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selectionner les projet de ce contrat " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php foreach($projets as $projet){?>
                                        <option value="<?php echo $projet->id?>" <?php echo ($contrat[0]->id == $projet->id_contrat) ? "selected" : ""; ?>><?php echo $projet->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Projet</label>
                                <select name="projets[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selectionner les projet de ce contrat " style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php foreach($projets as $projet){?>
                                        <option value="<?php echo $projet->id?>" <?php echo ($contrat[0]->id == $projet->id_contrat) ? "selected" : ""; ?>><?php echo $projet->name; ?></option>
                                    <?php } ?>
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

<script>
    $('.select2').select2();
</script>


