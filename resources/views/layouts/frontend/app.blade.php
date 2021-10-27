<!DOCTYPE html>
<!--
***************************************************************
AUTHOR : CKavArt
PROJECT : PINAK - Coming Soon Creative Template

NOTE : This file licensed to CKavArt - https://themeforest.net/user/c-kav and it is strictly prohibited to copy or reuse it.

Copyright 2017-2018 CKavArt

Purchase : 
***************************************************************
-->
<html>

<head>

@include('layouts.frontend.partials.head')


</head>
<body data-tooltipfont="Montserrat">

	<!-- PAGE-LOADER -->
<div class="loader-bg flex-cc" data-bgcolor="rgba(37,37,37,1)">
	<div class='loader-ring'>
		<div class='loader-ring-light'></div>
		<div class='loader-ring-track'></div>
	</div>
</div><!-- / PAGE-LOADER -->

	<!-- MAIN-WRAPPER -->
	<div class="ckav-mainwrapper">

				<!-- HEADER -->
				@include('layouts.frontend.partials.header')

		<!-- / HEADER -->


				<!-- NAVIGATION -->
				@include('layouts.frontend.partials.nav')

		<!-- / NAVIGATION -->

		
		<!-- SECTION SCROLL -->
		<div id="ckav-sscroll" class="ckav-sscroll">
			
		@yield('content')


		<div class="ckav-popup-overlay" data-gradient="y" data-g-colors="rgba(0, 0, 0,0.7)|rgba(0, 0, 0,0.9)"></div>

	</div><!-- / MAIN-WRAPPER -->

	<!-- GOOGLE FONTS -->
	@include('layouts.frontend.partials.foot')

</body>

</html>