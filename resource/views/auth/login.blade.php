<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{config('admin.title')}} - Login</title>
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
	<link href="{{ admin_asset('vendor/leaf/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
	<link class="main-stylesheet" href="{{ admin_asset('vendor/leaf/pages/css/pages.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		window.onload = function() {
			// fix for windows 8
			if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
				document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="{{ admin_asset('
			vendor / leaf / pages / css / windows.chrome.fix.css ') }}" />'
		}
	</script>
</head>

<body class="fixed-header ">
	<div class="login-wrapper ">
		<!-- START Login Background Pic Wrapper-->
		<div class="bg-pic">
			<!-- START Background Pic-->
			<img src="{{ admin_asset('vendor/leaf/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src="{{ admin_asset('vendor/leaf/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src-retina="{{ admin_asset('vendor/leaf/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}"
			    alt="" class="lazy">
			<!-- END Background Pic-->
			<!-- START Background Caption-->
			<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
				{{--
				<h2 class="semi-bold text-white">
					Pages make it easy to enjoy what matters the most in the life</h2>
				<p class="small">
					images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © 2013-2014 REVOX.
				</p> --}}
			</div>
			<!-- END Background Caption-->
		</div>
		<!-- END Login Background Pic Wrapper-->
		<!-- START Login Right Container-->
		<div class="login-container bg-white">
			<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
				<img src="{{ admin_asset('vendor/leaf/assets/img/logo.png') }}" alt="logo" data-src="{{ admin_asset('vendor/leaf/assets/img/logo.png') }}" data-src-retina="{{ admin_asset('vendor/leaf/assets/img/logo_2x.png') }}" width="78" height="22">
				<p class="p-t-35">统一管理面板登录页面</p>
                @if ($errors->has('username'))
                    <code class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </code>
                @endif
                @if ($errors->has('password'))
                    <code class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </code>
                @endif
				<!-- START Login Form -->
				<form id="form-login" class="p-t-15" role="form" action="{{ admin_base_path('login') }}" method="POST">
					{{ csrf_field() }}
					<!-- START Form Control-->
					<div class="form-group form-group-default">
						<label>用户名</label>
						<div class="controls">
							<input type="text" name="username" placeholder="用户名" class="form-control" required>
						</div>
					</div>
					<!-- END Form Control-->
					<!-- START Form Control-->
					<div class="form-group form-group-default">
						<label>密码</label>
						<div class="controls">
							<input type="password" class="form-control" name="password" placeholder="密码" required>
						</div>
					</div>
					<!-- START Form Control-->
					<div class="row">
						<div class="col-md-6 no-padding sm-p-l-10">
							<div class="checkbox ">
								<input type="checkbox" value="1" name="remember" id="remember">
								<label for="remember">保持登录状态</label>
							</div>
						</div>
						<div class="col-md-6 d-flex align-items-center justify-content-end">
							<a href="#" class="text-info small">忘记密码</a>
						</div>
					</div>
					<!-- END Form Control-->
					<button class="btn btn-primary btn-cons m-t-10" type="submit">登录</button>
				</form>
				<!--END Login Form-->
				<div class="pull-bottom sm-pull-bottom">
					<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
						<div class="col-sm-3 col-md-2 no-padding">
							<img alt="" class="m-t-5" data-src="{{ admin_asset('vendor/leaf/assets/img/demo/pages_icon.png') }}" data-src-retina="{{ admin_asset('vendor/leaf/assets/img/demo/pages_icon_2x.png') }}" height="60" src="{{ admin_asset('vendor/leaf/assets/img/demo/pages_icon.png') }}"
							    width="60">
						</div>
						<div class="col-sm-9 no-padding m-t-10">
							<p>
								{{-- <small>
    					Create a pages account. If you have a facebook account, log into it for this
    					process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#"
    					                                                                       class="text-info">Google</a>
    				</small> --}}
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END Login Right Container-->
	</div>
	<!-- BEGIN VENDOR JS -->
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
	<script src="{{ admin_asset('vendor/leaf/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
	<!-- END VENDOR JS -->
	<script src="{{ admin_asset('vendor/leaf/pages/js/pages.min.js') }}"></script>
	<script>
		$(function() {
			$('#form-login').validate()
		})
	</script>
</body>

</html>
