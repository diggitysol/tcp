$(function() {
   $.material.init();
	$('[data-toggle="tooltip"]').tooltip();
	
	var login_path = location.pathname;
   var login_hash = window.location.hash;
    
   /*if(login_path == '/getnotes/gn_backend_login' && login_hash != '#/')
   {
      window.location = '/getnotes/gn_backend_login#/';
   }*/
});


function show_warning(message) {
    $.notify({
        icon            : 'fa fa-ban',
        title           : 'Server Error!',
        message         : message 
    },{
        mouse_over      : 'pause',
        delay           : 10000,
	    timer            : 1000,
        offset          : 3,
        newest_on_top   : true,
        type            : 'warning'
    });
}

function show_danger(message) {
    $.notify({
        icon            : 'fa fa-exclamation-circle',
        title           : 'Important!',
        message         : message 
    },{
        mouse_over      : 'pause',
        delay           : 10000,
	    timer            : 1000,
        offset          : 3,
        newest_on_top   : true,
        type            : 'danger'
    });
}

function show_info(message) {
    $.notify({
        icon            : 'fa fa-info',
        title           : 'Info!',
        message         : message 
    },{
        mouse_over      : 'pause',
        delay           : 10000,
	    timer            : 1000,
        offset          : 3,
        newest_on_top   : true,
        type            : 'info'
    });
}

function show_success(message) {
    $.notify({
        icon            : 'fa fa-check',
        title           : 'Congrats!',
        message         : message 
    },{
        mouse_over      : 'pause',
        delay           : 10000,
	    timer            : 1000,
        offset          : 3,
        newest_on_top   : true,
        type            : 'success'
    });
}

function show_animation(){
    $('.loading_container').css('display', 'block');
    $('.cat_loading').css('opacity', '.8');
}
    
function hide_animation(){
    $('.loading_container').fadeOut();
}

function clear_options() {
    var select = [];
    select = $('#subject').selectize({
        persist: false,
        create: true
    });

    var selectize = select[0].selectize;
    selectize.clear();
}



