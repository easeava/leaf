<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ Leaf::title() }} - Leaf Console Panel </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
	<link rel="apple-touch-icon" href="{{ admin_asset('vendor/leaf/pages/ico/60.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ admin_asset('vendor/leaf/pages/ico/76.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ admin_asset('vendor/leaf/pages/ico/120.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ admin_asset('vendor/leaf/pages/ico/152.png') }}">
	<link rel="icon" type="image/x-icon" href="favicon.ico" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
	<link href="{{ admin_asset('vendor/leaf/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
	{!! Leaf::css() !!}
	<link href="{{ admin_asset('vendor/leaf/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="{{ admin_asset('vendor/leaf/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		let LEAF = function () {}
		LEAF.token = "{{ csrf_token() }}";
	</script>
</head>

<body class="fixed-header horizontal-menu horizontal-app-menu ">
	@include('leaf::layouts.header')
	<div class="page-container ">
		<!-- START PAGE CONTENT WRAPPER -->
		<div class="page-content-wrapper ">
				<!-- START PAGE CONTENT -->
				<div class="content sm-gutter">
					<!-- START JUMBOTRON -->
	          		<div data-pages="parallax">
						<div class=" container no-padding    container-fixed-lg">
							<div class="inner">
								<!-- START BREADCRUMB -->
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">默认</a></li>
									<li class="breadcrumb-item active">首页</li>
								</ol>
							</div>
						</div>
					</div>
	          		<!-- END JUMBOTRON -->
				<!-- START CONTAINER FLUID -->
				<div class="container sm-padding-10 no-padding">
					@yield('content')
				</div>
				<!-- END CONTAINER FLUID -->
			</div>
			<!-- END PAGE CONTENT -->
			@include('leaf::layouts.footer')
		</div>
		<!-- END PAGE CONTENT WRAPPER -->
	</div>
	<!-- END PAGE CONTAINER -->
	@include('leaf::layouts.quickview')
	@include('leaf::layouts.overlay')
	<!-- BEGIN VENDOR JS -->
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/feather-icons/feather.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/tether/js/tether.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('vendor/leaf/assets/plugins/select2/js/select2.full.min.js') }}"></script>
	<script type="text/javascript" src="{{ admin_asset('vendor/leaf/assets/plugins/classie/classie.js') }}"></script>
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
	{!! Leaf::js() !!}
	<!-- END VENDOR JS -->
	<!-- BEGIN CORE TEMPLATE JS -->
	<script src="{{ admin_asset('vendor/leaf/pages/js/pages.min.js') }}"></script>
	<!-- END CORE TEMPLATE JS -->
	<!-- BEGIN PAGE LEVEL JS -->
	<script src="{{ admin_asset('vendor/leaf/assets/js/scripts.js') }}" type="text/javascript"></script>
	{!! Leaf::script() !!}
	<!-- END PAGE LEVEL JS -->
</body>

</html>
