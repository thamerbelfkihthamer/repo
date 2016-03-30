<?php echo Modules::run('templates/Templates/header'); ?>
<?php echo Modules::run('templates/Templates/sidebar'); ?>
<style>
    .etat{
        margin-left: 20%;
        height: auto;
        width: 100px;
        background-color: #0088cc;
        border-radius: 40%;
        padding: 2% 15%;
        color: #ffffff;
    }
</style>
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
                            <div class="col-sm-6">
                                <div class="pull-right">
                                    <a href="<?php echo site_url('contrats/create') ?>">
                                        <i class="fa fa-user-plus fa-lg"></i>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get" action="<?php echo site_url('contrats/index') ?>">
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
                                                style="width: 163px;">Date début
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Date fin
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 163px;">Etat
                                            </th>
                                            <th tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                >Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (count($contrats) > 0) {
                                            foreach ($contrats as $contrat) { ?>

                                                <tr role="row" class="odd">
                                                    <td><?php echo $contrat->name ?></td>
                                                    <td><?php echo $contrat->datedebut ?></td>
                                                    <td><?php echo $contrat->datefin ?></td>
                                                    <td><?php echo '<p class="etat">Traité</p>' ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('contrats/show/'.$contrat->id)?>"  style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa   fa-info-circle fa-lg"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('contrats/edit/' . $contrat->id) ?>"
                                                           style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                        </a>
                                                        <a href="<?php echo site_url('contrats/delete/'.$contrat->id)?>" onclick=" return confirmdelete()">
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
                                        Présentation  <?php echo  $start?> à <?php   echo ($limit > count($contrats)) ? count($contrats) : $limit;?> de <?php echo  count($contrats)?> entrées
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if (count($contrats)) { ?>
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
    <!--  main Content -->
</section><!-- Content Wrapper-->
<?php echo Modules::run('templates/Templates/footer'); ?>
<script>
    function confirmdelete(){

        var answer = confirm('voulez-vous supprimer cet founisseur');

        return answer;
    }

</script>


