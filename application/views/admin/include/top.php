<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#/" title="Get notes admin">Get Notes Admin</a>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="text-center">
                    <a type="button" data-toggle="tooltip" data-placement="bottom" title="Notes" href="#/gn_notes"><i class="glyphicon glyphicon-book"></i></a>    
                </li>
                <li class="text-center">
                    <a type="button" data-toggle="tooltip" data-placement="bottom" title="Courses" href="#/gn_course"><i class="glyphicon glyphicon-education"></i></a>
                </li>
                <li class="text-center">
                    <a type="button" data-toggle="tooltip" data-placement="bottom" title="Universities" href="#/gn_university"><i class="glyphicon glyphicon-queen"></i></a>
                </li>
                <li class="text-center">
                    <a type="button" data-toggle="tooltip" data-placement="bottom" title="Settings" href="#/gn_admin_setting"><i class="glyphicon glyphicon-cog"></i></a>
                </li>
                <li class="text-center">
                    <a type="button" data-toggle="tooltip" data-placement="bottom" title="Logout" href="<?php echo base_url('gn_logout'); ?>"><i class="glyphicon glyphicon-off"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>