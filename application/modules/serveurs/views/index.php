<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper">
    <?php $this->load->view('serveurs/delete')?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Serveurs
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('serveurs'); ?>">Serveurs</a></li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if ($this->session->flashdata('succus')) { ?>
                                    <script>
                                        $(document).ready(function () {
                                            $.notify('<?php echo $this->session->flashdata('succus'); ?>', {
                                                type: 'success',
                                                timer: '500',
                                                animate: {
                                                    enter: 'animated fadeInRight',
                                                    exit: 'animated fadeOutRight'
                                                }
                                            });
                                        });
                                    </script>
                                <?php } ?>
                                <?php if ($this->session->flashdata('error')) { ?>
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <a href="<?php echo site_url('serveurs/create') ?>">
                                        <i class="fa fa-user-plus fa-lg"></i>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get" action="<?php echo site_url('serveurs/index') ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length"><label>
                                                <select
                                                     aria-controls="example1"
                                                    class="form-control input-sm" onchange="this.form.submit()"
                                                    name="startt">
                                                    <option value="10" <?php echo (10 == $startt) ? "selected" : ""; ?>>
                                                        10
                                                    </option>
                                                    <option value="25" <?php echo (25 == $startt) ? "selected" : ""; ?>>
                                                        25
                                                    </option>
                                                    <option value="50" <?php echo (50 == $startt) ? "selected" : ""; ?>>
                                                        50
                                                    </option>
                                                    <option
                                                        value="100" <?php echo (100 == $startt) ? "selected" : ""; ?>>100
                                                    </option>
                                                </select> </label></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter"><label>Rechercher :<input
                                                    type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="example1" name="search" onchange="this.form.submit()"></label></div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Nom
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Type
                                            </th><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Address ip
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Système exploitation
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Espace disque
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">prix
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Fournisseur
                                            </th>
                                            <th tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                >Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (count($serveurs) > 0) {
                                            foreach ($serveurs as $serveur) { ?>

                                                <tr role="row" class="odd">
                                                    <td><?php echo $serveur->serveur_name ?></td>
                                                    <td><?php echo $serveur->type ?></td>
                                                    <td><?php echo $serveur->addressip ?></td>
                                                    <td><?php echo $serveur->systemexploi ?></td>
                                                    <td><?php echo $serveur->disquedur ?></td>
                                                    <td><?php echo $serveur->prix ?></td>
                                                    <td><?php echo $serveur->name ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('serveurs/edit/' . $serveur->serveur_id) ?>"
                                                           style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('serveurs/delete/'.$serveur->serveur_id)?>" data-toggle="modal" data-target="#deleteModal" onclick=" return confirmdelete()" style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa fa-trash-o fa-lg"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                        Présentation  <?php echo  $start?> à <?php   echo ($limit > count($serveurs)) ? count($serveurs) : $limit;?>  de <?php echo  count($serveurs)?> entrées
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if (count($serveurs)) { ?>
                                        <!---PAgination --->
                                        <?php $this->load->view("templates/admin/pagination"); ?>
                                        <!---End PAgination --->
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        </div>
    </section>
    <?php  $this->load->view('serveurs/modal');?>
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script src="<?php echo base_url();?>application/assets/js/ModelAccesView.js"></script>
<script>
    function confirmdelete(){
        var answer = confirm('voulez-vous supprimer cet utilisateurs');
        return answer;
    }

</script>


