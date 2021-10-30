@extends('layouts.backend.app')

@section('title') Settlement Edit | @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Settlement</h4>
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
        <div class="col-12">
            <div class="card">
            <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Update Settlement</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('backend.settlement.update',$settlement) }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="investment">Investment<b class="text-danger">*</b> </label>
                                        <select class="select2 form-select form-control" id="investment" name="investment" required>
                                            <option selected disabled value="">Chose investment</option>
                                            @foreach ($investors as $investor)
                                            <optgroup label="{{ $investor->name }}">
                                                @foreach ($investor->investments as $investment)
                                                <option value="{{ $investment->id }}" @if($settlement->investment == $investment) selected @endif>ID: {{ $investment->created_at->format('dmyhis') }} Unsettlement: {{ $investment->investWithInterest() - $investment->settlements->sum('amount') }} Settlement: {{ $investment->settlements->sum('amount') }}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                          </select>
                                          </select>
                                        @error('investment')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="number" step="any" class="form-control" name="settlemen_amount" placeholder="Settlement amount" value="{{ $settlement->amount }}" required>
                                    </div>
                                    @error('settlemen_amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
