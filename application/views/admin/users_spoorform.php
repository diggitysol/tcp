<form name="form" ng-submit="submitSpoor()">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?=$title?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<ng-map default-style="false" ng-show="map" id="zippermap" zoom="10" center="{{spoor.latitude }},{{spoor.longitude }}" on-click="getpos($event)" style="height:200px;" >
						<marker centered="true" position="{{spoor.latitude }},{{spoor.longitude }}" title="drag me" draggable="true" on-dragend="getpos($event)"></marker>
					</ng-map>
				</div>
				<div class="clearfix"></div><br/>
				<div class="col-md-8">
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.longitude }'>
						<label for="longitude" class="control-label"> Longitude</label>
						<input type="text" class="form-control" name="longitude" id="longitude" ng-model="spoor.longitude" autocomplete="off" />
						<span class="error-block" ng-model="errors.longitude" ng-show="errors.longitude">{{errors.longitude}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.latitude }'>
						<label for="latitude" class="control-label"> Latitude</label>
						<input type="text" class="form-control" name="latitude" id="latitude" ng-model="spoor.latitude" autocomplete="off" />
						<span class="error-block" ng-model="errors.latitude" ng-show="errors.latitude">{{errors.latitude}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.address_name }'>
						<label for="address_name" class="control-label"> Placename</label>
						<input type="text" class="form-control" name="address_name" id="address_name" ng-model="spoor.address_name" autocomplete="off" />
						<span class="error-block" ng-model="errors.address_name" ng-show="errors.address_name">{{errors.address_name}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.address_line }'>
						<label for="address_line" class="control-label">Address</label>
						<input type="text" class="form-control" id="address_line" name="address_line" ng-model="spoor.address_line" autocomplete="off" />
						<span class="error-block" ng-model="errors.address_line" ng-show="errors.address_line">{{errors.address_line}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.plot_number }'>
						<label for="plot_number" class="control-label">Plot Number</label>
						<input type="text" id="plot_number" class="form-control" ng-model="spoor.plot_number">
						<span class="error-block" ng-model="errors.plot_number" ng-show="errors.plot_number">{{errors.plot_number}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.street_name }'>
						<label for="street_name" class="control-label">Street</label>
						<input type="text" id="street_name" class="form-control" ng-model="spoor.street_name">
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.city }'>
						<label for="city" class="control-label">City</label>
						<input type="text" id="city" class="form-control" ng-model="spoor.city">
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.state }'>
						<label for="state" class="control-label">State</label>
						<input type="text" id="state" class="form-control" ng-model="spoor.state">
					</div>
					
					<div class="form-group label-floating" ng-class='{"is-empty": !spoor.pincode }'>
						<label for="pincode" class="control-label">Pincode</label>
						<input type="text" id="pincode" class="form-control" ng-model="spoor.pincode">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Image</label>
						<div class="fileinput">
							<div class="thumbnail" style="width: 125px; height: 125px; margin-bottom:2px;">
								<img ng-src="{{image.compressed.dataURL || spoor.image || spoor.no_image }}" src="<?=$no_image?>" id="thumb_logo"/> 
							</div>
							<div class="btn-groups" role="group">
								<span class="btn btn-primary btn-xs btn-raised fileUpload">Image
								<input id="inputImage" class="upload" type="file" accept="image/*" image="image" resize-max-height="120" resize-max-width="120" resize-quality="0.7" resize-type="image/jpg" ng-image-compress /></span>
								<a class="btn btn-danger btn-xs btn-raised" ng-click="image.compressed.dataURL=user.no_image;">clear</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-primary btn-raised" id="submit" type="submit">Submit</button>
		</div>
	</div>
</form>

