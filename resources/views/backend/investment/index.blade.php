@extends('layouts.backend.app')
@section('title') Investment | @endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Blank Page</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <a href="{{ route('backend.investment.create') }}" class="btn btn-dark d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <th scope="col">Investor Name</th>
                            <th scope="col">Invest</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Settlement %</th>
                            <th scope="col">Settlement date</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investments as $investment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $investment->investor->name ?? 'Not Found' }}</td>
                                <td>{{ $investment->amount }}</td>
                                <td>{{ $investment->interest }} % = {{ $investment->interestAmount() }}</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10" title="{{ ($investment->settlements->sum('amount') / $investment->investWithInterest()) * 100 }}%">
                                        <div class="progress-bar bg-success" style="width: {{ ($investment->settlements->sum('amount') / $investment->investWithInterest()) * 100 }}%; height:8px;"></div>
                                    </div>
                                </td>
                                <td>{{ date('d/m/Y', strtotime($investment->settlement_date)) }}</td>
                                <td>{{ $investment->created_at->format('d/m/Y') }}</td>
                                <td>
                                <a  class="btn btn-success btn-circle" href="{{ route('backend.investment.show', $investment) }}">
                                    <i class="fa fa-eye" ></i>
                                </a>
                                <a  class="btn btn-warning btn-circle" href="{{ route('backend.investment.edit', $investment) }}">
                                    <i class="fa fa-pen" ></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle delete-btn text-white" value="{{ route('backend.investment.destroy', $investment) }}">
                                    <i class="fa fa-trash" ></i>
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
