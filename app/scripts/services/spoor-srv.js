'use strict';
angular.module('spoorApp').factory('UserService',['$q', '$timeout', '$http',
	function ($q, $timeout, $http) {
		var users = {};
		
		users.getUsers = function getUsers(cb) {
			$http.get('../api/spoor/users').then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		users.getUser = function getUser(data,cb) {
			$http.post('../api/spoor/user',{user_id: data.user_id}).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		users.updateUser = function(data,cb) {
			
			$http.post('../api/spoor/userupdate',data).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		users.deleteUser = function(data,cb) {
			
			$http.delete('../api/spoor/user/'+ data.user_id).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		
		return users;
	}
]);

angular.module('spoorApp').factory('SpoorService',['$q', '$timeout', '$http',
	function ($q, $timeout, $http) {
		var spoors = {};
		
		spoors.getSpoors = function getSpoors(data,cb) {
			$http.get('../api/spoor/spoors',{ params:{user_id: data.user_id}}).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		spoors.getAddress = function(cb) {
			$http.get('http://ip-api.com/json').then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		spoors.getSpoor = function getSpoor(data,cb) {
			$http.get('../api/spoor/spoor',{ params:{spoor_id: data.spoor_id}}).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		spoors.submitSpoor = function(data,cb) {
			$http.post('../api/spoor/submitspoor',data).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		
		return spoors;
	}
]);

angular.module('spoorApp').factory('ShareService',['$q', '$timeout', '$http',
	function ($q, $timeout, $http) {
		var shares = {};
		
		shares.getShares = function getShares(data,cb) {
			$http.get('../api/spoor/shares',{ params:{user_id: data.user_id}}).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}
		
		shares.getTracking = function getTracking(data,cb) {
			$http.get('../api/spoor/tracking_history',{ params:{share_id: data.share_id}}).then(function (res) {
				cb(res.data);
			},function(res){
				cb(res.status)
			});	
		}

		return shares;
	}
]);


