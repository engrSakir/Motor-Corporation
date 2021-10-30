@extends('layouts.backend.app')

@section('title') Settlement Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Settlement Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Settlement</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Investment Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Investor Name</td>
                                    <td>{{ $settlement->investment->investor->name }}</td>
                                </tr>
                                <tr>
                                    <td>Investment Created at</td>
                                    <td>{{ $settlement->investment->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Investment Settlement Date</td>
                                    <td>{{ date('d/m/Y', strtotime($settlement->investment->settlement_date)) }}</td>
                                </tr>
                                <tr>
                                    <td>Investment Amount</td>
                                    <td>{{ $settlement->investment->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Interest Amount</td>
                                    <td>{{ $settlement->investment->interest }} % = {{ $settlement->investment->interestAmount() }}</td>
                                </tr>
                                <tr>
                                    <td>Investment Total</td>
                                    <td>{{ $settlement->investment->investWithInterest() }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Settlement Information</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Settlement Amount</td>
                                    <td>{{ $settlement->amount }}</td>
                                </tr>
                                <tr>
                                    <td>Created at Date</td>
                                    <td>{{ $settlement->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Percentage</td>
                                    <td>
                                        <div class="progress progress-xs margin-vertical-10" title="{{ ($settlement->amount / $settlement->investment->investWithInterest()) * 100 }}%">
                                            <div class="progress-bar bg-success" style="width: {{ ($settlement->amount / $settlement->investment->investWithInterest()) * 100 }}%; height:8px;"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span
                                            class="label label-success">{{ $settlement->creator->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span
                                            class="label label-warning">{{ $settlement->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span
                                            class="label label-danger">{{ $settlement->destroyer->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
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
