<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
		<base href="<?=base_url()?>"/>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="app/css/style.css">
		<link rel="stylesheet" href="app/css/bsadmin.css">
		<!-- JS -->
		<!-- load angular, nganimate, and ui-router -->
		<!--<script src="app/js/angular-1.6.min.js"></script>
		<script src="app/js/angular-ui-router.min.js"></script>
		<script src="app/js/angular-animate.js"></script>
		<script src="app/js/angular-route-1.6.min.js"></script>-->
		
		<script src="//code.angularjs.org/1.6.9/angular.min.js"></script>
		<script src="//unpkg.com/@uirouter/angularjs/release/angular-ui-router.min.js"></script>
		<script src="//code.angularjs.org/1.6.9/angular-animate.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.10/ngStorage.min.js"></script>
		<script src="app/scripts/app.js"></script>
    
</head>
<body ng-app="formApp">

<!-- views will be injected here -->

<nav class="navbar navbar-expand navbar-dark bg-primary topnav">
    <a class="sidebar-toggle text-light mr-3"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><i class="fa fa-code-branch"></i> TCP</a>
</nav>
<div class="d-flex" ui-view>
</div>
<script src="app/js/jquery.min.js"></script>
<script src="app/js/popper.min.js"></script>
<script src="app/js/bootstrap.min.js"></script>
<script src="app/js/bsadmin.js"></script>


</body>
</html>