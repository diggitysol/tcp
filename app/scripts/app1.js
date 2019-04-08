'use strict';

var spoorApp = angular.module('spoorApp', ['ngRoute','ngAnimate','ngMap','angular-loading-bar','angularUtils.directives.dirPagination', 'angular-spinkit','ui.router','ui.bootstrap','ngImageCompress']);

spoorApp.config(['$stateProvider','$urlRouterProvider','$locationProvider', function ($stateProvider,$urlRouterProvider,$locationProvider){
   $locationProvider.hashPrefix(''); 
	//$locationProvider.html5Mode(true);
	$urlRouterProvider.otherwise('/');
	
	$stateProvider
		.state('dashboard', {
         templateUrl: 'dashboard/show',
         url: '/'
      })
		.state('users', {
         templateUrl: 'users',
         url: '/users',
         controller: 'UsersCtrl'
      })
		.state('user', {
			templateUrl: 'users/template',
			url: '/user',
			controller: 'UsersCtrl'
		})
		.state('user.info', {
			templateUrl: 'users/info',
			url: '/info/:user_id',
			controller: 'UsersCtrl',
			data: {
			  pageTitle: 'User Info'
			}
		})
		.state('user.spoorpin', {
			templateUrl: 'users/spoorpin',
			url: '/spoorpin/:user_id',
			controller: 'SpoorCtrl',
			data: {
			  pageTitle: 'Spoor Pins'
			}
		})
		.state('user.sharedpeople', {
			templateUrl: 'users/sharedpeople',
			url: '/sharedpeople/:user_id',
			controller: 'ShareCtrl',
			data: {
			  pageTitle: 'Shared people'
			}
		})
		
		

}]);

spoorApp.directive('title', ['$rootScope', '$timeout',
  function($rootScope, $timeout) {
    return {
      link: function() {

        var listener = function(event, toState) {

          $timeout(function() {
            $rootScope.title = (toState.data && toState.data.pageTitle) 
            ? toState.data.pageTitle 
            : 'Default title';
          });
        };

        $rootScope.$on('$stateChangeSuccess', listener);
      }
    };
  }
]);

spoorApp.directive('headerSidebar',function(){
	return {
	  templateUrl:'directives/header',
	  restrict: 'E',
	  replace: false,
	}
});

spoorApp.directive('footerSidebar',function(){
	return {
	  templateUrl:'directives/footer',
	  restrict: 'E',
	  replace: false,
	}
});

spoorApp.directive('routeLoadingIndicator', function($rootScope) {
    return {
        restrict: 'E',
        template: "<div ng-show='isRouteLoading' class='loading-indicator'>" +
        "<div class='loading-indicator-body'>" +
        "<div class='spinner'><rotating-plane-spinner></rotating-plane-spinner></div>" +
        "</div>" +
        "</div>",
        replace: true,
        link: function(scope, elem, attrs) {
          scope.isRouteLoading = false;

          $rootScope.$on('$routeChangeStart', function() {
            scope.isRouteLoading = true;
          });
          $rootScope.$on('$routeChangeSuccess', function() {
            scope.isRouteLoading = false;
          });
        }
   };
    
});