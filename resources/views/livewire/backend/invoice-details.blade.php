<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Invoice Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Invoice Details</li>
                </ol>
                <a href="{{ route('backend.pos') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Invoice No: #{{ $invoice->id }}</h3>
                </div>
                <div class="card-body">
                    <h4>
                        {{-- Customer Info --}}
                        <b class="text-danger">Customer Information</b><br>
                        <b>Customer name:</b> {{ $invoice->customer->name ?? 'Not Found'}} <br>
                        <b>Customer email:</b> {{ $invoice->customer->email ?? 'Not Found'}} <br>
                        <b>Customer phone:</b> {{ $invoice->customer->phone ?? 'Not Found'}} <br>
                        <b>Customer address:</b> {{ $invoice->customer->address ?? 'Not Found'}} <br>
                        <hr class="bg-primary">
                        {{-- Car Info --}}
                        <b class="text-danger">Car Information</b><br>
                        <b>Car Cateogry:</b> {{ $invoice->car->category->name ?? 'Not Found'}} <br>
                        <b>Car Vendor:</b> {{ $invoice->car->vendor->name ?? 'Not Found'}} <br>
                        <b>Car Papers Up-to-Date:</b> {{ $invoice->car->papers_up_to_date ? 'Yes' : 'No'}} <br>
                        <b>Car Name Transfer Documents:</b> {{ $invoice->car->name_transfer_documents ? 'yes' : 'No'}}
                        <br>
                        <b>Car Name:</b> {{ $invoice->car->name ?? 'Not Found'}} <br>
                        <b>Car Brand:</b> {{ $invoice->car->brand ?? 'Not Found'}} <br>
                        <b>Car Purchase Price:</b> {{ $invoice->car->purchase_price ?? 'Not Found'}} <br>
                        <b>Car Expected Price:</b> {{ $invoice->car->selling_price ?? 'Not Found'}} <br>
                        <b>Car Vat Percentage:</b> {{ $invoice->car->vat_percentage ?? 'Not Found'}} <br>
                        <b>Car Discount Percentage:</b> {{ $invoice->car->discount_percentage ?? 'Not Found'}} <br>
                        <b>Car Registration:</b> {{ $invoice->car->registration ?? 'Not Found'}} <br>
                        <b>Car Mileages:</b> {{ $invoice->car->mileages ?? 'Not Found'}} <br>
                        <b>Car Chassis Number:</b> {{ $invoice->car->chassis_number ?? 'Not Found'}} <br>
                        <b>Car Car Number:</b> {{ $invoice->car->car_number ?? 'Not Found'}} <br>
                        <b>Car Description:</b> {!! $invoice->car->description ?? 'Not Found' !!} <br>
                        <hr class="bg-primary">
                        {{-- Invoice Info --}}
                        <b class="text-danger">Invoice Information</b><br>
                        <b>Car delivery Challan Date:</b> {{ date("d-m-Y", strtotime($invoice->delivery_challan_date))
                        ??'Not Found' }}<br>
                        <b>Price:</b> {!! $invoice->price ?? 'Not Found' !!} <br>
                        <b>Vat Percentage:</b> {!! $invoice->vat_percentage ?? 'Not Found' !!} <br>
                        <b>Discount Percentage:</b> {!! $invoice->discount_percentage ?? 'Not Found' !!} <br>
                        <b>Note:</b> {!! $invoice->note ?? 'Not Found' !!} <br>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card ">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Action</h3>
                </div>
                <div class="card-body text-center">
                    <a class="btn btn-primary btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=booking']) }}"
                        target="_blank">Booking</a>
                    <a class="btn btn-success btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=invoice']) }}"
                        target="_blank">Invoice</a>
                    <a class="btn btn-warning btn-sm"
                        href="{{ route('backend.pdf', [$invoice, 'type=delivery-challan']) }}"
                        target="_blank">Challan</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=payments']) }}"
                        target="_blank">Payments</a>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Edit Information</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="edit" class="form-horizontal form-material"
                        enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Name<b class="text-danger">*</b> </label>
                                            <select class="select2 form-select form-control" required>
                                                <option selected disabled value="">Chose Option ..</option>
                                            </select>
                                            </select>
                                            @error('')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Deliver Challan Date ({{ date("d-m-Y",
                                                strtotime($invoice->delivery_challan_date)) }})
                                                <b class="text-danger">*</b>
                                            </label>
                                            <input wire:model="delivery_challan_date" type="date" class="form-control"
                                                placeholder="Deliver Challan Date" required>
                                            @error('delivery_challan_date')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success text-white"> <i
                                            class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    @push('head')

    @endpush

    @push('foot')

    @endpush

</div>