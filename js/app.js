'use strict';

var app = angular.module('weather', ['ui.router']);

// app.config(['$routeProvider', function($routeProvider) {
//     $routeProvider
//         .when(
//             '/', {
//                 templateUrl: 'partials/main.html',
//                 controller: 'indexController'
//             })
//         .when(
//             '/contact', {
//                 templateUrl: 'partials/contact.html',
//                 controller: 'contactController'
//             })
//         .when(
//             '/:position', {
//                 templateUrl: 'partials/show.html',
//                 controller: 'showController'
//             })
//         .otherwise({
//             redirectTo: '/'
//         });
// }]);

app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');

    $stateProvider

    // HOME STATES AND NESTED VIEWS ========================================
        .state('main', {
        url: '/',
        templateUrl: 'partials/main.html',
        controller: function($scope, $http) {

            $http.post("weatherApi.php?action=getUserPosition", {})
                .success(function getposition(data) {
                    $scope.position = data;
                });
        }
    })

    // nested list with custom controller
    .state('main.list', {
        url: '/list/:search',
        templateUrl: 'partials/main-list.html',
        controller: function($scope, $http, $stateParams) {
            $http.post("weatherApi.php?action=showDatas", {
                    search: $stateParams.search
                })
                .success(function getweather(data) {
                    console.log(data.daily_forecast);
                    $scope.weathers = data.daily_forecast;
                })
        }
    })

    // nested list with just some random string data
    .state('contact', {
        url: '/contact',
        templateUrl: "partials/contact.html"
    })
});