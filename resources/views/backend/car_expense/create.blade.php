@extends('layouts.backend.app')

@section('title') Car Expense Create @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Car Expense Create Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Car Expense Create Page</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Create Car Expense</h4>
                </div>
                <form action="{{ route('backend.carExpense.store') }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="category_name">Name<b class="text-danger">*</b> </label>
                                        <input type="text" id="car_name" name="car_name" class="form-control" placeholder="Name" value="{{ old('car_name') }}" required>
                                        @error('car_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group has-danger">
                                        <label class="form-label" for="amount">Amount <b class="text-danger">*</b></label>
                                        <input type="number" id="amount" name="amount" class="form-control form-control-danger" placeholder="Amount" value="{{ old('amount') }}" required>
                                        @error('amount')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                @if($selected_car)
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="form-label" for="car_id"><b class="text-danger">
                                        Car: {{ $selected_car->name }} <br>
                                        </b></label>
                                        <input type="hidden" id="car_id" name="car_id" class="form-control form-control-danger" placeholder="Car Name" value="{{ $selected_car->id }}" required>
                                        @error('car_id')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                @else
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                    <label class="form-label">Car  <b class="text-danger">*</b></label>
                                    <select name="car_id" class="form-select col-12" id="car_id" required>
                                    <option value="">--Select Car--</option>
                                    @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                    @endforeach
                                    </select>
                                    </div>
                                </div>
                                <!--/span-->
                               @endif

                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                    <label for="example-month-input2" class="col-4 col-form-label">Description</label>
                                        <div class="col-10">
                                        <textarea class="form-control" id="description" name="description" rows="3"
                                                    placeholder="Car Expense Description"></textarea>
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
    
    <div class="row">
    <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">List of Car Expenses</h4>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table color-bordered-table primary-bordered-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Car</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carexpenses as $carexpense)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $carexpense->name }}</td>
                                    <td>{{ $carexpense->amount }}</td>
                                    <td>{{ $carexpense->car->name ?? '#' }}</td>
                                    <td>{{ $carexpense->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-circle" href="{{ route('backend.carExpense.edit', $carexpense) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-circle delete-btn"
                                            value="{{ route('backend.carExpense.destroy', $carexpense) }}">
                                            <i class="fa fa-trash"></i>
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
