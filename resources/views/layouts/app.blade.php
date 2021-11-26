
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
</body>
</html>