'use strict';

angular.module('spoorApp').controller('PopupCont',function ($scope,$uibModalInstance,UserService) {
	$scope.close = function () {
		$uibModalInstance.dismiss('cancel');
	};
	UserService.getUser({
		user_id: $scope.user_id
	}, function(res){
		$scope.user = res.user;
	});
	$scope.updateUser = function(user_id) {
		$('#submit').addClass('disabled');
		var image='';
		
		if($scope.image){
			image=$scope.image.compressed.dataURL;
		}else{
			image='';
		}
		
		UserService.updateUser({
			user_id: user_id,
			name:$scope.user.name,
			image:image,
			dial_code:$scope.user.dial_code,
			mobile_number:$scope.user.mobile_number,
			reference:$scope.user.reference,
			verified:$scope.user.verified
		}, function(res){
			if(res.status){
				$scope.close();
				show_info(res.message);
				$scope.user_list();
			}else{
				$scope.warning=res.warning;
				$scope.errors=res.errors;
			}
			$('#submit').removeClass('disabled');
		},
		function(err){
			
		});
	};
});

angular.module('spoorApp').controller('Popupspoorform', function ($scope,$uibModalInstance, NgMap,SpoorService) {
   
	$scope.getpos = function(event){
		$scope.spoor.latitude = event.latLng.lat();
		$scope.spoor.longitude = event.latLng.lng();
	};
	if (angular.isDefined($scope.spoor_id)) {
		SpoorService.getSpoor({
			spoor_id: $scope.spoor_id
		}, function(res){
			$scope.spoor = res.spoor;
		});
	}
	
	$scope.submitSpoor = function() {
		$('#submit').addClass('disabled');
		var image='';
		var zipper_code='';
		if($scope.image){
			image=$scope.image.compressed.dataURL;
		}else{
			image='';
		}
		if(!$scope.spoor_id){
			var zipper_code1 = "";
			var zipper_code2 = "";
			var possible1 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			var possible2 = "0123456789";
			for( var i=0; i < 4; i++ )
			zipper_code1 += possible1.charAt(Math.floor(Math.random() * possible1.length));
			for( var i=0; i < 4; i++ )
			zipper_code2 += possible2.charAt(Math.floor(Math.random() * possible2.length));
			
			zipper_code=zipper_code1+zipper_code2;
		}
		SpoorService.submitSpoor({
			spoor_id:$scope.spoor_id,
			user_id: $scope.user_id,
			longitude:$scope.spoor.longitude,
			latitude:$scope.spoor.latitude,
			address_name:$scope.spoor.address_name,
			address_line:$scope.spoor.address_line,
			plot_number:$scope.spoor.plot_number,
			street_name:$scope.spoor.street_name,
			city:$scope.spoor.city,
			state:$scope.spoor.state,
			pincode:$scope.spoor.pincode,
			zipper_code:zipper_code,
			image:image
		}, function(res){
			if(res.status){
				$scope.close();
				$scope.spoor_list();
			}else{
				$scope.warning=res.warning;
				$scope.errors=res.errors;
			}
			$('#submit').removeClass('disabled');
		},
		function(err){
			
		});
	};
  
   $scope.close = function () {
		$uibModalInstance.dismiss('cancel');
	};     
	
});

angular.module('spoorApp').controller('Popuptracking', function ($scope,$uibModalInstance, NgMap,ShareService) {
   
	if (angular.isDefined($scope.share_id)) {
		function pinSymbol(color) {
			 return {
				  path: 'M 0,0 C -2,-20 -10,-22 -10,-30 A 10,10 0 1,1 10,-30 C 10,-22 2,-20 0,0 z M -2,-30 a 2,2 0 1,1 4,0 2,2 0 1,1 -4,0',
				  fillColor: color,
				  fillOpacity: 1,
				  strokeColor: '#000',
				  strokeWeight: 2,
				  scale: 1,
			};
		}
		ShareService.getTracking({
			share_id: $scope.share_id
		}, function(res){
			$scope.tracking=res.tracking;
			$scope.meeting=res.meeting;
			$scope.icon={};
			$scope.path={};
			var bounds = new google.maps.LatLngBounds();
			var color=["#FFF", "#f00"];
			for (var i=0; i<$scope.tracking.length; i++) {
				$scope.icon[i]=pinSymbol(color[i]);
				$scope.path[i] = $scope.tracking[i].track.map(function(marker){
					return [marker.latitude,marker.longitude];
				});
				var latlng = new google.maps.LatLng($scope.tracking[i].track[0].latitude, $scope.tracking[i].track[0].longitude);
				bounds.extend(latlng);
			}
			
			
			//console.log($scope.icon);
			NgMap.getMap().then(function(map) {
				map.setCenter(bounds.getCenter());
				map.fitBounds(bounds);
			});
			
		});
		
		$scope.groups = [
		{
			title: "Room1",
			content: "Dynamic Group Body - 1"
		},
		{
			title: "Room2",
			content: "Dynamic Group Body - 2"
		}
		];
		
	}
   $scope.close = function () {
		$uibModalInstance.dismiss('cancel');
	};     
	
});
