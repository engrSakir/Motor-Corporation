@extends('layouts.backend.app')
@section('title') Vendor  | @endsection
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
            <a href="{{ route('backend.vendorInfo.create') }}" class="btn btn-dark d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</a>
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
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendorInfos as $vendorInfo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img width="40" class="img-circle" src="{{ asset($vendorInfo->image ?? 'assets/images/avatar.png') }}" alt=""></td>
                                <td>{{ $vendorInfo->name }}</td>
                                <td>{{ $vendorInfo->phone }}</td>
                                <td>{{ $vendorInfo->email }}</td>
                                <td>{{ $vendorInfo->address }}</td>
                                <td>
                                <a  class="btn btn-success btn-circle" href="{{ route('backend.vendorInfo.show', $vendorInfo) }}">
                                    <i class="fa fa-eye" ></i>
                                </a>
                                <a  class="btn btn-warning btn-circle" href="{{ route('backend.vendorInfo.edit', $vendorInfo) }}">
                                    <i class="fa fa-pen" ></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-circle delete-btn text-white" value="{{ route('backend.vendorInfo.destroy', $vendorInfo) }}">
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
