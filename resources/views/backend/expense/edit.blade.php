@extends('layouts.backend.app')

@section('title') Expense Edit @endsection

@section('content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Expense Edit Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Expense Edit Page</li>
                </ol>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Update Expense</h4>
                </div>
                <form action="{{ route('backend.expense.update', $expense) }}" method="POST"
                    class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="form-label" for="amount">Amount <b
                                                class="text-danger">*</b></label>
                                        <input type="number" id="amount" name="amount"
                                            class="form-control form-control-danger" value="{{ $expense->amount }}"
                                            required>
                                        @error('amount')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="form-label">Expense Category</label>
                                        <select name="category_id" class="form-select col-12" id="category_id" required>
                                            <option value="">--Select Category--</option>
                                            @foreach ($expenseCategories as $expenseCategory)
                                                <option value="{{ $expenseCategory->id }}" @if ($expense->category_id == $expenseCategory->id) selected @endif>
                                                    {{ $expenseCategory->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
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
                                            <textarea class="form-control" id="description" name="description"
                                                rows="3">{{ $expense->description }}</textarea>
                                            @error('description')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="recurring" value="1"
                                            id="recurring" @if ($expense->recurring == true) checked @endif>
                                        <label class="form-check-label" for="recurring">
                                            Recurring
                                        </label>
                                        @error('recurring')
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
@endsection

@push('head')

@endpush

@push('foot')

@endpush
