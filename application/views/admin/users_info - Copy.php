<div class="heading-sec">
	<div class="row">
		<div class="col-md-12 column">
			<div class="heading-profile">
				<h2>Users Info</h2>
			</div>
		</div>
	</div>
</div>
<div class="panel-content">
	<div class="row">
		<div class="col-md-9">
			<div class="widget" ng-init="user_info()">
				<div class="table-responsive">
					<table class="table table-hover table-striped">
						<thead></thead>
						<tbody>
							<tr>
								<td width="5%">&nbsp;</td>
								<td width="20%">Name</td>
								<td>{{user.name}}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Mobile</td>
								<td>{{user.mobile_number}}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Install date</td>
								<td>{{user.date}}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>Reference</td>
								<td>{{user.reference}}</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
								<td>OS</td>
								<td>{{user.platform}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="widget user-menu">
				<div class="nav-side-menu">
					<div class="menu-list">
						<ul id="menu-content" class="menu-content">
							<li>
								<a ng-href="#/users/info/{{user._id.$id}}">
								<i class="fa fa-dashboard fa-lg"></i> User Info
								</a>
							</li>
							<li>
								<a ng-href="#/users/spoorpin/{{user._id.$id}}">
								<i class="fa fa-dashboard fa-lg"></i> Spoor Pin
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-user fa-lg"></i> Shared Pepole
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Requested people
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Tracking History
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Referred people
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Spent
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Subscription
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Earning
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Login History
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Contacts
								</a>
							</li>
							<li>
								<a href="#">
								<i class="fa fa-users fa-lg"></i> Friends
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- Panel Content -->
