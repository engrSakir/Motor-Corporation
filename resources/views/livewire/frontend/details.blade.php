<div>
    <!-- Back to top button -->
    <div class="content">
        {{-- Main custom image banner --}}
        @if($car->image_of_cover)
        <img src="{{ asset($car->image_of_cover) }}" alt="" class="cover_video">
        @endif
        {{--end Main ustom image banner --}}
    </div>

    <a id="button"><i class="fas fa-angle-up fa-2x"></i></a>
    <div class="container-fluid">
        <section class="tm-mb-1" id="about">
            <div class="tm-row tm-about-row">
                <div class="tm-section-1-l">
                    @if($car->image_of_specification)
                    <img src="{{ asset($car->image_of_specification) }}" alt="About image" class="tm-img-responsive">
                    @endif
                </div>
                <article class="tm-section-1-r tm-bg-color-8">
                    <h2 class="tm-mb-2 tm-title-color">
                        <tr>
                            <td><strong>Car Name: </strong> </td>
                            <td>{{ $car->name ?? 'Not Found'}}</td>
                        </tr>
                    </h2>
                    <p>
                        <tr>
                            <td><strong>Car Brand: </strong> </td>
                            <td>{{ $car->brand ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Cateogry: </strong></td>
                            <td>{{ $car->category->name ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Papers Up-to-Date: </strong></td>
                            <td>{{ $car->papers_up_to_date ? 'Yes' : 'No'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Name Transfer Documents: </strong></td>
                            <td>{{ $car->name_transfer_documents ? 'yes' : 'No'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Vat Percentage: </strong></td>
                            <td>{{ $car->vat_percentage ?? 'Not Found'}}%</td>
                        </tr>
                    </p>

                    <p>
                        <tr>
                            <td><strong>Car Discount Percentage: </strong></td>
                            <td>{{ $car->discount_percentage ?? 'Not Found'}}%</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Registration: </strong></td>
                            <td>{{ $car->registration ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Mileages: </strong></td>
                            <td>{{ $car->mileages ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Chassis Number: </strong></td>
                            <td>{{ $car->chassis_number ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Car Number: </strong></td>
                            <td>{{ $car->car_number ?? 'Not Found'}} </td>
                        </tr>
                    </p>
                    <p>
                        <tr>
                            <td><strong>Status: </strong></td>
                            <td>{{ $car->placement ?? 'Not Found'}}</td>
                        </tr>
                    </p>
                </article>
            </div>
        </section>
    </div>
    <div class="container-fluid">
        <section class="text-white bg-gray tm-mb-1 tm-row tm-services-row ">
            <div class="tm-section-2-l">
                <article class="tm-box-pad tm-mb-1">
                    <h2 class="tm-mb-2">Car Description</h2>
                    <p class="tm-mb-1">{{ $car->description }}</p>
                </article>
            </div>
            <div class="tm-section-2-r">
                <img src="{{ asset($car->image_of_description) }}" alt="Services image" class="tm-img-responsive1">
            </div>
        </section>

        <div class="container  bg-white text-dark" style="width:100% ; height:100%">
            <div class="row gallery">
                <h1 class="text-center tm-mb-1">Gallery</h1>
                @foreach($car->carImages as $carImage)
                @if($carImage->status)
                <div class="col-md-3 text-center mb-3 margin">
                    <img src="{{ asset($carImage->image) }}" alt="" style="width: 300px ; height: 300px">
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="main-container col1-layout" style="visibility: visible;">
            <div class="main">
                <h1>Contact Us</h1>
                @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
                @endif
                <div class="account-login container">
                    <form wire:submit.prevent="submit">
                        <fieldset class="col2-set">
                            <div class="col-1 new-users">
                                <div class="content">
                                    <ul class="form-list">
                                        <li>
                                            <label for="name" style="color: white">Name<em
                                                    class="required">*</em></label>
                                            <div class="input-box">
                                                <input style="color: red; background-color:white;" type="text" value=""
                                                    id="name" class="input-text required-entry" title="Full name"
                                                    wire:model="name">
                                            </div>
                                            @error('name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </li>
                                        <li>
                                            <label for="email" style="color: white">Email Address<em
                                                    class="required">*</em></label>
                                            <div class="input-box">
                                                <input style="color: red; background-color:white;" type="email" value=""
                                                    id="email" class="input-text required-entry validate-email"
                                                    title="Email Address" wire:model="email">
                                            </div>
                                            @error('email')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-2 registered-users">
                                <div class="content">
                                    <ul class="form-list">
                                        <li>
                                            <label for="phone" style="color: white">Phone number<em
                                                    class="required">*</em></label>
                                            <div class="input-box">
                                                <input style="color: red; background-color:white;" type="number"
                                                    class="input-text required-entry" id="pass" title="Phone"
                                                    wire:model="phone">
                                                @error('phone')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </li>
                                        <li>
                                            <label for="message" style="color: white">Message<em
                                                    class="required">*</em></label>
                                            <div class="input-box">
                                                <textarea style="color: red; background-color:white;"
                                                    class="w-full mt-1 form-control form-textarea" rows="4" cols="50"
                                                    id="pass" title="Short Message" wire:model="message"></textarea>
                                                @error('message')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </li>
                                    </ul>
                                    <p class="required">* Required Fields</p>
                                    <div class="buttons-set">
                                        <button type="submit" class="button login" title="Submit"><span>Send Us
                                                Message</span></button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .bg-white {
            background-color: white;
        }

        .bg-dark {
            background-color: black;
        }

        .bg-gray {
            background-color: #241F20;
        }

        .text-dark {
            color: black;
        }

        .gallery {
            height: 100%;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        button:focus {
            outline: none;
        }

        .tm-mb-0 {
            margin-bottom: 0;
        }

        .tm-mb-1 {
            margin-bottom: 20px;
        }

        .tm-mb-2 {
            margin-bottom: 40px;
        }

        .tm-mb-3 {
            margin-bottom: 60px;
        }

        .tm-mb-4 {
            margin-bottom: 30px;
        }

        .text-center {
            text-align: center;
        }

        .tm-img-responsive {
            max-width: 100%;
            height: auto;
            width: 100%;
            height: 100%;
            /* margin-left: 80px;
            margin-top: 30px; */
        }

        .margin {
            margin-bottom: 20px;

        }

        .tm-img-responsive1 {
            max-width: 100%;
            height: 80%;
            width: 80%;
            height: 100%;
            margin-left: 80px;
            margin-top: 30px;
        }

        .tm-section-1-l {
            width: 57.85%;
            margin-right: 1.65%;
            align-items: center;
        }

        .tm-section-1-r {
            padding: 50px 40px;
            width: 40.5%;
        }

        .tm-row {
            display: flex;
        }

        .tm-btn {
            display: inline-block;
            padding: 15px 40px;
            font-size: 1.1rem;
            border: none;
            background-color: #CC9999;
            color: white;
        }

        .tm-btn:hover {
            color: white;
            background-color: #875959;
        }

        .tm-section-2-l {
            width: 40.5%;
            margin-right: 1.65%;
        }

        .tm-section-2-r {
            width: 57.85%;
            margin-bottom: 50px;
        }

        .tm-box-pad {
            padding: 40px 50px;
        }

        #button {
            padding-top: 1px;
            display: inline-block;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            width: 40px;
            height: 40px;
            text-align: center;
            border-radius: 4px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            transition: background-color .3s,
                opacity .5s, visibility .5s;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        #button:hover {
            cursor: pointer;
            background-color: #333;
        }

        #button:active {
            background-color: #555;
        }

        #button.show {
            opacity: 1;
            visibility: visible;
        }

        @media (max-width: 992px) {

            .tm-section-1-l,
            .tm-section-1-r,
            .tm-section-2-l,
            .tm-section-2-r {
                width: 100%;
            }

            .tm-section-1-l {
                margin-bottom: 20px;
                margin-right: 0;
                text-align: center;
                align-items: center;
                width: 100%;
            }

            .tm-section-2-l {
                margin-bottom: 20px;
                margin-right: 0;
                text-align: center;
                align-items: center;
                width: 100%;
            }

            .tm-section-1-r {
                width: 100%;
                align-items: center;
            }

            .tm-about-row,
            .tm-services-row {
                flex-direction: column;
            }
        }
    </style>
</div>