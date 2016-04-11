(function() {
  'use strict';

  angular
    .module('wud.techtest')
    .config(routerConfig);

  /** @ngInject */
  function routerConfig($stateProvider, $urlRouterProvider) {
    $stateProvider
      .state('main', {
        abstract: true,
        templateUrl: 'app/states/main/main.html'
      })
      .state('main.home', {
        url: '/',
        templateUrl: 'app/states/main/home/home.html',
        controller: 'HomeController',
        controllerAs: 'home'
      })
      .state('main.users', {
        url: '/users',
        templateUrl: 'app/states/main/users/users.html',
        controller: 'UsersController',
        controllerAs: 'users'
      });

    $urlRouterProvider.otherwise('/');
  }

})();
