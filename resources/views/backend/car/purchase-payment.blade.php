@extends('layouts.backend.app')

@section('title') Car Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Car Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Car</li>
                </ol>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $car->name }}</td>
                                </tr>
                                <tr>
                                    <td>Created at</td>
                                    <td>{{$car->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span
                                            class="label label-success">{{ $car->creator->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span
                                            class="label label-warning">{{ $car->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span
                                            class="label label-danger">{{ $car->destroyer->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Summary</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Column -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">{{ $car->purchasePayments->sum('amount') }}</h1>
                                    <h6 class="text-white">Paid</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card">
                                <div class="box bg-danger text-center">
                                    <h1 class="font-light text-white">{{ $car->purchase_price - $car->purchasePayments->sum('amount') }}</h1>
                                    <h6 class="text-white">Due</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                   <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>{{ round($car->percentageOfPurchasePayment(), 2) }}%</h3>
                                        <h6 class="card-subtitle">Percentage of purchase payment</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width:{{ round($car->percentageOfPurchasePayment(), 2) }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        @if($car->purchase_price - $car->purchasePayments->sum('amount') > 0)
                        <form action="{{ route('backend.purchasePayment.store') }}" method="POST"
                            class="" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="car" value="{{ $car->id }}">
                            <div class="input-group" style="background-color: white;">
                                <span class="input-group-text"></span>
                                    <select name="investment" class="form-control select2" id="investment" required>
                                        <option selected disabled value="">Chose investment</option>
                                            @foreach ($investors as $investor)
                                            <optgroup label="{{ $investor->name }}">
                                                @foreach ($investor->investments as $investment)
                                                @if($investment->totalUsableAmount() > 0)
                                                <option value="{{ $investment->id }}" @if(old('investment') == $investment->id) selected @endif>ID: {{ $investment->id }} Balance: {{ $investment->totalUsableAmount() }} of {{ $investment->amount }}</option>
                                                @endif
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                    </select>
                                <input type="number" step="any" step="any" class="form-control" name="payment_amount" value="{{ old('payment_amount') }}" placeholder="Payment amount" required>
                                <button class="btn btn-info text-white" type="submit">Make Payment!</button>
                            </div>
                            @error('investment')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            @error('payment_amount')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </form>
                        @else
                        <div class="alert alert-success" role="alert">
                            <h3><b>Playment Clear</b></h3>
                        </div>
                        @endif
                    </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Purchase Payment Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Investor</th>
                                    <th>Investment ID</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                @foreach ($car->purchasePayments as $purchasePayment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $purchasePayment->investment->investor->name ?? 'No Name' }}</td>
                                    <td>{{ $purchasePayment->investment->id ?? 'No Investment' }}</td>
                                    <td>{{ $purchasePayment->amount }}</td>
                                    <td>{{ $purchasePayment->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
