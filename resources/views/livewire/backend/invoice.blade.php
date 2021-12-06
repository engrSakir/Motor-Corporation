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
                                        <a href="{{ route('backend.invoice.show', $invoice) }}" target="_blank"
                                            class="btn btn-primary waves-effect btn-rounded waves-light"> <i
                                                class="fas fa-print"></i> </a>
                                        {{-- <a target="_blank" href="{{ route('backend.invoice.edit', $invoice) }}"
                                            class="btn btn-secondary waves-effect btn-rounded waves-light"> <i
                                                class="fas fa-pen"></i> </a> --}}
                                        <button value="{{ route('backend.invoice.destroy', $invoice) }}"
                                            class="btn btn-danger btn-circle delete-btn"><i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                    <td>
                                        {{ $invoice->car->status }}
                                        @if($invoice->car->status == 'Booking') <button type="button" class="btn btn-danger text-white btn-sm" wire:click="makeSold({{ $invoice->car->id }})">Make Sold</button> @endif
                                    </td>
                                    <td scope="row">{{ $invoice->id }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->customer->phone }}</td>
                                    <td>{{ $invoice->car->name ?? '#' }}</td>
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