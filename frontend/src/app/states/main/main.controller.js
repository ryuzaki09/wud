(function() {
  'use strict';

  angular
    .module('wud.techtest')
    .controller('MainController', MainController);

  /** @ngInject */
  function MainController($scope, $state) {
    var vm = $scope;
    var states = $state.get();
    states.shift();
    states.shift();
    vm.states = states;
  }
})();
