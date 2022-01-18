<div class="row m-1">
    <div class="col-12">
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between">
                <div>
                    {{-- <h4 class="card-title">{{ __('Products') }}</h4> --}}
                    <select name="" id="" class="form-select select2" wire:model="searched_car_category">
                        <option value="all">{{ __('All Category') }}</option>
                        @foreach ($carCategories as $carCategory)
                        <option value="{{ $carCategory->id }}">{{ $carCategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Search" wire:model="searched_car">
                </div>
            </div>
            <div class="card-body product-card">
                <div class="row">
                    @foreach ($cars as $car)
                    <div class="col-3">
                        <div class="card m-1 hoverable" wire:click="addToCard({{ $car->id }})">
                            <img class="card-img-top rounded mx-auto d-block" height="90px;"
                                style="margin-bottom: -10px;"
                                src="{{ asset($car->image ?? 'assets/images/no_food.png') }}">
                            <div class="card-body text-center">
                                <p class="card-text" style="margin-bottom: -5px;">{{ $car->name }}</p>
                                <span class="badge bg-primary">{{ $car->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-danger text-white d-flex justify-content-between">
                <div>

                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            </div>
            <div class="card-body product-card">
                @if($selected_car != null)
                <div class="row" style="font-size: 8px;">
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Car category</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->category->name ?? '#' }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Name</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->name }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Brand</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->brand }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Model</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->model }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Registration</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->registration }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-append" style="width:30%;">
                                <span class="input-group-text">Mileages</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->mileages }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group bg-warning">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Pur. price</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->purchase_price }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Exp. Price</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly
                                value="{{ $selected_car->selling_price }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">VAT {{ $selected_car->vat_percentage }}%</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" wire:model="vat_percentage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Discount {{ $selected_car->discount_percentage }}%</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" wire:model="discount_percentage">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Selling Price</span>
                            </div>
                            <input type="number" step="any" class="form-control form-control-sm"
                                wire:model="selling_price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Have to pay</span>
                            </div>
                            <input type="text" class="form-control form-control-sm" readonly wire:model="have_to_pay">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Paid</span>
                            </div>
                            <input type="number" step="any" class="form-control form-control-sm"
                                wire:model="paid_amount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Customer <a href="#add_customer_section"> <i
                                            class="btn text-danger fa fa-plus-square"></i></a></span>
                            </div>
                            <div class="form-group form-control form-control-sm">
                                <select class="form-control" id="customer" wire:model="selected_customer">
                                    <option select value="">Chose customer</option>
                                    @foreach ($customers as $customer)
                                    <option value={{ $customer->id }}>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-append" style="width:50%;">
                                <span class="input-group-text">Payment Method</span>
                            </div>
                            <div class="form-group form-control form-control-sm">
                                <select class="form-control" id="payment_method" wire:model="payment_method">
                                    <option select value="">Chose payment method</option>
                                    @foreach ($paymentmethods as $paymentmethod)
                                    <option value={{ $paymentmethod->id }}>{{ $paymentmethod->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12  text-center" style="font-size: 16px;">
                        <div class="row m-2">
                            <div class="col-md-6">
                                <div class="input-group input-group-append">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="advance_for_booking"
                                            id="booking" value="1" wire:model="advance_for_booking">
                                        <label class="form-check-label" for="booking">
                                            Advance for booking
                                        </label>
                                    </div>
                                    &nbsp;
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="advance_for_booking"
                                            id="sold" value="0" wire:model="advance_for_booking">
                                        <label class="form-check-label" for="sold">
                                            Make as sold
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-sm btn-block" style="width: 100%;"
                                    wire:click="save">Save Invoice</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-7 mt-5 mb-5" id="add_customer_section">
        <div class="card">
            <div class="card-header">
                Add new Customer
            </div>
            <div class="card-body">
                <div>
                    @if (session()->has('customer_create_message'))
                    <div class="alert alert-success">
                        {{ session('customer_create_message') }}
                    </div>
                    @endif
                </div>
                <form wire:submit.prevent="saveCustomer">
                    <div class="form-group">
                        <label for="full_name">Full name</label>
                        <input type="text" class="form-control" id="full_name" wire:model="full_name"
                            placeholder="Mr. Example">
                        @error('full_name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email_address">Email address</label>
                        <input type="email" class="form-control" id="email_address" wire:model="email_address"
                            placeholder="name@example.com">
                        @error('email_address')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" wire:model="phone_number"
                            placeholder="+880 123 ....">
                        @error('phone_number')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" wire:model="address"
                            placeholder="Example, Address">
                        @error('address')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label for="image">Image</label> --}}
                        {{-- <input type="file" class="form-control" id="image" wire:model="image"> --}}
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-5 mt-5 mb-5">
        <div class="card text-center">
            <div class="card-header">
                Authentication Info
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ auth()->user()->name }}</h5>
                <p class="card-text">{{ auth()->user()->email }}</p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
    @if ($invoice_url)
    <div wire:ignore.self class="modal fade" id="inv_modal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">{{ __('Invoice') }}</h5>
                </div>
                <div class="modal-body">
                    <iframe src="{{ $invoice_url }}" frameborder="0" width="100%;" height="600px;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function openModal() {
                var myModal = new bootstrap.Modal(document.getElementById('inv_modal'));
                myModal.show();
            }
            openModal();
    </script>
    @endif

</div>