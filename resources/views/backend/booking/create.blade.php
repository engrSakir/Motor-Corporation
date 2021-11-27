@extends('layouts.backend.app')

@section('title') Booking  Create @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Booking  Create Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Booking  Create Page</li>
                </ol>
                
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Create Booking </h4>
                </div>
                <form action="{{ route('backend.booking.update',$booking) }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="form-label" for="category_name">Name<b class="text-danger">*</b> </label>
                                        <input type="text" placeholder="Name" name="name" id="name" style="width: 100%;" value="{{ $booking->name }}"><br>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <label class="form-label" for="category_name">Phone<b class="text-danger">*</b> </label>
                                        <input type="text" placeholder="Phone" name="phone" id="phone" style="width: 100%;" value="{{ $booking->phone }}"><br>
                                        @error('phone')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                <div class="form-group">

<label class="form-label" for="category_name">Email<b class="text-danger">*</b> </label>
<input type="text" placeholder="Email" name="email" id="email" style="width: 100%;" value="{{ $booking->email }}">
@error('email')
<div class="alert alert-danger" role="alert">
    {{ $message }}
</div>
@enderror
</div>
                                </div>
                                <!--/span-->
                              

                                <div class="col-md-6">
                                <div class="form-group">
                                        <label class="form-label" for="image">Image </label>
                                        <input type="file" accept="image/*" id="image" name="image" class="form-control" placeholder="image" value="{{ old('image') }}">
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group" style="margin-left:10px;">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" @if($booking->status == 'waiting' ) {{ checked}} @endif name="status" value="waiting"
                                            id="status1">
                                            <label class="form-check-label" for="status1">
                                           Waiting
                                        </label>
                                       
</div>
<div class="form-check">

                                            <input class="form-check-input" type="radio" name="status" value="accepted"
                                            id="status2">
                                        <label class="form-check-label" for="status2">
                                           Accepted
                                        </label>
                                        
                                    </div>

                                    <div class="form-check">

                                            <input class="form-check-input" type="radio" name="status" value="rejected"
                                            id="status3">
                                        <label class="form-check-label" for="status3">
                                           Rejected
                                        </label>
                                        
                                    </div>

                                    <div class="form-check">

                                            <input class="form-check-input" type="radio" name="status" value="done"
                                            id="status4">
                                        <label class="form-check-label" for="status4">
                                           Done
                                        </label>
                                        
                                    </div>
                                    @error('status')
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
