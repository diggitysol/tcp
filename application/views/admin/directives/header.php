<div class="top-bar">
   <div class="logo">
      <a href="#/" title=""><img src="../assets/images/logo.png" alt="" /> Spoor</a>
      <div class="menu-options"><span class="menu-action"><i></i></span></div>
   </div>
   <div class="quick-links">
        <ul>
            <li>
					<a class="orange-skin" href="<?php echo base_url('admin/common/logout'); ?>"><i class="fa fa-sign-out "></i></a>
				</li>
		  </ul>
    </div>
</div><!-- Top Bar -->
<header class="side-header light-skin opened-menu">
   <div class="menu-scroll">
	  <div class="side-menus">
			<nav>
				 <ul>
					<li><a ui-sref="dashboard" title=""><i class="fa fa-dashboard"></i> <span>Dashboard</a></li>
					<li class="menu-item-has-children"><a href="#/users" title=""><i class="fa fa-bolt"></i> <span>Spoor</a>
						<ul>
							<li><a href="#/users" title=""><i class="fa fa-bolt"></i> <span>Users</a></li>
							<li><a href="#/sharings" title=""><i class="fa fa-bolt"></i> <span>Sharing</a></li>
							<li><a href="#/phonebook" title=""><i class="fa fa-bolt"></i> <span>Phonebook</a></li>
							<li><a href="#/zeozone" title=""><i class="fa fa-bolt"></i> <span>GeoZone</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#/organisations" title=""><i class="fa fa-bolt"></i> <span>College</a>
						<ul>
							 <li><a href="#/sharings" title=""><i class="fa fa-bolt"></i> <span>Sharing</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#/employees" title=""><i class="fa fa-bolt"></i> <span>Employee  </a>
						<ul>
							 <li><a href="#/sharings" title=""><i class="fa fa-bolt"></i> <span>Sharing</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children"><a href="#/employees" title=""><i class="fa fa-bolt"></i> <span>Reports  </a>
						<ul>
							 <li><a href="#/sharings" title=""><i class="fa fa-bolt"></i> <span>Sharing</a></li>
						</ul>
					</li>
				 </ul>
			</nav>
	  </div>
   </div><!-- Menu Scroll -->
</header>
<script type="text/javascript">
   $(document).ready(function(){
   "use strict";
    //***** Side Menu *****//
   $(".side-menus li.menu-item-has-children > a").on("click",function(){
		$(this).parent().siblings().children("ul").slideUp();
		$(this).parent().siblings().removeClass("active");
		$(this).parent().children("ul").slideToggle();
		$(this).parent().toggleClass("active");
		return false;
   });

   //***** Side Menu Option *****//
   $('.menu-options').on("click", function(){
      $(".side-header.opened-menu").toggleClass('slide-menu');
      $(".main-content").toggleClass('wide-content');
      $("footer").toggleClass('wide-footer');
      $(".menu-options").toggleClass('active');
   });

   /*** FIXED Menu APPEARS ON SCROLL DOWN ***/   
   $(window).scroll(function() {    
      var scroll = $(window).scrollTop();
      if (scroll >= 10) {
        $(".side-header").addClass("sticky");
      }
      else{
        $(".side-header").removeClass("sticky");
        $(".side-header").addClass("");
      }
   }); 
	//***** Side Menu *****//
   $(function(){
      $('.side-menus').slimScroll({
         height: '100%',
         wheelStep: 10,
         size: '2px'
      });
   });
});
</script>
