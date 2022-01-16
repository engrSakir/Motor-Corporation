@extends('layouts.backend.app')

@section('title') Vendor Create| @endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Vendor </h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Vendor </li>
            </ol>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Create Vendor </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.vendorInfo.store') }}" method="POST"
                    class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Vendor Name<b class="text-danger">*</b>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control"
                                            placeholder="Vendor Name" value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone<b class="text-danger">*</b> </label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                            placeholder="Phone" value="{{ old('phone') }}" required>
                                        @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" id="address" name="address" class="form-control"
                                            placeholder="Address" value="{{ old('address') }}">
                                        @error('address')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor_type">Vendor Type <b
                                                class="text-danger">*</b> </label>
                                        <select class="form-control" id="vendor_type" name="vendor_type" required>
                                            <option selected disabled value="">Choose Type</option>
                                            <option value="car_seller">Car Seller</option>
                                            <option value="service_seller">Service Seller</option>

                                        </select>
                                        @error('vendor_type')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image</label>
                                        <input type="file" id="image" name="image" class="form-control"
                                            placeholder="Contact person phone" value="{{ old('image') }}">
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i>
                                    Save</button>
                                <button type="reset" class="btn btn-danger">Reset form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush