@extends('layouts.backend.app')

@section('title') Car Payments | @endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Car Payments</h4>
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
                                <td><span class="label label-success">{{ $car->creator->name ?? 'Not Found' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Editor</td>
                                <td><span class="label label-warning">{{ $car->editor->name ?? 'Not Found' }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Destroyer</td>
                                <td><span class="label label-danger">{{ $car->destroyer->name ?? 'Not Found' }}</span>
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
                                <h1 class="font-light text-white">00</h1>
                                <h6 class="text-white">Name</h6>
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
                                                style="width:{{ round($car->percentageOfPurchasePayment(), 2) }}%; height: 6px;"
                                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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