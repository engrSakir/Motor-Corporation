
<header>
    <div class="container">
        <div class="row">
            <div id="header">
                <div class="header-container">
                    <div class="header-logo">
                        <a href="{{ url('/') }}" title="Car HTML" class="logo">
                            <div>
                                <img style="background-color:#000000; border-radius:15px; box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);"
                                    src="{{ asset(get_static_option('logo') ?? 'assets/frontend/images/logo-bg.png') }}" height="110px"
                                    alt="Car Store">
                                 
                            </div>
                        </a>
                    </div>
                    <div class="header__nav">
                        <div class="fl-header-right">
                            <div class="fl-links">
                                <div class="no-js"> <a title="" class="clicker"></a>
                                    <div class="fl-nav-links">
                                        <h3>My Acount</h3>
                                        <ul class="links">
                                            <li><a href="{{ url('/login') }}" title="My Account">Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--mini-cart-->
                            <div class="collapse navbar-collapse">
                                <form class="navbar-form" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
                                            <button type="submit" class="search-btn"> <span
                                                    class="glyphicon glyphicon-search"> <span
                                                        class="sr-only">Search</span> </span> </button>
                                        </span>
                                        <span class="input-group-btn">
                                            <a href="#" class="search-btn" style="">
                                                <img width="30px;" src="{{ asset('assets/images/map-icon.png') }}" alt="">
                                                {{-- <button class="button btn-cart" type="button"></button> --}}
                                                {{-- <i class="fa fa-tachometer"></i> --}}
                                                {{-- <span class="glyphicon glyphicon-map-marker">  </span> --}}
                                            </a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!--links-->
                        </div>
                        <div class="fl-nav-menu">
                            <nav>
                                <div class="mm-toggle-wrap">
                                    <div class="mm-toggle"><i class="fa fa-bars"></i><span
                                            class="mm-label">Menu</span> </div>
                                </div>
                                <div class="nav-inner">
                                    <!-- BEGIN NAV -->
                                    <ul id="nav" class="hidden-xs">
                                        <li class="active"> <a class="level-top" href="{{ url('/') }}"><span>Home</span></a></li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="#"><span>Inventory</span></a>
                                            <ul class="level1">
                                                <li class="level1 first"><a href="#popular"><span>Popular Cars</span></a>
                                                </li>
                                                <li class="level1 nav-10-2"> <a href="#deals"> <span>Deal of the week</span>
                                                    </a> </li>
                                                
                                            </ul>
                                        </li>
                                        <li class="level0 parent drop-menu"> <a class="level-top"
                                                href="#"><span>Blog</span></a>
                                            <ul class="level1">
                                                <li class="level1 first"><a href="#"><span>Blog
                                                            List</span></a></li>
                                                <li class="level1 nav-10-2"> <a href="#"> <span>Blog
                                                            Detail</span> </a> </li>
                                            </ul>
                                        </li>
                                        <li class="mega-menu hidden-sm"> <a class="level-top"
                                                href="{{ route('booking') }}"><span>Booking</span></a> </li>
                                        <li class="fl-custom-tabmenulink mega-menu"> <a href="#"
                                                class="level-top"> <span>Offer</span> </a>
                                            <div class="level0-wrapper fl-custom-tabmenu"
                                                style="left: 0px; display: none;">
                                                <div class="container">
                                                    <div class="header-nav-dropdown-wrapper clearer">
                                                    @php 
                                                    $offer_cars=offer_cars();
                                                    @endphp
                                                   @foreach($offer_cars as $offer)  

                                                        <div class="grid12-3">
                                                           <a href="{{ route('carDetails', $offer->slug) }}"> 
                                                           <div><img
                                                                    src="{{ asset($offer->image ?? 'uploads/images/no_image.png') }}"
                                                                    alt="custom-image"></div>
                                                            <h4 class="heading">SALE UP TO {{ $offer->discount_percentage }}% OFF</h4>
                                                            <p>{{ $offer->name }}
                                                            </p>
                                                            </a>

                                                        </div>
                                                   @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="{{ route('contact') }}"> <a class="level-top" href="#"><span>Contact Us</span></a></li>
                                    </ul>
                                    <!--nav-->
                                </div>
                            </nav>
                        </div>
                    </div>
                    <!--row-->
                </div>
            </div>
        </div>
    </div>
</header>
