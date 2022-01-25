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
                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
                    wire:model="category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}*{{ $category->id }}</option>
                    @endforeach
                </select>

                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
                    wire:model="brand">
                    <option value="">Select Car Brand</option>
                    @foreach ($brands as $brand)
                    <option>{{ $brand }}</option>
                    @endforeach
                </select>

                <select class="col-md-4" style="margin-bottom: 10px; color:white; font-size:20px; font-weight: bold;"
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

    <div class="row" id="collection" style="margin: 10px;">
        @foreach ($cars as $car)
        <div class="col-md-3" style="margin-top: 20px;">
            <div class="product-item" style="text-align: center;">
                <span class="text">
                    <a href="{{ route('details', $car->slug) }}">
                        <h1>{{ $car->name }}</h1>
                    </a>
                </span>
                <img src="{{ asset($car->image) }}">
            </div>
        </div>
        @endforeach
    </div>

    <div class="row" id="map" style="margin: 10px;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d58419.66942567678!2d90.3391568!3d23.7748463!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79eb9eadc09%3A0x2cb30660b4a4d4a4!2sMotor%20Corporation!5e0!3m2!1sen!2sbd!4v1643092595353!5m2!1sen!2sbd"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <div class="row bg-color" id="map" style="margin: 10px;">
        <div class="col-md-6 right-div margin-y">
            <h3 class="text">Youtube</h3>
            <div class="margin-x">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Yiz-K_BIO44"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-6 left-div  center-sm">
            <h3 class="text">Instagram</h3>
            @foreach ($instagrams as $instagram)
            <div class="col-md-3 instagram product-item " style="text-align: center;">
                <img src="{{ asset($instagram->image) }}">
            </div>
            @endforeach
        </div>
    </div>

    <div class="container bg-white text-dark" style="width:100% ; height:100%; margin-bottom:20px;">
        <div class="row video">
            <h1 class="text-center margin-y">Videos</h1>
            @foreach($videos as $video)
            <div class="col-md-3 text-center mb-3">
                <iframe width="560" height="315" src="{{ $video->url }}" title="{{ $video->title }}" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            @endforeach
        </div>
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