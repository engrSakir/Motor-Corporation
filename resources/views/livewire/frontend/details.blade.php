<div>
    <div class="content">
        {{-- Main custom image banner --}}
        <img src="{{ asset($car->image_of_cover) }}" alt="" class="cover_video">
        {{--end Main ustom image banner --}}
    </div>
    <div class="container bg-success text-success" style="width:100% ; height:100%">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset($car->image_of_specification) }}" alt="" class="cover_video" style="width: 100%">
            </div>
            <div class="col-md-6 mx-auto">
                <h3 style="display: flex; justify-content:center ; align-items:center">
                    AT A GLANCE <br>
                    Architect: Ar. Nahas Ahmed Khalil <br>
                    Land Area: 20 kathas <br>
                    Orientation of the Land: North - South <br>
                    Front Road: 25 feet <br>
                    Number of Floors: 13 <br>
                    Number of Apartments: 20 <br>
                    Size of Units: 3.950 sft (approx.) <br>
                    Number of Basements: 2 <br>
                    Number of Car Parking: 40 <br>
                </h3>
            </div>
        </div>
    </div>
    <div class="container" style="width:100% ; height:100%">
        <div class="row">

            <div class="col-md-6 mx-auto">
                <h1 style="display: flex; justify-content:left ; align-items:center">FEATURES & AMENITIES</h1>
                <hr>
                <h3>
                    AT A GLANCE <br>
                    Architect: Ar. Nahas Ahmed Khalil <br>
                    Land Area: 20 kathas <br>
                    Orientation of the Land: North - South <br>
                    Front Road: 25 feet <br>
                    Number of Floors: 13 <br>
                    Number of Apartments: 20 <br>
                    Size of Units: 3.950 sft (approx.) <br>
                    Number of Basements: 2 <br>
                    Number of Car Parking: 40 <br>
                </h3>
            </div>
            <div class="col-md-6">
                <div class="bg-dark">
                    <img src="{{ asset($car->image_of_description) }}" alt="" class="cover_video" style="width: 100%">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 bg-white" style="width:100% ; height:100%">
        <div class="row">
            @foreach($carImages as $carImage)
            <div class="col-md-4">
                <img src="{{ asset($carImage->image) }}" alt="" style="width: 300px ; height: 300px">
            </div>
            @endforeach


        </div>
    </div>
</div>