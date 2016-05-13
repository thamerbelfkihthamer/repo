/**
 * Created by medianet on 12/05/2016.
 */

var app = angular.module("medianetapp", []);

app.controller("notificationcontrolller",['$scope', '$http', '$location',function($scope, $http, $location){

$scope.getNotificationById = function(id){
    $http.post("http://192.168.10.129/MEDIANET-ERP/notifications/getnotification", {
        "id": id,
    }).success(function (data, status, headers, config) {
        console.log(data[0].id);
        $scope.id = data[0].id;
        $scope.description = data[0].description;
    }).error(function(data,status,headers,config){
        console.log(data);
    });
}


}]);
