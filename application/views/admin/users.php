<div class="heading-sec">
	<div class="row">
		<div class="col-md-4 column">
			<div class="heading-profile">
				<h2>Users</h2>
			</div>
		</div>
		<div class="col-md-4 column">
			Records per page
			 <select class="selectpicker" ng-model="pageSize">
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
           </select>
		</div>
		<div class="col-md-4 column">
			  
			<div class="form-group label-floating pull-right is-empty searchbox">
				<label for="search" class="control-label">Search for Users</label>
				<input class="form-control" ng-model="search" id="search" type="text">
			</div>
		</div>
	</div>
</div>
<div class="panel-content">
	<div class="row">
		<div class="col-md-12">
			<div class="widget" ng-init="user_list()">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th ng-click="sort('key')">Sl.No.</th>
								<th ng-click="sort('name')">Name</th>
								<th ng-click="sort('mobile_number')">Mobile No</th>
								<th ng-click="sort('date')">Date</th>
								<th ng-click="sort('id')">Reference</th>
								<th ng-click="sort('id')">OS</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr dir-paginate="(key,user) in users | orderBy:sortKey:reverse | filter:search | itemsPerPage: pageSize" current-page="currentPage">
								<td>{{key+1}}</td>
								<td><img ng-src="{{user.image}}" class="img-circle" style="height:30px; width:30px;"/>  <span class="capitalize">{{user.name}}</span></td>
								<td>{{user.mobile_number}}</td>
								<td>{{user.date}}</td>
								<td>{{user.reference}}</td>
								<td><span class="label label-success"><span class="uppercase">Android</span></span></td>
								
								<td>
								<a class="btn btn-primary btn-sm btn-raised" ng-click="open(user._id.$id)">Edit</a>
								<a class="btn btn-info btn-sm btn-raised" ui-sref="user.info({user_id: user._id.$id})" >View</a>
								<button type="button" class="btn btn-danger btn-sm btn-raised" ng-click="deleteUser(user._id.$id)">Delete</button></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<br />
			<dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
		</div>
	</div>
</div><!-- Panel Content -->
