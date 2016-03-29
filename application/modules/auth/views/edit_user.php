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
            <li class="active"><a href="<?php echo site_url('auth/create_user'); ?>">Modification</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Modifier utilisateur</h3><br>
                        <?php if( $this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php }?>
                    </div>
                    <div class="box-body">
                        <?php echo form_open(uri_string());?>
                        <?php echo form_input($id);?>
                        <!-- IP mask -->
                        <div class="form-group has-feedback">
                            <label>Nom</label>
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
                                <?php echo form_input($last_name);?>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- IP mask -->


                        <div class="form-group">
                            <label>Société</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa  fa-bank"></i>
                                </div>
                                <?php echo form_input($company);?>
                            </div>
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label>Telephone</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <?php echo form_input($phone);?>
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
                                <?php echo form_input($password);?>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="groups" class="form-control select2 select2-hidden-accessible choosen" style="width: 100%;"
                                    tabindex="-1" aria-hidden="true">
                                <?php foreach($groups as $group){?>
                                    <option value="<?php echo $group['id']?>" <?php echo ($group['id'] == $currentGroups[0]->id) ? "selected" : ""; ?> ><?php echo $group['description']?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <?php echo form_submit('submit', 'Modifier', "class='btn btn-primary btn-block btn-flat'"); ?>
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

