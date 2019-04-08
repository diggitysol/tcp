<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" ng-app="spoorApp"> <!--<![endif]-->
<head>
   <!-- Meta-Information -->
   <title>Spoor Admin</title>
   <meta charset="utf-8">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'include/header.php'; ?>   
</head>
<body>
	<noscript>
        <style>.main{visibility: hidden !important;}</style>
        <br /><br />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="alert alert-danger text-center">This website needs JavaScript enabled to work perfectly.<hr />
                    Please enable the javascript and reload the page.</h3>
                </div>
            </div>
        </div>
   </noscript>
	<header-sidebar></header-sidebar>
	<div class="main-content" ui-view></div>
	
	<div class="loading_container" style="display: none;">
        <div class="cat_loading">
           <span class="plus">Loading&#8230;</span>
        </div>
   </div>
  
   <route-loading-indicator class="route-loader"></route-loading-indicator>
	<?php include 'include/footer.php'; ?> 
	<script src="<?php echo base_url('app'); ?>/scripts/directives/dirPagination.js"></script>
	<script src="<?php echo base_url('app'); ?>/scripts/app.js"></script> 
	<script src="<?php echo base_url('app'); ?>/scripts/controllers/spoor-ctrl.js"></script> 
	<script src="<?php echo base_url('app'); ?>/scripts/controllers/spoor-popctrl.js"></script> 
	<script src="<?php echo base_url('app'); ?>/scripts/services/spoor-srv.js"></script> 
	<script src="<?php echo base_url('app'); ?>/js/ng-image-compress.js"></script>
	</body>
</html>