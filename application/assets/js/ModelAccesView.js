/**
 * Created by medianet on 21/03/2016.
 */


var app = angular.module("modelview", []);

app.controller("myController",['$scope' , function ($scope,$http) {
    $http.get("http://localhost/MEDIANET-ERP/services/getallserviceswithserveur",config)
        .success(function(data,status,headers,config){
            console.log(data);
        });
     $scope.url ="test";
    $scope.get()


}]);

app.controller("ftpController",['$scope' ,function ($scope) {

    $scope.nom = "";
    $scope.motdepass = "";
    $scope.serveurid = $("#serveurid").val();
    $scope.go = function () {
        var nom = $scope.nom;
        var motdepass = $scope.motdepass;
        var serveurid = $scope.serveurid;
        console.log(nom);
        console.log(motdepass);
        console.log(serveurid);
        $("button").unbind();
    }

}]);

app.controller("mysqlController", function ($scope) {

    $scope.nom = "";
    $scope.motdepass = "";
    $scope.serveurid = $("#serveurid").val();

    $scope.go = function () {
        var nom = $scope.nom;
        var motdepass = $scope.motdepass;
        var serveurid = $scope.serveurid;
        console.log(nom);
        console.log(motdepass);
        console.log(serveurid);
        $("button").unbind();
    }
});