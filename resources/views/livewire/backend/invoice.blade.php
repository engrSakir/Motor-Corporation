<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Invoice Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Invoice Page</li>
                </ol>
                <a href="{{ route('backend.pos') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-{{ session('message_type') }}" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   
                    <div class="table-responsive">
                        <table class="table color-bordered-table primary-bordered-table">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Status</th>
                                    <th>INV</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Car</th>
                                    <th>Total Price</th>
                                    <th>Paid</th>
                                    <th>Due</th>
                                    <th>Sale Time</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                <tr>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=booking']) }}" target="_blank">Booking</a>
                                        <a class="btn btn-success btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=invoice']) }}" target="_blank">Invoice</a>
                                        <a class="btn btn-warning btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=delivery-challan']) }}" target="_blank">Challan</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('backend.pdf', [$invoice, 'type=payments']) }}" target="_blank">Payments</a>
                                        <button wire:click="delete({{ $invoice->id }})"
                                            class="btn btn-danger btn-circle"><i class="fa fa-trash text-white"></i>
                                        </button>
                                    </td>
                                    <td>
                                        {{ $invoice->car->status ?? '-' }}
                                        @if($invoice->car)
                                            @if($invoice->car->status == 'Booking') <button type="button" class="btn btn-danger text-white btn-sm" wire:click="makeSold({{ $invoice->car->id }})">Make Sold</button> @endif
                                        @endif
                                    </td>
                                    <td scope="row">{{ $invoice->id }}</td>
                                    <td>{{ $invoice->customer->name ?? '-' }}</td>
                                    <td>{{ $invoice->customer->phone ?? '-' }}</td>
                                    <td>{{ $invoice->car->name ?? '-' }}</td>
                                    <td>{{ $invoice->totalPrice() }} BDT</td>
                                    <td>{{ $invoice->payments->sum('amount') }} BDT</td>
                                    <td>
                                        {{ $invoice->due() }} BDT 
                                        @if($invoice->due() > 0) 
                                        <select wire:model="payment_method.{{  $invoice->id }}">
                                            <option value="">Payment method</option>
                                            @foreach ($payment_methods as $payment_method_s)
                                            <option value="{{ $payment_method_s->id }}">{{ $payment_method_s->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="number" class="form-control" style="width: 80px;" wire:keydown.enter="addPayment({{  $invoice->id }})"  wire:model="payment_amount.{{  $invoice->id }}">
                                        @endif
                                    </td>
                                    <td>{{ $invoice->created_at->format('d/m/Y h:i A') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('head')

    @endpush

    @push('foot')

    @endpush

</div>