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
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get" action="<?php echo site_url('contrats/show/' . $contrat_id) ?>">
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
                                                        value="100" <?php echo (100 == $startt) ? "selected" : ""; ?>>
                                                        100
                                                    </option>
                                                </select></label></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="example1_filter" class="dataTables_filter"><label>Rechercher :<input
                                                    type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="example1" name="search"
                                                    onchange="this.form.submit()"></label></div>
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
                                                style="width: 163px;">Type
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Date Début
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Date Fin
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Prix Achat
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Prix Vente
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Status
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Serveur
                                            </th>
                                            <th tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                >Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (count($services) > 0) {
                                            foreach ($services as $service) { ?>

                                                <tr role="row" class="odd">
                                                    <td><?php echo $service->type_service ?></td>
                                                    <td><?php echo $service->datedebut?></td>
                                                    <td><?php echo $service->datefin ?></td>
                                                    <td><?php echo $service->prix_achat ?></td>
                                                    <td><?php echo $service->prix_vente ?></td>
                                                    <td><span class="pull-center badge" style="background-color: <?php echo $service->color?>"><?php echo $service->description ?></span></td>
                                                    <td><?php echo $service->serveur_name ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('services/edit/' . $service->id_service) ?>"
                                                           style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                        </a>
                                                        <a href="<?php //echo site_url('services/delete/'.$service->id_service)?>" data-toggle="modal" data-target="#deleteModal" onclick=" return confirmdelete()">
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

                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if (count($services)) { ?>
                                        <!---PAgination --->

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
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script>
    function confirmdelete() {

        var answer = confirm('voulez-vous supprimer cet founisseur');

        return answer;
    }

</script>


