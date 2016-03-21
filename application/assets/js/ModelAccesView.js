/**
 * Created by medianet on 21/03/2016.
 */


var app = angular.module("modelview", []);

app.controller("myController", function ($scope) {
    var s = $scope.url;
});

app.controller("ftpController", function ($scope) {

    $scope.nom = "Login ftp";
    $scope.motdepass = "mot de pass";
    $scope.serveurid = $("#serveurid").val();
    $scope.go = function () {
        var nom = $scope.nom;
        var motdepass = $scope.motdepass;
        var serveurid = $scope.serveurid;
        console.log(nom);
        console.log(motdepass);
        console.log(serveurid);
    }

});

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
    }
});