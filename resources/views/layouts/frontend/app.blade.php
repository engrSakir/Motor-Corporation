<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.frontend.partials.head')
@livewireStyles
</head>
<body>
<div id="page">
@include('layouts.frontend.partials.header')

  <!--container-->
  @if(isset($slot))
  {{ $slot }}
  @else
  @yield('content')
  @endif

  <!-- For version 1,2,3,4,6 -->
  @include('layouts.frontend.partials.footer')


  <!-- End For version 1,2,3,4,6 -->

</div>
<!--page-->
<!-- Mobile Menu-->
<div id="mobile-menu">
  <ul>
        <li>
      <div class="mm-search">
        <form id="search1" name="search">
          <div class="input-group">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> </button>
            </div>
            <input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
          </div>
        </form>
      </div>
    </li>
     <li class="active"> <a class="level-top" href="#"><span>Home</span></a></li>
    <li><a href="grid1.html">Accessories</a>
      <!--mega menu-->
                                <ul class="level0">
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Audio</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Amplifiers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Installation Parts</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Speakers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Stereos</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Subwoofers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Body Parts</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bumpers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Doors</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fenders</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Grilles</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Hoods</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Exterior</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Bed Accessories</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Body Kits</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Grilles</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Car Covers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Bumpers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Interior</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Custom Gauges</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Dash Kits</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Seat Covers</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Steering Wheels</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Sun Shades</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 nav-6-1 parent item"> <a href="grid.html"><span>Lighting</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Fog Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Headlights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>LED Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Off-Road Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2 nav-6-1-1"> <a href="grid.html"><span>Signal Lights</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                  <li class="level3 parent item"> <a href="grid.html"><span>Performance</span></a>
                                    <!--sub sub category-->
                                    <ul class="level1">
                                      <li class="level2"> <a href="grid.html"><span>Air Intake Systems</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2"> <a href="grid.html"><span>Brakes</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2"> <a href="grid.html"><span>Exhaust Systems</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2"> <a href="grid.html"><span>Power Adders</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                      <li class="level2"> <a href="grid.html"><span>Racing Gear</span></a> </li>
                                      <!--level2 nav-6-1-1-->
                                    </ul>
                                    <!--level1-->
                                    <!--sub sub category-->
                                  </li>
                                  <!--level3 nav-6-1 parent item-->
                                </ul>
                                <!--level0-->
    </li>
    <li><a href="#">Listing‎</a>
      <ul class="level1">
        <li class="level1 first"><a href="grid.html"><span>Car Grid</span></a></li>
        <li class="level1 nav-10-2"> <a href="list.html"> <span>Car List</span> </a> </li>
        <li class="level1 nav-10-3"> <a href="grid1.html"> <span>Accessories Grid</span> </a> </li>
        <li class="level1 nav-10-4"> <a href="list1.html"> <span>Accessories List</span> </a> </li>
        <li class="level1 first parent"><a href="car-detail.html"><span>Car Detail</span></a> </li>
        <li class="level1 first parent"><a href="accessories-detail.html"><span>Accessories Detail</span></a> </li>
      </ul>
    </li>
    <li><a href="grid.html">Blog</a>
       <ul class="level1">
          <li class="level1 first"><a href="blog.html"><span>Blog List</span></a></li>
          <li class="level1 nav-10-2"> <a href="blog-detail.html"> <span>Blog Detail</span> </a> </li>
        </ul>
    </li>
    <li><a href="compare.html">Compare Cars‎</a></li>
    <li><a href="#">Pages</a>
       <ul class="level1">
                          <li class="level1"> <a href="about-us.html"> <span>About us</span> </a> </li>
                          <li class="level1 nav-10-4"> <a href="shopping-cart.html"> <span>Cart Page</span> </a> </li>
                          <li class="level1 first parent"><a href="checkout.html"><span>Checkout</span></a>
                            <!--sub sub category-->
                            <ul class="level2 right-sub">
                              <li class="level2 nav-2-1-1 first"><a href="checkout-method.html"><span>Method</span></a></li>
                              <li class="level2 nav-2-1-5 last"><a href="checkout-billing-info.html"><span>Billing Info</span></a></li>
                            </ul>
                            <!--sub sub category-->
                          </li>
                          <li class="level1 nav-10-4"> <a href="wishlist.html"> <span>Wishlist</span> </a> </li>
                          <li class="level1"> <a href="dashboard.html"> <span>Dashboard</span> </a> </li>
                          <li class="level1"> <a href="multiple-addresses.html"> <span>Multiple Addresses</span> </a> </li>
                          <li class="level1"><a href="contact-us.html"><span>Contact us</span></a> </li>
                          <li class="level1"><a href="404error.html"><span>404 Error Page</span></a> </li>
                          <li class="level1"><a href="login.html"><span>Login Page</span></a> </li>
                          <li class="level1"><a href="quickview.html"><span>Quick View</span></a> </li>
                          <li class="level1"><a href="newsletter.html"><span>Newsletter</span></a> </li>
                        </ul>
    </li>
    <li><a href="#">Custom</a></li>
   </ul>
</div>
{{-- <div class="popup1" style="display: block;">
  <div class="newsletter-sign-box">
    <h3>Newsletter Sign up</h3>
     <img src="{{ asset('assets/frontend/images/close-icon.png') }}" alt="close" class="x" onClick="HideMe();">
    <div class="newsletter">
      <div class="newsletter_img"> <img alt="newsletter" src="{{ asset('assets/frontend/images/newsletter_img.png') }}"></div>
      <form method="post" id="popup-newsletter" name="popup-newsletter" class="email-form">
        <h4>sign up for our exclusive email list and be the first to hear of special offers.</h4>
        <div class="newsletter-form">
          <div class="input-box">
            <input type="text" name="email" id="newsletter2" title="Sign up for our newsletter" placeholder="Enter your email address" class="input-text required-entry validate-email">
            <button type="submit" title="Subscribe" class="button subscribe"><span>Subscribe</span></button>
          </div>
          <!--input-box-->
        </div>
        <!--newsletter-form-->
        <label class="subscribe-bottom">
          <input type="checkbox" name="notshowpopup" id="notshowpopup">
          Don’t show this popup again</label>
      </form>
    </div>
    <!--newsletter-->
  </div>
  <!--newsletter-sign-box-->
</div>
<div id="fade" style="display: block;"></div> --}}

<!-- Messenger Chat plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "102556921986185");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v12.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

@include('layouts.frontend.partials.foot')
@livewireScripts
</body>
</html>
