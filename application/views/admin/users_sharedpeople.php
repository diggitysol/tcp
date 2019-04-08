<div class="heading-sec">
	<div class="row">
		<div class="col-md-4 column">
			<div class="heading-profile">
				<h2>{{title}}</h2>
				<a ng-click="open()" class="btn btn-info btn-sm btn-raised addbtn">Add</a>
			</div>
		</div>
		<div class="col-md-4 column pagesize">
			Per page
			 <select class="selectpicker" ng-model="pageSize">
				  <option value="10">10</option>
				  <option value="25">25</option>
				  <option value="50">50</option>
				  <option value="100">100</option>
			  </select>
		</div>
		<div class="col-md-4 column">
			<div class="form-group label-floating pull-right is-empty searchbox">
				<label for="search" class="control-label">Search</label>
				<input class="form-control" ng-model="search" id="search" type="text">
			</div>
		</div>
	</div>
</div>
<div class="widget" ng-init="shared_list()">
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Shared Member</th>
					<th>Duration</th>
					<th>Date</th>
					<th>Status</th>
					<th>Tracking History</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr dir-paginate="(key,share) in sharings | orderBy:sortKey:reverse | filter:search | itemsPerPage: pageSize" current-page="currentPage">
					<td>{{share.member.memberinfo.name}}&nbsp;({{share.member.memberinfo.mobile_number}})</td>
					<td>{{share.duration}}</td>
					<td>{{share.date}}</td>
					<td>Completed</td>
					<td align="center"><a class="btn btn-primary btn-sm btn-raised" ng-click="open(share._id.$id)"><i class="fa fa-location-arrow"></i></a></td>
					<td>
						<button type="button" class="btn btn-danger btn-sm btn-raised" ng-click="deleteShare($index)">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<br />
<dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
		
	