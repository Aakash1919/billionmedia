
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<link href="{{ asset('assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js')}}"></script>
	<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{ asset('assets/css/header-colors.css')}}" />
    <title>{{ config('app.name', 'BillionMedia') }}</title>
    <link href="{{ asset('assets/css/app.css')}}" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
        @include('components.sidebar.default')
        @include('components.header.default')
        @yield('content')
		@include('components.footer.default')
	</div>
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{ asset('assets/js//jquery.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
	<script src="{{ asset('assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/highcharts.js')}}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/exporting.js')}}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/variable-pie.js')}}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/export-data.js')}}"></script>
	<script src="{{ asset('assets/plugins/highcharts/js/accessibility.js')}}"></script>
	<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
	<script src="{{ asset('assets/js/index.js')}}"></script>
	<script src="{{ asset('assets/js/app.js')}}"></script>
	<script>
    $(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})
</script> 
<script>
	$(document).on("click","#cust_btn",function(){
  
  $("#myModal").modal("toggle"); 
})
$(document).ready(function(){
  $(".close").click(function(){
    $("#myModal").toggle();
	$('body.modal-open .fade.show').removeClass('show');
  });
});
</script>

<script>
$(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>

</body>
</html>