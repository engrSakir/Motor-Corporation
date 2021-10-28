<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ config('app.name') }}">
<meta name="author" content="{{ config('app.name') }}">
<meta name="keywords" content="">
<meta name="robots" content="*">

	<!-- TITLE -->
	<title>@stack('title') - {{ config('app.name') }} </title>

	<!-- FONT-ICONS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/Icon-font-7-stroke-PIXEDEN/css/pe-icon-7-stroke.css') }}">
	<link rel="stylesheet" type="text/css" href="lib/et-line-font/style.css') }}">

	<!-- LIB -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/animation/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/sweetalert/sweetalert.css') }}">

	<!-- EFFECT -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/vegas/vegas.min.css') }}">
	<link rel="stylesheet" type="text/css" href="lib/jquery.mb.YTPlayer-master/jquery.mb.YTPlayer.min.css') }}">

	<!-- TEMPLATE -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/fullPage.js-master/dist/jquery.fullpage.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/lib/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/ckav-grids.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/helper.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/responsive.css') }}">

	<!-- THEME -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/themes/default.css') }}">

	<!-- CUSTOM -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/custom.css') }}">

	<!-- FAVICONS -->
	<link rel="icon" href="images/favicons/favicon.ico">
	<link rel="icon apple-touch-icon" type="image/png" href="{{ asset('assets/frontend/images/favicons/apple-icon.png') }}">
	<link rel="icon apple-touch-icon" type="image/png" sizes="72x72" href="{{ asset('assets/frontend/images/favicons/apple-icon-72x72.png') }}">
	<link rel="icon apple-touch-icon" type="image/png" sizes="114x114" href="{{ asset('assets/frontend/images/favicons/apple-icon-114x114.png') }}">

	{{-- <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-79547588-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-79547588-3');
</script> --}}
