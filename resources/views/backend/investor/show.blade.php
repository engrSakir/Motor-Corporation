@extends('layouts.backend.app')

@section('title') Investor Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Investor Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Investor</li>
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
                                    <td>{{ $investor->name }}</td>
                                </tr>
                                <tr>
                                    <td>Deshmukh</td>
                                    <td><span class="label label-danger">admin</span> </td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span
                                            class="label label-success">{{ $investor->creator->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span
                                            class="label label-warning">{{ $investor->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span
                                            class="label label-danger">{{ $investor->destroyer->name ?? 'Not Found' }}</span>
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
                                    <h1 class="font-light text-white">2,064</h1>
                                    <h6 class="text-white">Sessions</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">1,738</h1>
                                    <h6 class="text-white">Users</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white">5963</h1>
                                    <h6 class="text-white">Page Views</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-dark text-center">
                                    <h1 class="font-light text-white">2.9s</h1>
                                    <h6 class="text-white">Pages/Session</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-megna text-center">
                                    <h1 class="font-light text-white">1.5s</h1>
                                    <h6 class="text-white">Avg. Session</h6>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-md-6 col-lg-4 col-xlg-2">
                            <div class="card">
                                <div class="box bg-warning text-center">
                                    <h1 class="font-light text-white">10%</h1>
                                    <h6 class="text-white">Bounce Rate</h6>
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
                                        <h3>86%</h3>
                                        <h6 class="card-subtitle">Total Product</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0"
                                                aria-valuemax="100"></div>
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
<hr class="bg-success">
    <div class="row">
        @foreach ($investor->contactpersons as $contactPerson)
            <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="card card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-lg-3 text-center">
                            <a href="app-contact-detail.html"><img src="{{ asset('assets/images/avatar.png') }}" width="90" alt=""class="img-circle img-fluid"></a>
                        </div>
                        <div class="col-md-8 col-lg-9">
                            <h3 class="box-title m-b-0">{{ $contactPerson->name }}</h3> <small>{{ $contactPerson->email }}</small>
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
