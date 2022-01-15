<div class="content">
    {{-- Main custom video banner --}}
    <video class="cover_video" autoplay muted loop id="myVideo"
        src="{{ asset(get_static_option('banner_video') ?? 'assets/videos/cover_1.mp4') }}"></video>
    {{--end Main ustom video banner --}}
    {{-- section-filter --}}
    <div class="" style="margin: 10px;">
        <div class="home_car_filter bg-grey container">
            <h2>Find your right car</h2>

            <form class="b-filter row" wire:submit.prevent="search">
                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;" wire:model="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}*{{ $category->id }}</option>
                    @endforeach
                </select>

                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;" wire:model="brand">
                    <option value="">Select Car Brand</option>
                    @foreach ($brands as $brand)
                    <option>{{ $brand }}</option>
                    @endforeach
                </select>

                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;" wire:model="model">
                    <option value="">Select Car Model</option>
                    @foreach ($models as $model)
                    <option>{{ $model }}</option>
                    @endforeach
                </select>
                <div>
                    <div class="b-filter__btns" wire:click="search">
                        <button type="submit" class="btn btn-lg btn-primary">search vehicle</button>
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
    <section wire:ignore.self id="deals" class="wow bounceInUp animated">
        <div class="hot_deals slider-items-products container">
            <div class="new_title ">
                <h2 class="bg-black">Deals of the Week</h2>
            </div>
            <div class="row">
                @foreach($dealcars as $dealcar)
                <div class="col-md-3 text-center" style="margin-bottom: 15px;">
                    <div class="card">
                        <a class="image-box" href="{{ route('carDetails', $dealcar->slug) }}">
                            <img class="" style="padding:20px; max-height: 220px;"
                                src="{{ asset($dealcar->image ?? 'uploads/images/no_image.png') }}" alt="">
                        </a>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <a href="{{ route('carDetails', $dealcar->slug) }}" title="{{ $dealcar->name }}">
                                        <b>{{ $dealcar->name }}</b>
                                    </a>
                                </div>
                                <div class="item-content">
                                    <div class="item-price">
                                        <div class="price-box"><span class="regular-price"><span class="price">৳ {{ $dealcar->selling_price }}</span> </span> </div>
                                    </div>
                                    <div class="other-info">
                                        <div class="col-km" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Mileage</span></br>{{ $dealcar->mileages }}</div>
                                        <div class="col-engine" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Model</span></br>&nbsp;{{ $dealcar->model }}&nbsp;</div>
                                        <div class="col-date" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Brand</span></br>{{ $dealcar->brand }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--end deals of the week Slider -->
    <!-- est seller car Slider -->
    <section wire:ignore.self id="popular" class="wow bounceInUp animated">
        <div class="hot_deals slider-items-products container">
            <div class="new_title ">
                <h2 class="bg-black">Popular Cars</h2>
            </div>
            <div class="row">
                @foreach($popularcars as $popularcar)
                <div class="col-md-3 text-center" style="margin-bottom: 15px;">
                    <div class="card">
                        <a class="image-box" href="{{ route('carDetails', $popularcar->slug) }}">
                            <img class="" style="padding:20px; max-height: 220px;"
                                src="{{ asset($popularcar->image ?? 'uploads/images/no_image.png') }}" alt="">
                        </a>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <a href="{{ route('carDetails', $popularcar->slug) }}" title="{{ $popularcar->name }}">
                                        <b>{{ $popularcar->name }}</b>
                                    </a>
                                </div>
                                <div class="item-content">
                                    <div class="item-price">
                                        <div class="price-box"><span class="regular-price"><span class="price">৳ {{ $popularcar->selling_price }}</span> </span> </div>
                                    </div>
                                    <div class="other-info">
                                        <div class="col-km" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Mileage</span></br>{{ $popularcar->mileages }}</div>
                                        <div class="col-engine" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Model</span></br>&nbsp;{{ $popularcar->model }}&nbsp;</div>
                                        <div class="col-date" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Brand</span></br>{{ $popularcar->brand }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section wire:ignore.self id="deals" class="wow bounceInUp animated">
        <div class="hot_deals slider-items-products container">
            <div class="new_title ">
                <h2 class="bg-black">Used Cars</h2>
            </div>
            <div class="row">
                @foreach($usedcars as $usedcar)
                <div class="col-md-3 text-center" style="margin-bottom: 15px;">
                    <div class="card">
                        <a class="image-box" href="{{ route('carDetails', $usedcar->slug) }}">
                            <img class="" style="padding:20px; max-height: 220px;"
                                src="{{ asset($usedcar->image ?? 'uploads/images/no_image.png') }}" alt="">
                        </a>
                        <div class="item-info">
                            <div class="info-inner">
                                <div class="item-title">
                                    <a href="{{ route('carDetails', $usedcar->slug) }}" title="{{ $usedcar->name }}">
                                        <b>{{ $usedcar->name }}</b>
                                    </a>
                                </div>
                                <div class="item-content">
                                    <div class="item-price">
                                        <div class="price-box"><span class="regular-price"><span class="price">৳ {{ $usedcar->selling_price }}</span> </span> </div>
                                    </div>
                                    <div class="other-info">
                                        <div class="col-km" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Mileage</span></br>{{ $usedcar->mileages }}</div>
                                        <div class="col-engine" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Model</span></br>&nbsp;{{ $usedcar->model }}&nbsp;</div>
                                        <div class="col-date" style="font-size: 11px;"><span style="color:#9A0C05;font-weight:bold;font-size:16px;">Brand</span></br>{{ $usedcar->brand }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
                        <div class="blog-img"> <a href="#"> <img
                                    src="{{ asset('assets/frontend/images/blog-img1.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">14 Jan, 2019</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">4 comments</a> </li>
                            </ul>
                            <h3><a href="#">Powerful and flexible premium Ecommerce themes</a></h3>
                            <p>Fusce ac pharetra urna. Duis non lacus sit amet lacus interdum facilisis sed non est. Ut
                                mi
                                metus, semper eu dictum nec...</p>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="#"> <img
                                    src="{{ asset('assets/frontend/images/blog-img2.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">23 Dec, 2018</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                            </ul>
                            <h3><a href="#">Awesome template with lot's of features on the board!</a>
                            </h3>
                            <p>Aliquam laoreet consequat malesuada. Integer vitae diam sed dolor euismod laoreet eget ac
                                felis erat sed elit bibendum ...</p>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img"> <a href="#"> <img
                                    src="{{ asset('assets/frontend/images/blog-img3.jpg') }}" alt="blog image"> </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <div class="post-date"> <span class="entry-date">23 Dec, 2018</span> </div>
                            <ul class="post-meta">
                                <li><i class="fa fa-user"></i>Posted by <a href="#">admin</a> </li>
                                <li><i class="fa fa-comments"></i><a href="#">8 comments</a> </li>
                            </ul>
                            <h3><a href="#">Awesome template with lot's of features on the board!</a>
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
