@extends('layouts.backend.app')

@section('title') Investment Create| @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Investment</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Investment</li>
                </ol>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Create Investment</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('backend.investment.store') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="investor">Investor Name<b class="text-danger">*</b> </label>
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
                                        <label class="form-label" for="investment_amount">Investment Amount<b class="text-danger">*</b></label>
                                        <input type="number" id="investment_amount" name="investment_amount" class="form-control" placeholder="Investment Amount" value="{{ old('investment_amount') }}" required>
                                        @error('investment_amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="interest">Interest Amount in Percentage<b class="text-danger">*</b></label>
                                        <input type="number" id="interest" name="interest" class="form-control" placeholder="Interest Amount" value="{{ old('interest') }}" required>
                                        @error('interest')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="settlement_date">Settlement Date<b class="text-danger">*</b></label>
                                        <input type="date" id="settlement_date" name="settlement_date" class="form-control" placeholder="Settlement Date" value="{{ old('settlement_date') }}" required>
                                        @error('settlement_date')
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
