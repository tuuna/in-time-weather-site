app.controller('indexController', function($scope, $http) {
    $http.post("weatherApi.php?action=getUserPosition", {})
        .success(function getposition(data) {
            $scope.position = data;
        });
    // $http.post("weatherApi.php?action=showDatas", {
    //     position: $scope.position,
    //     code: 200
    // }).success(function getWeather(data) {
    //
    // });
});