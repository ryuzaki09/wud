(function() {
  'use strict';

  angular
    .module('wud.techtest')
    .directive('wudNavbar', wudNavbar);

  /** @ngInject */
  function wudNavbar() {
    return {
      restrict: 'E',
      templateUrl: 'app/components/navbar/navbar.html'
    };
  }
})();
