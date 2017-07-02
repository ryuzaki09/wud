(function() {
  'use strict';

  angular
    .module('wud.techtest')
    .controller('UsersController', UsersController);

  /** @ngInject */
  function UsersController($log, $http) {
      var vm = this;
      // $log.log("test");
      $http.get("/api/v1/user")
        .then(function(data) {
            vm.userlist = data.data.urls;
        });

      vm.createUser = function(){
        // $log.log("creating"); 

        if (vm.createform.$valid) {
            // $log.log("all ok");
            var postdata = {"firstname": vm.firstname, "lastname": vm.lastname, "email": vm.email };
            // $log.log(postdata);
            $http({
                url: "/api/v1/user",
                method: "POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param(postdata)
            }).then(function(result) {
                if (!result.data.error) {
                    vm.firstname = "";
                    vm.lastname = "";
                    vm.email = "";
                    vm.userlist.push(result.data.user);
                }
            });
        }
    }
  }
})();
