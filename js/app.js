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
    // For any unmatched url, redirect to /state1
    $urlRouterProvider.otherwise("/");
    //
    // Now set up the states
    $stateProvider
        .state('main', {
            url: "/",
            templateUrl: "partials/main.html",
            controller: "indexController"
        })
        .state('contact', {
            url: "/contact",
            templateUrl: "partials/contact.html"
        })
        .state('show', {
            url: "/:search",
            templateUrl: "partials/show.html"
        })
});