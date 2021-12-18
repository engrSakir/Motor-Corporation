<div class="content">
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2 style="color:white;">Booking </h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <div class="main-container col1-layout wow bounceInUp animated animated animated" style="visibility: visible;">
        <div class="main">
            <div class="account-login container">
                <!--page-title-->
                @if($booking_form_status == 'start')
                    <fieldset class="col2-set" style="text-align: center; height:3in;">
                        <button type="button" class="button" title="Next" wire:click="start" style="margin-top: 1in;"><span>Start</span></button>
                    </fieldset>
                @elseif($booking_form_status == 'customer_info')
                <form wire:submit.prevent="customerInformationSave">
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <strong>Name & Date</strong>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <label for="name" style="color: white">Name<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="text" name="name"
                                                value="" id="name" class="input-text required-entry" title="Full name"
                                                wire:model="name">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </li>
                                    <li>
                                        <label for="date" style="color: white">Date<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="date" name="date"
                                                class="input-text required-entry validate-password" id="date"
                                                title="date" wire:model="date">
                                            @error('date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <strong>Contact</strong>
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <label for="email" style="color: white">Email Address<em
                                                class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="text" name="email"
                                                value="" id="email" class="input-text required-entry validate-email"
                                                title="Email Address" wire:model="email">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </li>
                                    <li>
                                        <label for="phone" style="color: white">Phone number<em
                                                class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="text" name="phone"
                                                class="input-text required-entry" id="pass" title="Phone"
                                                wire:model="phone">
                                            @error('phone')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </li>
                                </ul>
                                <p class="required">* Required Fields</p>
                                <div class="buttons-set">
                                    <button type="submit" class="button login" title="Next"><span>Next</span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
                @elseif($booking_form_status == 'service_info')
                <form wire:submit.prevent="serviceInformationSave" enctype="multipart/form-data">
                    <div class="latest-blog wow bounceInUp animated animated container animated"
                        style="visibility: visible;">
                        <!--exclude For version 6 -->
                        <div class="blog-home-inner">
                            <div class="blog-title">
                                <h2>Chose your booking purpose</h2>
                            </div>
                            <div class="row">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @foreach ($bookingPurposes as $bookingPurpos)
                                <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4 blog-post"
                                    wire:click="selectBookingPurpose({{ $bookingPurpos->id }})" >
                                    <div class="blog_inner">
                                        <div class="blog-img">
                                            <a href="javascript:vaoid(0)">
                                                <img src="{{ asset($bookingPurpos->image ?? 'uploads/images/no_image.png') }}"
                                                    alt="" width="400" height="250">
                                            </a>
                                        </div>
                                        <!--blog-img-->
                                        <div class="blog-info">
                                            <h3><input type="radio" name="purpose" id="p-{{ $bookingPurpos->id }}">{{ $bookingPurpos->name }}</h3>
                                            <p>{{ $bookingPurpos->description }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="buttons-set col-12 text-center">
                            <button type="submit" class="button login" title="Next"><span>Submit</span></button>
                        </div>
                    </div>
                </form>
                @else
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Success</h1>
                        <h3>We will contact you soon</h3>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
