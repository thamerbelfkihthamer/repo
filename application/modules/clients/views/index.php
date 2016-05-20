<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<section class="content-wrapper"    ng-controller="ClientController">
    <?php $this->load->view('clients/create')?>
    <?php $this->load->view('clients/edit')?>
    <?php $this->load->view('clients/delete')?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Clients
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="<?php echo site_url('clients'); ?>">Clients</a></li>
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
                                    <a href="" data-toggle="modal" data-target="#ClientModal">
                                        <i class="fa fa-user-plus fa-lg"></i>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get" action="<?php echo site_url('clients/index') ?>">
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
                                                </select></label></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter"><label>Rechercher :
                                                <input
                                                    type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="example1" name="search" onchange="this.form.submit()">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable"
                                           role="grid" aria-describedby="example1_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Nom
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Prenom
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 202px;">Telephone
                                            </th>
                                            <th tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                >Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (count($clients) > 0) {
                                            foreach ($clients as $client) { ?>

                                                <tr role="row" class="odd">
                                                    <td><?php echo $client->lastname ?></td>
                                                    <td><?php echo $client->firstname?></td>
                                                    <td><?php echo $client->email ?></td>
                                                   <td> <?php echo $client->tel?></td>
                                                    <td>
                                                        <a href=""
                                                           style="margin-right: 10px; margin-left: 5px;" data-toggle="modal" data-target="#editModal" ng-click="editclient(<?php echo $client->client_id;?>)">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                        </a>
                                                        <a href="" data-toggle="modal" data-target="#deleteModal" ng-click="showdeleteclient(<?php echo $client->client_id; ?>)">
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
                                        présentation <?php echo  $start?> à <?php   echo ($limit > count($clients)) ? count($clients) : $limit;?> de <?php echo  count($clients)?> entrées
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if (count($clients)) { ?>
                                        <!---Pagination --->
                                        <?php $this->load->view("templates/admin/pagination"); ?>
                                        <!---End pagination --->
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
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script src="<?php echo base_url(); ?>application/assets/public/Clients/client.js"></script>



