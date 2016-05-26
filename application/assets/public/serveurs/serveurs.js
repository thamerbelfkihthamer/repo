/**
 * Created by medianet on 25/05/2016.
 */

var app = angular.module('medianetapp',[]);
app.controller('ServeurControlller',["$scope","$http","$location", function($scope,$http,$location){



    $scope.showdeleteserveur = function(id){
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
                swal("Merci!", "Le serveur est supprimer !", "success");
            })
    }
}]);