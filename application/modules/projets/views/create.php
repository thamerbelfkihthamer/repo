<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Projets
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('projets'); ?>">Projets</a></li>
            <li class="active"><a href="<?php echo site_url('projets/create'); ?>">Creation</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Nouveau Projet</h3><br>
                        <?php if( $this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="box-body">
                        <form action="<?php echo site_url('projets/store') ?>" method="post">
                            <!-- IP mask -->
                            <div class="form-group">
                                <label>Nom</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-info"></i>
                                    </div>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Client</label>
                                <select name="client" class="form-control select2 select2-hidden-accessible choosen" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option disabled selected>Selectionner client</option>
                                    <?php foreach($clients as $client){?>
                                        <option value="<?php echo $client->id?>"><?php echo $client->firstname ; echo' ' ;echo $client->lastname;?></option>
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


