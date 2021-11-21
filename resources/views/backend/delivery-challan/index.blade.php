@extends('layouts.backend.app')

@section('title') Delivery Challan @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Delivery Challan Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Delivery Challan Page</li>
                </ol>
                <a href="{{ route('backend.invoice.create') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table color-bordered-table primary-bordered-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Car</th>
                                    <th>Price</th>
                                    <th>Vat</th>
                                    {{-- <th>Due</th> --}}
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->client_name }}</td>
                                        <td>{{ $invoice->client_email }}</td>
                                        <td>{{ $invoice->client_phone }}</td>
                                        <td>
                                        @foreach($invoice->items as $item)
                                        {{ $item->car->name ?? '#' }}
                                        {{-- {{ $item->car->selling_price ?? '#' }} --}}
                                        (QT-{{ $item->quantity ?? '#' }}) <br>
                                        @endforeach
                                        </td>
                                        <td>
                                            {{ $invoice->price() }}
                                        </td>
                                        <td>
                                            {{ $invoice->vat() }}
                                        </td>

                                        <td>{{ $invoice->created_at->format('d/m/Y h:i A') }}</td>
                                        <td>
                                            <a href="{{ route('backend.delivery-challan.show', $invoice) }}" target="_blank"
                                                class="btn btn-primary waves-effect btn-rounded waves-light"> <i
                                                    class="fas fa-print"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $invoices->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
