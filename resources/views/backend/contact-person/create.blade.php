@extends('layouts.backend.app')

@section('title') Contact Person Create| @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contact Person</h4>
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
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Create Contact Person</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('backend.investorContactPerson.store') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="investor">Investor<b class="text-danger">*</b> </label>
                                        <select class="select2 form-select form-control" id="investor" name="investor" required>
                                            <option selected disabled value="">Chose investor</option>
                                            @foreach ($investors as $investor)
                                            <option value="{{ $investor->id }}" @if(old('investor') == $investor->id) selected @endif>{{ $investor->name }}</option>
                                            @endforeach
                                          </select>
                                          </select>
                                        @error('investor')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="contact_person_name">Contact person name<b class="text-danger">*</b> </label>
                                        <input type="text" id="contact_person_name" name="contact_person_name" class="form-control" placeholder="Contact person name" value="{{ old('contact_person_name') }}" required>
                                        @error('contact_person_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="contact_person_phone">Contact person phone<b class="text-danger">*</b> </label>
                                        <input type="text" id="contact_person_phone" name="contact_person_phone" class="form-control" placeholder="Contact person phone" value="{{ old('contact_person_phone') }}" required>
                                        @error('contact_person_phone')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="contact_person_email">Contact person email</label>
                                        <input type="email" id="contact_person_email" name="contact_person_email" class="form-control" placeholder="Contact person email" value="{{ old('contact_person_email') }}">
                                        @error('contact_person_email')
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
    </div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush
