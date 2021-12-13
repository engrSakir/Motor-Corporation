<div class="content">
    {{-- Main banner --}}
    <div class="container-fluid">
        <div class="row">
            <!-- Slider -->
            <div class="home-slider5">
                <div id="thmg-slideshow" class="thmg-slideshow">
                    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                            <ul>
                                <li>
                                    <video autoplay muted loop id="myVideo"
                                        style="position: absolute; right: 0; bottom: 0; min-width: 100%; min-height: 100%;"
                                        src="{{ asset(get_static_option('banner_video') ?? 'assets/videos/cover_1.mp4') }}"></video>
                                    <div class="container ">
                                        <div class="content_slideshow">
                                            <div class="row">
                                                {{-- <div>
                                                    <div class="info">
                                                        <div class='tp-caption ExtraLargeTitle sft  tp-resizeme '
                                                            data-endspeed='500' data-speed='500' data-start='1100'
                                                            data-easing='Linear.easeNone' data-splitin='none'
                                                            data-splitout='none' data-elementdelay='0.1'
                                                            data-endelementdelay='0.1'
                                                            style='z-index:2; white-space:nowrap;'><span>Top Brands
                                                                2021</span>
                                                        </div>
                                                        <div class='tp-caption LargeTitle sfl  tp-resizeme '
                                                            data-endspeed='500' data-speed='500' data-start='1300'
                                                            data-easing='Linear.easeNone' data-splitin='none'
                                                            data-splitout='none' data-elementdelay='0.1'
                                                            data-endelementdelay='0.1'
                                                            style='z-index:3; white-space:nowrap;'><span
                                                                style="font-weight:normal; display:block">Modern-classic</span>
                                                            incredible </div>
                                                        <div class='tp-caption Title sft  tp-resizeme '
                                                            data-endspeed='500' data-speed='500' data-start='1450'
                                                            data-easing='Power2.easeInOut' data-splitin='none'
                                                            data-splitout='none' data-elementdelay='0.1'
                                                            data-endelementdelay='0.1'
                                                            style='z-index:4; white-space:nowrap;'>Get 40% OFF on
                                                            selected
                                                            items.</div>
                                                        <div class='tp-caption sfb  tp-resizeme ' data-endspeed='500'
                                                            data-speed='500' data-start='1500'
                                                            data-easing='Linear.easeNone' data-splitin='none'
                                                            data-splitout='none' data-elementdelay='0.1'
                                                            data-endelementdelay='0.1'
                                                            style='z-index:4; white-space:nowrap;'><a href='#'
                                                                class="buy-btn">Booking Now</a>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--end Main banner --}}
    <!--Search box-->
    {{-- section-filter --}}
    <div class="" style="margin: 10px;">
        <div class="b-filter__inner bg-grey container">
            <h2>Find your right car</h2>
            <form class="b-filter">
                <div class="btn-group bootstrap-select">
                    <select class="selectpicker" data-width="100%" tabindex="-98">
                        <option>Select Make</option>
                        <option>Make 1</option>
                        <option>Make 2</option>
                        <option>Make 3</option>
                    </select>
                </div>
                <div class="btn-group bootstrap-select">
                    <select class="selectpicker" data-width="100%" tabindex="-98">
                        <option>Select Car Status</option>
                        <option>Status 1</option>
                        <option>Status 2</option>
                        <option>Status 3</option>
                    </select>
                </div>
                <div class="btn-group bootstrap-select">
                    <select class="selectpicker" data-width="100%" tabindex="-98">
                        <option>Select Model</option>
                        <option>Model 1</option>
                        <option>Model 2</option>
                        <option>Model 3</option>
                    </select>
                </div>
                <div>
                    <div class="b-filter__btns">
                        <button class="btn btn-lg btn-primary">search vehicle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--end Search box-->
    <!--2 small banner image-->
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="image-box" data-scroll-goto="1">
                        <img height="350px;" width="150px;" src="{{ asset('assets/images/small_cover_1.jpg') }}"
                            alt="banner1">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="image-box" data-scroll-goto="2">
                        <img height="350px;" width="150px;" src="{{ asset('assets/images/small_cover_2.jpg') }}"
                            alt="banner2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end2 small banner image-->
    <!-- deals of the week Slider -->
    <section class="wow bounceInUp animated">
        <div class="hot_deals slider-items-products container">
            <div class="new_title ">
                <h2 class="bg-black">Deals of the Week</h2>
            </div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">
                @foreach($dealcars as $dealcar)


                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="{{ route('carDetails', $dealcar->slug) }}" title="Retis lapen casen"
                                        class="product-image"><img
                                            src="{{ asset($dealcar->image ?? 'uploads/images/no_image.png') }}"
                                            alt="Retis lapen casen"></a>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"></button>
                                            </div>
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick
                                                        View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#"
                                                        class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                            Wishlist</span></a> </span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="{{ route('carDetails', $dealcar->slug) }}"
                                            title="{{ $dealcar->name }}">{{ $dealcar->name }}</a>
                                    </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                        class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price"><span
                                                        class="price">৳ {{ $dealcar->selling_price }}</span> </span> </div>
                                        </div>
                                        <div class="other-info">
                                            <div class="col-km"><i class="fa fa-tachometer"></i> {{ $dealcar->mileages }}</div>
                                            <div class="col-engine"><i class="fa fa-gear"></i>{{ $dealcar->model }}</div>
                                            <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{ $dealcar->brand }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->

                 @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--end deals of the week Slider -->
    <!-- est seller car Slider -->
    <section class="wow bounceInUp animated">
        <div class="hot_deals slider-items-products container">
            <div class="new_title ">
                <h2 class="bg-black">Popular Cars</h2>
            </div>
            <div id="best-seller" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 products-grid">

                @foreach($popularcars as $popularcar)


                    <!-- Item -->
                    <div class="item">
                        <div class="item-inner">
                            <div class="item-img">
                                <div class="item-img-info"><a href="{{ route('carDetails', $popularcar->slug) }}" title="Retis lapen casen"
                                        class="product-image"><img
                                            src="{{ asset($popularcar->image ?? 'uploads/images/no_image.png') }}"
                                            alt="Retis lapen casen"></a>
                                    <div class="item-box-hover">
                                        <div class="box-inner">
                                            <div class="add_cart">
                                                <button class="button btn-cart" type="button"></button>
                                            </div>
                                            <div class="product-detail-bnt"><a class="button detail-bnt"><span>Quick
                                                        View</span></a></div>
                                            <div class="actions"><span class="add-to-links"><a href="#"
                                                        class="link-wishlist" title="Add to Wishlist"><span>Add to
                                                            Wishlist</span></a> </span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item-info">
                                <div class="info-inner">
                                    <div class="item-title"><a href="{{ route('carDetails', $popularcar->slug) }}"
                                            title="{{ $popularcar->name }}">{{ $popularcar->name }}</a>
                                    </div>
                                    <div class="item-content">
                                        <div class="rating">
                                            <div class="ratings">
                                                <div class="rating-box">
                                                    <div class="rating" style="width:80%"></div>
                                                </div>
                                                <p class="rating-links"><a href="#">1 Review(s)</a> <span
                                                        class="separator">|</span> <a href="#">Add Review</a> </p>
                                            </div>
                                        </div>
                                        <div class="item-price">
                                            <div class="price-box"><span class="regular-price"><span
                                                        class="price">৳ {{ $popularcar->selling_price }}</span> </span> </div>
                                        </div>
                                        <div class="other-info">
                                            <div class="col-km"><i class="fa fa-tachometer"></i> {{ $popularcar->mileages }}</div>
                                            <div class="col-engine"><i class="fa fa-gear"></i> {{ $popularcar->model }}</div>
                                            <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i>
                                            {{ $popularcar->brand }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Item -->
@endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- est seller car Slider -->
    <!-- latest blogs -->
    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->
        <div class="blog-home-inner">
            <div class="blog-title">
                <h2>Latest Blog post</h2>
            </div>
            <!--For version 1,2,3,4,5,6,8 -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img
                                    src="{{ asset('assets/frontend/images/blog-img1.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">14 Jan, 2019</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">4 comments</a> </li>
                            </ul>
                            <h3><a href="blog-detail.html">Powerful and flexible premium Ecommerce themes</a></h3>
                            <p>Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum facilisis sed non est. Ut
                                mi
                                metus, semper eu dictum nec...</p>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img
                                    src="{{ asset('assets/frontend/images/blog-img2.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">23 Dec, 2018</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                            </ul>
                            <h3><a href="blog-detail.html">Awesome template with lot's of features on the board!</a>
                            </h3>
                            <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac
                                felis erat sed elit bibendum ...</p>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="blog-detail.html"> <img
                                    src="{{ asset('assets/frontend/images/blog-img3.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">23 Dec, 2018</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                            </ul>
                            <h3><a href="blog-detail.html">Awesome template with lot's of features on the board!</a>
                            </h3>
                            <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac
                                felis erat sed elit bibendum ...</p>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
            </div>
        </div>
        <!--END For version 1,2,3,4,5,6,8 -->
        <!--exclude For version 6 -->
        <!--container-->
    </div>
    {{-- Video --}}
    <div class="latest-blog wow bounceInUp animated animated container">
        <!--exclude For version 6 -->
        <div class="blog-home-inner">
            <div class="blog-title">
                <h2>Videos</h2>
            </div>
            <!--For version 1,2,3,4,5,6,8 -->
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img">
                            <a href="javascript:vaoid(0)">
                                <iframe width="400" height="250" src="{{ get_static_option('video1') }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <h3><a href="{{ get_static_option('video1') }}" target="_blank">{{
                                    get_static_option('title1') }}</a></h3>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img">
                            <a href="javascript:vaoid(0)">
                                <iframe width="400" height="250" src="{{ get_static_option('video2') }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <h3><a href="{{ get_static_option('video2') }}" target="_blank">{{
                                    get_static_option('title2') }}</a></h3>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img">
                            <a href="javascript:vaoid(0)">
                                <iframe width="400" height="250" src="{{ get_static_option('video3') }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <h3><a href="{{ get_static_option('video3') }}" target="_blank">{{
                                    get_static_option('title3') }}</a></h3>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
            </div>
        </div>
        <!--container-->
    </div>
    <!--end latest blogs -->
</div>