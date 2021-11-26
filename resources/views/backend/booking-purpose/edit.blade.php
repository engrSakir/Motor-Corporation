@extends('layouts.backend.app')

@section('title') Booking Purpose Edit @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Booking Purpose Edit Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Booking Purpose Edit Page</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Update Booking Purpose</h4>
                </div>
                <form action="{{ route('backend.bookingPurpose.update',$bookingPurpose) }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="category_name">Name<b class="text-danger">*</b> </label>
                                        <input type="text" id="booking_name" name="booking_name" class="form-control" placeholder="Name" value="{{  $bookingPurpose->name }}" required>
                                        @error('booking_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group has-danger">
                                        <label class="form-label" for="amount">Max Free Counter <b class="text-danger">*</b></label>
                                        <input type="number" id="free_counter" name="free_counter" class="form-control form-control-danger" placeholder="Max Free Counter" value="{{ $bookingPurpose->max_free_counter }}" required>
                                        @error('free_counter')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                              

                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                    <label for="example-month-input2" class="col-4 col-form-label">Description</label>
                                        <div class="col-10">
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                                    placeholder="Booking Purpose Description">{{ $bookingPurpose->description }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i> Save</button>
                                <button type="reset" class="btn btn-danger">Reset form</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
