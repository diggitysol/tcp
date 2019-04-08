'use strict';

var loginApp  = angular.module('loginApp', ['ngRoute']);

loginApp.config(['$routeProvider', function ($routeProvider) {
   $routeProvider

   .when('/', {
        templateUrl : 'common/login',
        controller : 'loginCtrl'
   })  
}]);

loginApp.controller('loginCtrl', function($scope, loginService) { 
   $scope.login = function(user) {
		$('#loginbtn').addClass('disabled');
		show_animation();
		loginService.login(user,function(data){
			if(data.status) {
			  //show_success('Loging In...');
				window.location = BASE_URL + 'admin/';
			}else {
				count_attempt+=1;

				if(count_attempt==6){
					window.location = 'common';
				}
				//show_danger('Login failed!');
				$scope.error = true;
				$scope.errorMessage = data.message;
			  $('#loginbtn').removeClass('disabled');
			}
		});
		hide_animation();
   }
	
});

loginApp.factory('loginService', function($http) {
   
	var users = {};
	users.login = function login(data,cb) {
		$http.post('../api/spoor/login',data).then(function (data) {
			cb(data.data);
		},function(data){
			cb(data.status)
		});	
	}
	return users;	
});
