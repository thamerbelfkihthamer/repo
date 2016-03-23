<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" ng-app="modelview" ng-controller="myController">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center"> Differents type d'acces </h4>
            </div>
            <div class="modal-body">
                <table id="example1" class="table table-bordered table-striped dataTable"
                       role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-sort="ascending"
                            aria-label="Rendering engine: activate to sort column descending"
                            style="width: 163px;">ID
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-label="Browser: activate to sort column ascending"
                            style="width: 202px;">Nom
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-label="Browser: activate to sort column ascending"
                            style="width: 202px;">Nom
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-label="Browser: activate to sort column ascending"
                            style="width: 202px;">Nom
                        </th>
                        <th tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-label="CSS grade: activate to sort column ascending"
                            >Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{url}}</td>
                        <td class="sorting_1">r</td>
                        <td class="sorting_1">d</td>
                        <td class="sorting_1">f</td>
                        <td class="sorting_1">
                            <a href="<?php echo site_url('services/index/')?>" style="margin-right: 10px; margin-left: 5px;">
                                <i class="fa fa-plus-circle fa-lg"></i>
                            </a>
                        </td>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <input type="text" id="serveurid">
        </div>
    </div>
</div>

<script>
    //send server id to ModelAccesView
    function serveurid(serveurid){
        $("#serveurid").val(serveurid);
    }
</script>
