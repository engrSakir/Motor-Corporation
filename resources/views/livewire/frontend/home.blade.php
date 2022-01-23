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

    <div class="row" style="margin: 10px;">
        @foreach ($cars as $car)
        <div class="col-md-3">
            <div class="product-item" style="text-align: center;">
                <span class="text">
                    <a href="{{ route('details', $car->slug) }}">
                        <h1>{{ $car->name }}</h1>
                    </a>
                </span>
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/19/Thunderstorm_in_sydney_2000x1500.png">
            </div>
        </div>
        @endforeach
    </div>
</div>