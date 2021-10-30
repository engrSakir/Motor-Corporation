@extends('layouts.backend.app')

@section('title') Investment Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Investment Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Investment</li>
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
                                    <td>Investor</td>
                                    <td>{{ $investment->investor->name }}</td>
                                </tr>
                                <tr>
                                    <td>Amount</td>
                                    <td>{{ $investment->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Interest</td>
                                    <td>{{ $investment->interest }} % = {{ $investment->interestAmount() }}</td>
                                </tr>
                                <tr>
                                    <td>Settlement Date</td>
                                    <td>{{ date('d/m/Y', strtotime($investment->settlement_date)) }}</td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span
                                            class="label label-success">{{ $investment->creator->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span
                                            class="label label-warning">{{ $investment->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span
                                            class="label label-danger">{{ $investment->destroyer->name ?? 'Not Found' }}</span>
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
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-info text-center">
                                    <h1 class="font-light text-white">{{ $investment->amount }}</h1>
                                    <h6 class="text-white">Investment</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">{{ $investment->interestAmount() }}</h1>
                                    <h6 class="text-white">Interest</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white">{{ $investment->investWithInterest() }}</h1>
                                    <h6 class="text-white">Total</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card">
                                <div class="box bg-megna text-center">
                                    <h1 class="font-light text-white">{{ $investment->settlements->sum('amount') }}</h1>
                                    <h6 class="text-white">Settlement</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-6 col-xlg-4">
                            <div class="card">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white">
                                        {{ $investment->investWithInterest() - $investment->settlements->sum('amount') }}
                                    </h1>
                                    <h6 class="text-white">UnSettlement</h6>
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
                                            <h3>{{ round(($investment->settlements->sum('amount') / $investment->investWithInterest()) * 100, 2) }}%
                                            </h3>
                                            <h6 class="card-subtitle">Settlement</h6>
                                        </div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: {{ ($investment->settlements->sum('amount') / $investment->investWithInterest()) * 100 }}%; height: 6px;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            @if($investment->investWithInterest() - $investment->settlements->sum('amount') > 0)
                            <form action="{{ route('backend.settlement.store') }}" method="POST"
                                class="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="investment" value="{{ $investment->id }}">
                                <div class="input-group">
                                    <span class="input-group-text">UnSettlement is &nbsp;
                                        <b>{{ $investment->investWithInterest() - $investment->settlements->sum('amount') }}</b></span>
                                    <input type="number" step="any" class="form-control" name="settlemen_amount" placeholder="Settlement amount" required>
                                    <button class="btn btn-info text-white" type="submit">Make Settlement!</button>
                                </div>
                                @error('settlemen_amount')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </form>
                            @else
                            <div class="alert alert-success" role="alert">
                                <h3><b>Settlement</b></h3>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="bg-success">
    <div class="row">
        @foreach ($investment->investor->contactpersons as $contactPerson)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-lg-3 text-center">
                            <a href="app-contact-detail.html"><img src="{{ asset('assets/images/avatar.png') }}"
                                    width="90" alt="" class="img-circle img-fluid"></a>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <h3 class="box-title m-b-0">{{ $contactPerson->name }}</h3>
                            <small>{{ $contactPerson->email }}</small>
                            <address>
                                <br>
                                <abbr title="Phone">Phone:</abbr> {{ $contactPerson->phone }}
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
