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
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <script>
                                        $(document).ready(function () {
                                            $.notify('<?php echo $this->session->flashdata('message'); ?>', {
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
                                    <a href="<?php echo site_url('auth/create_user') ?>">
                                        <i class="fa fa-user-plus fa-lg"></i>
                                    </a></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <form method="get" action="<?php echo site_url('auth/index') ?>">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="dataTables_length" id="example1_length"><label>Show
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
                                                </select> entries</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="dataTables_length" id="example1_length"><label>
                                                <select
                                                    aria-controls="example1"
                                                    class="form-control input-sm choosen" onchange="this.form.submit()"
                                                    name="group">
                                                    <option value="" disabled selected> Selectionner par groupe</option>
                                                    <?php
                                                    foreach ($groups as $group) {
                                                        ?>
                                                        <option
                                                            value="<?php echo $group->id ?>" <?php echo ($group->id == $groupid) ? "selected" : ""; ?>>
                                                            <?php echo $group->description ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="example1_filter" class="dataTables_filter"><label>Recherche:<input
                                                    type="search" class="form-control input-sm" placeholder=""
                                                    aria-controls="example1"></label></div>
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
                                                style="width: 100px;">Nom
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 100px;">Prenom
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 200px;">Email
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 200px;">Groups
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 100px;">Status
                                            </th>
                                            <th tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                >Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (count($users) > 0) {
                                            foreach ($users as $user): ?>

                                                <tr role="row" class="odd">
                                                    <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8'); ?></td>
                                                    <td>
                                                        <?php foreach ($user->groups as $group): ?>
                                                            <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->description, ENT_QUOTES, 'UTF-8')); ?>
                                                            <br/>
                                                        <?php endforeach ?>
                                                    </td>
                                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
                                                    <td>
                                                        <a href="<?php echo site_url('auth/edit_user/' . $user->id) ?>"
                                                           style="margin-right: 10px; margin-left: 5px;">
                                                            <i class="fa fa-edit fa-lg"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                <?php
                                            endforeach;
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
                                        Présentation  <?php echo  $start?> à<?php   echo ($limit > count($users)) ? count($users) : $limit;?> de <?php echo  count($users)?> entrées

                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <?php if (count($users)) { ?>
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
    $(".choosen").select2();
    function confirmdelete() {

        var answer = confirm('voulez-vous supprimer cet utilisateurs');

        return answer;
    }

</script>



