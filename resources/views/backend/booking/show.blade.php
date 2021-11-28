@extends('layouts.backend.app')

@section('title') Booking Details | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Booking Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Booking</li>
                </ol>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- column -->
        <div class="col-lg-8">
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
                                    <td>{{ $booking->name }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td><span
                                            class="label label-success">{{ $booking->email ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><span
                                            class="label label-warning">{{ $booking->phone ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><span
                                            class="label label-danger">{{ $booking->status ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Created at</td>
                                    <td>{{$booking->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Booking Purpose</td>
                                    <td>{{$booking->bookingPurpose->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-4">
            <div class="">
                
                <div class="card-body">
                    <div class="row">
                        <!-- Column -->
                      
                    </div>
                    <hr>
                   <div class="row">
                    <div class="col-lg-12 col-md-12">
                        
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
