@extends('layouts.backend.app')

@section('title') Contact Person Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contact Person Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Contact Person</li>
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
                                    <td>{{ $investorContactPerson->investor->name }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $investorContactPerson->name }}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>{{ $investorContactPerson->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $investorContactPerson->email }}</td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span
                                            class="label label-success">{{ $investorContactPerson->creator->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span
                                            class="label label-warning">{{ $investorContactPerson->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span
                                            class="label label-danger">{{ $investorContactPerson->destroyer->name ?? 'Not Found' }}</span>
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

                    </div>
                    <hr>
                   <div class="row">

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
