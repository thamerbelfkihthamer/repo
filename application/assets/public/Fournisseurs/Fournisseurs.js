/**
 * Created by medianet on 27/04/2016.
 */

var app = angular.module('medianetapp',[]);

app.controller("FournisseursController",["$scope","$http","$location", function($scope,$http,$location){

    $scope.name="";
    $scope.email="";
    $scope.tel="";


    $scope.createFournisseur = function(){
     if($scope.name != "" && $scope.email != "" && $scope.tel != ""){
         $scope.modal ="modal";

         $http.post(window.location.href+"/store",{
             "name":$scope.name,
             "email":$scope.email,
             "tel":$scope.tel
         }).success(function(data){
             $scope.name="";
             $scope.email="";
             $scope.tel="";
             swal("Merci!", "Nouvel fournisseur est bien enregistrer !", "success");
         })
     }
        else{
         $scope.bsemail = ($scope.email == "") ? "0 0 10px red" : "";
         $scope.bstel = ($scope.tel == "") ? "0 0 10px red" : "";
         $scope.bsname = ($scope.name == "") ? "0 0 10px red" : "";
     }

    }
    
    $scope.editfournisseur = function(id){
        $http.post(window.location.href + "/edit",
            {
                "id": id
            }).success(function (data, status, headers, config) {
                $scope.id = id;
                $scope.name = data[0].name;
                $scope.email = data[0].email;
                $scope.tel = data[0].tel;
            })
    }
    
    $scope.updateFournisseur =function(){

        if ($scope.name != "" && $scope.email != "" && $scope.tel != "") {
            $scope.modal = "modal";
            $http.post(window.location.href + "/update", {
                "id": $scope.id,
                "name": $scope.name,
                "email": $scope.email,
                "tel": $scope.tel
            }).success(function (data, status, headers, config) {
                $scope.name = "";
                $scope.email = "";
                $scope.tel = "";
                swal("Merci!", "Modification du client est bien enregistrer !", "success");
            })
        }
        else {
            $scope.bsemail = ($scope.email == "") ? "0 0 10px red" : "";
            $scope.bstel = ($scope.tel == "") ? "0 0 10px red" : "";
            $scope.bsnom = ($scope.name == "") ? "0 0 10px red" : "";

        }
    }
    
    $scope.showdeletefournisseur = function(id){
        $scope.id=id;
    }
    
    $scope.delete = function () {
        console.log($scope.id);
        $scope.modal = "modal";
        $http.post(window.location.href + "/delete",
            {
                "id": $scope.id
            }).success(function (data, status, headers, config) {
                console.log(data);
                swal("Merci!", "Nouvel client est bien enregistrer !", "success");
            })
    }
}]);