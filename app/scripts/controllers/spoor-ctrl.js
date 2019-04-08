'use strict';

angular.module('spoorApp').controller('UsersCtrl', ['$http', '$scope','$rootScope','$stateParams','$uibModal','$filter','UserService', function($http, $scope,$rootScope,$stateParams,$uibModal,$filter,UserService) {
	$rootScope.user_id = $stateParams.user_id;
	
	$scope.user_list=function(){
		$scope.pageSize = 10;//itemsPerPage 
		$scope.currentPage = 1;//pageno 
		UserService.getUsers(function(res){
			$scope.users = res.users;
		});
		$scope.sort = function(keyname){
			$scope.sortKey = keyname;   //set the sortKey to the param passed
			$scope.reverse = !$scope.reverse; //if true make it false and vice versa
		}
	};	
	$scope.open = function (user_id) {
		$scope.errors={};
		$scope.user_id=user_id;
		var modalInstance = $uibModal.open({
			animation: true,
			controller: 'PopupCont',
			templateUrl: 'users/edit',
			scope: $scope
		});
	}
	
	$scope.user_info = function() {
		UserService.getUser({
			user_id: $stateParams.user_id
		}, function(res){
			$scope.user = res.user;
		});
	};
	$scope.deleteUser = function(id){
		if(confirm('Are you sure!')) {
			UserService.deleteUser({
				user_id: id
			}, function(res){
				if(res.status){
					//$scope.close();
					show_info(res.message);
					$scope.user_list();
				}else{
					show_danger(res.message);
				}
			});
		}
	}
	
	
}]);

angular.module('spoorApp').controller('SpoorCtrl', ['$http','NgMap','$scope','$rootScope','$stateParams','$uibModal','$filter','SpoorService', function($http,NgMap,$scope,$rootScope,$stateParams,$uibModal,$filter,SpoorService) {
	$rootScope.user_id = $stateParams.user_id;
	
	$scope.spoor_list=function(){
		$scope.pageSize = 10;//itemsPerPage 
		$scope.currentPage = 1;//pageno 
		SpoorService.getSpoors({
			user_id: $stateParams.user_id
		},
		function(res){
			$scope.spoors = res.spoors;
		});
	};
	$scope.open = function (spoor_id) {
		$scope.errors={};
		$scope.spoor={};
		$scope.spoor_id=spoor_id;
		$scope.user_id = $stateParams.user_id;
		SpoorService.getAddress(function(res){
			$scope.spoor.latitude = res.lat;
			$scope.spoor.longitude = res.lon;
			
			$scope.map=true;
			NgMap.getMap().then(function (map) {
				var center = map.getCenter();
				google.maps.event.trigger(map, "resize");
				map.setCenter(center);
			});
		});
	
		var modalInstance = $uibModal.open({
			animation: true,
			controller: 'Popupspoorform',
			templateUrl: 'users/spoorform',
			scope: $scope
		});
	}

}]);

angular.module('spoorApp').controller('ShareCtrl', ['$http','NgMap','$scope','$rootScope','$stateParams','$uibModal','$filter','ShareService', function($http,NgMap,$scope,$rootScope,$stateParams,$uibModal,$filter,ShareService) {
	$rootScope.user_id = $stateParams.user_id;
	
	$scope.shared_list=function(){
		$scope.pageSize = 10;//itemsPerPage 
		$scope.currentPage = 1;//pageno 
		ShareService.getShares({
			user_id: $stateParams.user_id
		},
		function(res){
			$scope.sharings = res.sharings;
		});
	};
	$scope.open = function (share_id) {
		$scope.errors={};
		$scope.share_id=share_id;
		NgMap.getMap().then(function (map) {
			var center = map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);
		});
		var modalInstance = $uibModal.open({
			animation: true,
			controller: 'Popuptracking',
			templateUrl: 'users/trakinghistory',
			scope: $scope,
			size: 'lg',
		});
	}
	
}]);

