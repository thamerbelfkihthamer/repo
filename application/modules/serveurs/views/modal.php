<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" ng-app="modelview">
    <div class="modal-dialog" ng-controller="myController">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Ajouter type d'acces </h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Type d'acces</label>
                    <select ng-model="url" name="fournisseur" class="form-control select2 select2-hidden-accessible choosen" style="width: 100%;"
                            tabindex="-1" aria-hidden="true">
                        <option value="http://localhost/MEDIANET-ERP/application/assets/public/acces_views/ftp.html">FTP</option>
                        <option value="http://localhost/MEDIANET-ERP/application/assets/public/acces_views/ssh.html">SSH</option>
                        <option value="http://localhost/MEDIANET-ERP/application/assets/public/acces_views/mysql.html">Mysql</option>
                    </select>
                </div>
                <div id="modelcontent">
                    <div ng-include="url">
                    </div>
                    <input type="number" id="serveurid" ng-model="serveuridd" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>

    //send server id to ModelAccesView
    function serveurid(serveurid){
        $("#serveurid").val(serveurid);
    }
</script>