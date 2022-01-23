@extends('layouts.backend.app')
@section('title') Car | @endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Car Page</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Car Page</li>
            </ol>
            <a href="{{ route('backend.car.create') }}" class="btn btn-dark d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Purchase</a>
            <a href="{{ route('backend.purchaseOrder.index') }}" class="btn btn-dark d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Purchase Order</a>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table color-bordered-table primary-bordered-table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Purchase Price</th>
                            <th scope="col">Purchase Paid</th>
                            <th scope="col">Purchase Due</th>
                            <th scope="col">Sell Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{ $car->name }}
                                @if ($car->papers_up_to_date)
                                <span class="badge bg-primary" title="Papers up to date">P</span>
                                @endif
                                @if ($car->name_transfer_documents)
                                <span class="badge bg-success" title="Name transfer">T</span>
                                @endif
                            </td>
                            <td>{{ $car->purchase_price }}</td>
                            <td>{{ $car->purchasePayments()->sum('amount') }}</td>
                            <td>{{ $car->purchase_price - $car->purchasePayments()->sum('amount') }}</td>
                            <td>{{ $car->selling_price }}</td>
                            <td>{{ $car->status }}</td>
                            <td>
                                <a href="{{ route('backend.carExpense.create', 'car='.$car->id) }}"
                                    class="btn btn-info btn-circle"><i class="fa fa-cog"></i> </a>

                                <a class="btn btn-success btn-circle"
                                    href="{{ route('backend.purchasePayment', $car) }}">
                                    <i class="fa fa-credit-card"></i>
                                </a>
                                {{-- <a class="btn btn-success btn-circle" href="{{ route('backend.car.show', $car) }}">
                                    <i class="fa fa-eye"></i>
                                </a> --}}
                                <a class="btn btn-warning btn-circle" href="{{ route('backend.car.edit', $car) }}">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="{{ route('backend.car.details' , $car) }}" class="btn btn-success btn-circle">
                                    <i class="fa fa-eye text-white"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle delete-btn text-white"
                                    value="{{ route('backend.car.destroy', $car) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush