<div class="account-user-sec">
	<div class="account-sec">
		<div class="acount-sec">
			<div class="container">
				<div class="row">
					<div class="col-md-5 card no-margin">
						
						<div class="head">
							<h4>SPOOR</h4>
							
							<span class="loginbtn">Login<span>
						</div>
						<div class="contact-sec">
							<div class="account-form">
								
								<div ng-show="error" class="alert alert-danger">{{errorMessage}}</div>
								<h4 class="text-center">WELCOME</h4>
								<form class="form" name="loginform">
									<div class="row">
										
										<div class="feild col-md-12">
											<div class="form-group label-floating is-empty">
												<label for="username" class="control-label"><i class="fa fa-user"></i> Username</label>
												<input type="text" class="form-control" name="username" id="username" required ng-model="user.username" autocomplete="off"/>
											</div>
										</div>
										<div class="feild col-md-12">
											<div class="form-group label-floating is-empty">
												<label for="password" class="control-label"><i class="fa fa-lock"></i> Password</label>
												<input type="password" class="form-control" name="password" id="password" required ng-model="user.password" autocomplete="off"/>
											</div>
										</div>
										<div class="feild col-md-12 text-center">
											<input type="submit" class="mbtn" id="loginbtn" value="Enter" ng-disabled="loginform.$invalid" ng-click="login(user)"/>
										</div>
									</div>
								</form>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Account Sec -->
</div>
