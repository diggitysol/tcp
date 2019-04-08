<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" ng-app="loginApp"> <!--<![endif]-->
<head>
   <!-- Meta-Information -->
   <title>Spoor Admin</title>
	 <script>
        var BASE_URL = "<?php echo site_url(); ?>";
    </script>
    <script>
        var SRC_BASE = "<?php echo site_url(); ?>app/";
    </script>
   <meta charset="utf-8">
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'include/header.php'; ?>   
</head>
<body>
	<div class="main-content" ng-view>
		
	</div>
	<div class="loading_container" style="display: none;">
        <div class="cat_loading">
           <span class="plus">Loading&#8230;</span>
        </div>
   </div>
	<?php include 'include/footer.php'; ?>  
	<script src="<?php echo base_url('app'); ?>/scripts/login_app.js"></script>    
	<script>var count_attempt = 0;</script>    
</body>
</html>