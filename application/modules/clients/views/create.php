<!-- Modal -->
<div class="modal fade" id="ClientModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Nouveau Client</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nom</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa  fa-info"></i>
                        </div>
                        <input type="text" class="form-control" name="nom" ng-model="name" placeholder="Nom ..."
                               style="box-shadow:{{bsnom}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Prenom</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa  fa-info"></i>
                        </div>
                        <input type="text" class="form-control" name="prenom" ng-model="prenom" placeholder="Prenom ..."
                               style="box-shadow:{{bsprenom}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Email</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="email" class="form-control" name="email" ng-model="email" placeholder="Email ..."
                               style="box-shadow:{{bsemail}}">
                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>Telephone </label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-keyboard-o"></i>
                        </div>
                        <input type="tel" class="form-control" name="tel" ng-model="tel"
                               placeholder="Numéro Telephone ..." style="box-shadow:{{bstel}}">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left" ng-click="createClient()"
                        data-dismiss="{{modal}}">Enregistrer
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

