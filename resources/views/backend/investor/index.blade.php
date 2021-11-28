@extends('layouts.backend.app')
@section('title') Investor | @endsection
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Investor</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Investor</li>
            </ol>

            <a href="{{ route('backend.investor.create') }}" class="btn btn-dark d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <th scope="col">Settlement</th>
                            <th scope="col">Initioal Deposit</th>
                            <th scope="col">Current Amount</th>
                            <th scope="col">Opening Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investors as $investor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $investor->name }}</td>
                                <td>
                                    <div class="progress progress-xs margin-vertical-10" title="{{  round($investor->percentageOfSettlement(), 2) }}%">
                                    <div class="progress-bar bg-success" style="width: {{  round($investor->percentageOfSettlement(), 2) }}%; height:8px;"></div>
                                    </div>
                                </td>
                                <td>{{ $investor->initial_deposit }}</td>
                                <td>{{ $investor->current_amount }}</td>
                                <td>{{ date('d/m/Y', strtotime($investor->opening_date)) }}</td>
                                <td>
                                <a  class="btn btn-success btn-circle" href="{{ route('backend.investor.show', $investor) }}">
                                    <i class="fa fa-eye" ></i>
                                </a>
                                <a  class="btn btn-warning btn-circle" href="{{ route('backend.investor.edit', $investor) }}">
                                    <i class="fa fa-pen" ></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle delete-btn text-white" value="{{ route('backend.investor.destroy', $investor) }}">
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
