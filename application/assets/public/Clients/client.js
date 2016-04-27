/**
 * Created by medianet on 25/04/2016.
 */
var app = angular.module("medianetapp", []);

app.controller("ClientController", ['$scope', '$http', '$location', function ($scope, $http, $location) {

    $scope.name = "";
    $scope.prenom = "";
    $scope.email = "";
    $scope.tel = "";


    /*
     Create Method
     */

    $scope.createClient = function () {
        if ($scope.name != "" && $scope.prenon != "" && $scope.email != "" && $scope.tel != "") {
            $scope.modal = "modal";
            $http.post(window.location.href + "/store", {
                "nom": $scope.name,
                "prenom": $scope.prenom,
                "email": $scope.email,
                "tel": $scope.tel
            }).success(function (data, status, headers, config) {
                $scope.name = "";
                $scope.prenom = "";
                $scope.email = "";
                $scope.tel = "";
                swal("Merci!", "Nouvel client est bien enregistrer !", "success");
            });
        }
        else {
            $scope.bsemail = ($scope.email == "") ? "0 0 10px red" : "";
            $scope.bstel = ($scope.tel == "") ? "0 0 10px red" : "";
            $scope.bsprenom = ($scope.prenom == "") ? "0 0 10px red" : "";
            $scope.bsnom = ($scope.name == "") ? "0 0 10px red" : "";

        }
    }

    /*
     Edit load view
     */
    $scope.editclient = function (id) {
        $http.post(window.location.href + "/edit",
            {
                "id": id
            }).success(function (data, status, headers, config) {
                $scope.id = id;
                $scope.name = data[0].lastname;
                $scope.prenom = data[0].firstname;
                $scope.email = data[0].email;
                $scope.tel = data[0].tel;
            })
    }

    /*
     Update client
     */
    $scope.updateClient = function () {
        if ($scope.name != "" && $scope.prenon != "" && $scope.email != "" && $scope.tel != "") {
            $scope.modal = "modal";
            $http.post(window.location.href + "/update", {
                "id": $scope.id,
                "nom": $scope.name,
                "prenom": $scope.prenom,
                "email": $scope.email,
                "tel": $scope.tel
            }).success(function (data, status, headers, config) {
                $scope.name = "";
                $scope.prenom = "";
                $scope.email = "";
                $scope.tel = "";
                swal("Merci!", "Modification du client est bien enregistrer !", "success");
            })
        }
        else {
            $scope.bsemail = ($scope.email == "") ? "0 0 10px red" : "";
            $scope.bstel = ($scope.tel == "") ? "0 0 10px red" : "";
            $scope.bsprenom = ($scope.prenom == "") ? "0 0 10px red" : "";
            $scope.bsnom = ($scope.name == "") ? "0 0 10px red" : "";

        }
    }

    /*
     show delete modal client
     */
    $scope.showdeleteclient = function (id) {

        console.log($location.path());
        $scope.id = id;
    }

    /*
     delete client
     */
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
