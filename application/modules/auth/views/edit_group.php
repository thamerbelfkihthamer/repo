<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
            <h1>
                  Groupe
            </h1>
            <ol class="breadcrumb">
                  <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                  <li class="active"><a href="<?php echo site_url('auth'); ?>">Groupe</a></li>
                  <li class="active"><a href="<?php echo site_url('auth/create_user'); ?>">Creation</a></li>
            </ol>
      </section>
      <!-- Main content -->
      <section class="content">
            <div class="row">
                  <div class="col-sm-12">
                        <div class="box box-danger">
                              <div class="box-header">
                                    <h3 class="box-title">Modifier Groupe</h3><br>
                                    <?php if( $this->session->flashdata('error')){ ?>
                                          <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <?php echo $this->session->flashdata('error'); ?>
                                          </div>
                                    <?php }?>
                              </div>
                              <div class="box-body">
                                    <?php echo form_open(current_url());?>
                                    <!-- IP mask -->
                                    <div class="form-group has-feedback">
                                          <label>Nom groupe</label>
                                          <div class="input-group">
                                                <div class="input-group-addon">
                                                      <i class="fa  fa-info"></i>
                                                </div>
                                                <?php echo form_input($group_name);?>
                                          </div>
                                    </div>
                                    <!-- /.form group -->
                                    <!-- IP mask -->
                                    <div class="form-group">
                                          <label>Description groupe</label>
                                          <div class="input-group">
                                                <div class="input-group-addon">
                                                      <i class="fa  fa-info"></i>
                                                </div>
                                                <?php echo form_input($group_description);?>
                                          </div>
                                          <!-- /.input group -->
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


