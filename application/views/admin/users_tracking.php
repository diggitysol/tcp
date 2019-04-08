<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"><?=$title?></h3>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
				 <uib-accordion>
					<div uib-accordion-group class="panel-default" heading="{{group.title}}" ng-repeat="group in groups">
						{{group.content}}
					</div>
				</uib-accordion>
			</div>
			<div class="col-md-9">
			
				<ng-map default-style="false" zoom="5">
					<user-section ng-repeat="(key1,usertrack) in tracking">
						<marker ng-repeat="(key2,pos) in usertrack.track" position="{{pos.latitude}}, {{pos.longitude}}" icon="{{icon[key1]}}"></marker>
						<shape name="polyline" path="{{path[key1]}}" geodesic="true" stroke-color="#FF0000" stroke-opacity="1.0" stroke-weight="2"></shape>
					</user-section>
					<!--<marker ng-repeat="pos in tracking" position="{{pos.lat}}, {{pos.lng}}"></marker>
					<marker ng-repeat="pos in markers1" position="{{pos.lat}}, {{pos.lng}}"></marker>
					<shape name="polyline" path="{{path1}}" geodesic="true" stroke-color="#000000" stroke-opacity="1.0" stroke-weight="2"></shape>-->
				</ng-map>
			</div>
		</div>	
	</div>
</div>

