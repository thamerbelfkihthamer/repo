<!-- Modal -->
<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Modifier Fournisseur</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nom</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa  fa-info"></i>
                        </div>
                        <input type="text" class="form-control" name="name" ng-model="name" style="box-shadow:{{bsname}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa  fa-envelope-o"></i>
                        </div>
                        <input type="email" class="form-control" name="email" ng-model="email" style="box-shadow:{{bsemail}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>telephone</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa  fa-phone"></i>
                        </div>
                        <input type="tel" class="form-control" name="tel" ng-model="tel" style="box-shadow:{{bstel}}">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" ng-click="updateFournisseur()"
                        data-dismiss="{{modal}}">Modifier
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






