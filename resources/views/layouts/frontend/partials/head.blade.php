<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title> @stack('title') - {{ config('app.name') }} </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{{ config('app.name') }}">
<meta name="author" content="{{ config('app.name') }}">
<meta name="keywords" content="">
<meta name="robots" content="*">
<link rel="icon" href="#" type="image/x-icon">
<link rel="shortcut icon" href="#" type="image/x-icon">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/font-awesome.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/bootstrap-select.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/revslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/owl.theme.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/jquery.bxslider.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/jquery.mobile-menu.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/style.css') }}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/stylesheet/responsive.css') }}" media="all">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,700italic,400,600,700,800'
    rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Saira+Condensed:300,400,500,600,700,800" rel="stylesheet">
@stack('head')
<style>
    .image-box {
        position: relative;
        overflow: hidden;
    }

    .image-box img {
        max-width: 100%;
        transition: all 0.3s;
        display: block;
        width: 400px;
        height: 400px;
        transform: scale(1);
    }

    .image-box:hover img {
        transform: scale(1.1);
    }

    /* a {
        color: #faf3f3;
    } */

    /* Cover video full screen */
    .cover_video {
        object-fit: cover;
        width: 100vw;
        height: 100vh;
        position: ;
        top: 0;
        left: 0;
    }
</style>
