@extends('layouts.backend.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Dashboard</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard/li>
            </ol>
            <a href="{{ url('/') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Website </a>
        </div>
    </div>
</div>
<div class="row">
    <!-- Column -->
    @foreach ($investors as $investor)
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>{{ $investor->investmentPercentage() }}%</h3>
                        <h6 class="card-subtitle">{{ $investor->name }}</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $investor->investmentPercentage() }}%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">{{ $total_expense_of_this_month }}</h1>
                <h6 class="text-white">Expense of this month</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">{{ $total_expense_of_previous_month }}</h1>
                <h6 class="text-white">Expense of previous month</h6>
            </div>
        </div>
    </div>
</div>
@endsection
