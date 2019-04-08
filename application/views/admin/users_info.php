<div class="heading-sec">
	<div class="row">
		<div class="col-md-4 column">
			<div class="heading-profile">
				<h2>{{title}}</h2>
			</div>
		</div>
	</div>
</div>
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
		
