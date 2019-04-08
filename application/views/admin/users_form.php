<form name="form" ng-submit="updateUser(user._id.$id)">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><?=$title?></h3>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8">
					<div class="form-group label-floating" ng-class='{"is-empty": !user.name }'>
						<label for="name" class="control-label"> Name</label>
						<input type="text" class="form-control" name="name" id="name" ng-model="user.name" autocomplete="off" />
						
						<span class="error-block" ng-model="errors.name" ng-show="errors.name">{{errors.name}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !user.dial_code }'>
						<label for="dial_code" class="control-label">Dial Code</label>
						<input type="text" class="form-control" id="dial_code" name="dial_code" ng-model="user.dial_code" autocomplete="off" />
						<span class="error-block" ng-model="errors.dial_code" ng-show="errors.dial_code">{{errors.dial_code}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !user.mobile_number }'>
						<label for="mobile_number" class="control-label">Mobile Number</label>
						<input type="text" id="mobile_number" class="form-control" ng-model="user.mobile_number">
						<span class="error-block" ng-model="errors.mobile_number" ng-show="errors.mobile_number">{{errors.mobile_number}}</span>
					</div>
					<div class="form-group label-floating" ng-class='{"is-empty": !user.reference }'>
						<label for="reference" class="control-label">Reference</label>
						<input type="text" id="reference" class="form-control" ng-model="user.reference">
					</div>
					<div class="form-group">
						<label>Verified</label>
						<div class="sf-radio"> 
							<label><input value="1" name="verified" ng-model="user.verified" type="radio" ng-checked="user.verified === 1">Yes</label>
							<label><input value="0" name="verified" ng-model="user.verified" type="radio" ng-checked="user.verified === 0"> No</label>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="name">Image</label>
						<div class="fileinput">
							<input type="hidden" ng-model="user.browse_image"/>
							<div class="thumbnail" style="width: 125px; height: 125px; margin-bottom:2px;">
								<img ng-src="{{image.compressed.dataURL || user.image || user.no_image}}" id="thumb_logo"/> 
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

