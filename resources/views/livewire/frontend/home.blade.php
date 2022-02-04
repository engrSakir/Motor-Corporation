<div class="content">
    {{-- Main custom video banner --}}
    <video class="cover_video" autoplay muted loop id="myVideo"
        src="{{ asset(get_static_option('banner_video') ?? 'assets/videos/cover_1.mp4') }}"></video>
    {{--end Main ustom video banner --}}
    {{-- section-filter --}}
    <div class="">
        <div class="home_car_filter container-fluid">
            <h2>Find your right car</h2>

            <form class="b-filter row" wire:submit.prevent="search">
                <select class="col-md-4"
                    style="border:none; margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
                    wire:model="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}*{{ $category->id }}</option>
                    @endforeach
                </select>

                <select class="border:none; col-md-4"
                    style="border:none; margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
                    wire:model="brand">
                    <option value="">Select Car Brand</option>
                    @foreach ($brands as $brand)
                    <option>{{ $brand }}</option>
                    @endforeach
                </select>

                <select class="col-md-4"
                    style="border:none; margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
                    wire:model="model">
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

    <div class="row" id="collection">
        @foreach ($cars as $car)
        <div class="col-md-6" style="margin-top: 20px;">
            <div class="product-item" style="text-align: center;">
                <span class="text">
                    <a href="{{ route('details', $car->slug) }}">
                        <h1>{{ $car->name }}</h1>
                    </a>
                </span>
                <img src="{{ asset($car->image) }}" style="width:100%; height:100%;">
            </div>
        </div>
        @endforeach
    </div>

    <div class="row" id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58419.66942567678!2d90.3391568!3d23.7748463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79eb9eadc09%3A0x2cb30660b4a4d4a4!2sMotor%20Corporation!5e0!3m2!1sen!2sbd!4v1643092595353!5m2!1sen!2sbd"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="row bg-color" id="map">
        <div class="col-md-6 right-div margin-y">
            <h3 class="text">Youtube</h3>
            <div class="margin-x">
                <iframe width="560" height="315" src="{{ get_static_option('single_youtube_video') }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6 left-div  center-sm">
            <h3 class="text">Instagram</h3>
            @foreach ($instagrams as $instagram)
            <div class="col-md-3 instagram product-item " style="text-align: center;">
                <a href="{{ $instagram->url }}" target="_blank">
                    <img src="{{ asset($instagram->image) }}">
                </a>

            </div>
            @endforeach
        </div>
    </div>

    {{-- Video --}}
    <div class="latest-blog wow bounceInUp animated animated">
        <!--exclude For version 6 -->
        <div class="blog-home-inner">
            <div class="blog-title">
                <h2>Videos</h2>
            </div>
            <!--For version 1,2,3,4,5,6,8 -->
            <div class="row">
                @foreach ($videos as $video)
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img">
                            <a href="javascript:vaoid(0)">
                                <iframe width="400" height="250" src="{{ $video->url }}" title="{{ $video->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <h3><a href="{{ $video->url }}" target="_blank">{{ $video->title }}</a></h3>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                @endforeach
            </div>
        </div>
        <!--container-->
    </div>

    {{-- Blogs --}}
    <div class="latest-blog wow bounceInUp animated animated">
        <!--exclude For version 6 -->
        <div class="blog-home-inner">
            <div class="blog-title">
                <h2>Blogs</h2>
            </div>
            <!--For version 1,2,3,4,5,6,8 -->
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post">
                    <div class="blog_inner">
                        <div class="blog-img">
                            <a href="{{ route('blogDetails', $blog->slug) }}">
                                <img src="{{ asset($blog->image) }}" alt="">
                            </a>
                        </div>
                        <!--blog-img-->
                        <div class="blog-info">
                            <h3>{{ $blog->title }}</a></h3>
                        </div>
                    </div>
                    <!--blog_inner-->
                </div>
                @endforeach
            </div>
        </div>
        <!--container-->
    </div>

    <style>
        .bg-color {
            background-color: #DBF3F2;
            height: 100%;
            width: 100%;
            color: black;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .instagram {
            width: 50%;
            height: 50%;
            margin-bottom: 20px;
        }

        .video {
            margin: 30px;
        }

        .text {
            color: rgb(82, 75, 75);
            margin-left: 20px;
        }

        .margin-y {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .margin-x {
            margin-left: 50px;
            margin-right: 50px;
        }

        @media(max-width: 992px) {
            .center-sm {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        }
    </style>
</div>
