<!-- Modal -->
<div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog modal-danger">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Suppression Service</h4>
            </div>
            <div class="modal-body">
                <input type="text"  hidden ng-model="id">
              <h5 class="text-center">voulez-vous supprimer cet service ? </h5>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left"  data-dismiss="{{modal}}" ng-click="delete()">supprimer</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>