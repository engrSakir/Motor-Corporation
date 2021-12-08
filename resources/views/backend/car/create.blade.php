@extends('layouts.backend.app')

@section('title') Car Purchase| @endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Car</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Car</li>
            </ol>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Purchase Car</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('backend.car.store') }}" method="POST" class="form-horizontal form-material"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor">Vendor<b class="text-danger">*</b>
                                        </label>
                                        <select class="select2 form-select form-control" id="vendor" name="vendor"
                                            required>
                                            <option selected disabled value="">Chose vendor</option>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" @if(old('vendor')==$vendor->id) selected
                                                @endif>{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                        @error('vendor')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="category">Category<b class="text-danger">*</b>
                                        </label>
                                        <select class="select2 form-select form-control" id="category" name="category"
                                            required>
                                            <option selected disabled value="">Chose category</option>
                                            @foreach ($carCategories as $category)
                                            <option value="{{ $category->id }}" @if(old('category')==$category->id)
                                                selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        </select>
                                        @error('category')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Car Name<b class="text-danger">*</b>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="brand">Car Brand<b class="text-danger">*</b>
                                        </label>
                                        <input type="text" id="brand" name="brand" class="form-control"
                                            placeholder="Brand" value="{{ old('brand') }}" required>
                                        @error('brand')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="model">Car Model<b class="text-danger">*</b>
                                        </label>
                                        <input type="text" id="model" name="model" class="form-control"
                                            placeholder="Model" value="{{ old('model') }}" required>
                                        @error('model')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="purchase_price">Purchase price<b
                                                class="text-danger">*</b> </label>
                                        <input type="number" step="any" id="purchase_price" name="purchase_price"
                                            class="form-control" placeholder="Purchase price"
                                            value="{{ old('purchase_price') }}" required>
                                        @error('purchase_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="selling_price">Selling price<b
                                                class="text-danger">*</b> </label>
                                        <input type="number" step="any" id="selling_price" name="selling_price"
                                            class="form-control" placeholder="Selling price"
                                            value="{{ old('selling_price') }}" required>
                                        @error('selling_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vat_percentage">Vat percentage (%)<b
                                                class="text-danger">*</b> </label>
                                        <input type="number" step="any" id="vat_percentage" name="vat_percentage"
                                            class="form-control" placeholder="Vat percentage"
                                            value="{{ old('vat_percentage') }}" required>
                                        @error('vat_percentage')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_percentage">Discount percentage (%)<b
                                                class="text-danger">*</b> </label>
                                        <input type="number" step="any" id="discount_percentage"
                                            name="discount_percentage" class="form-control"
                                            placeholder="Discount percentage" value="{{ old('discount_percentage') }}"
                                            required>
                                        @error('discount_percentage')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="registration">Registration </label>
                                        <input type="text" id="registration" name="registration" class="form-control"
                                            placeholder="Registration" value="{{ old('registration') }}">
                                        @error('registration')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="mileages">Mileages </label>
                                        <input type="text" id="mileages" name="mileages" class="form-control"
                                            placeholder="Mileages" value="{{ old('mileages') }}">
                                        @error('mileages')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="image">Image </label>
                                        <input type="file" accept="image/*" id="image" name="image" class="form-control"
                                            placeholder="image" value="{{ old('image') }}">
                                        @error('image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="placements">Placement</label>
                                        <select name="placements" class="form-select col-12" id="placements">
                                            <option value="">--Choose Placement--</option>
                                            <option value="deal_of_the_week">Deal of the Week</option>
                                            <option value="popular">Popular</option>
                                        </select>
                                        @error('placements')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="papers_up_to_date">Papers up to date</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="papers_up_to_date"
                                            id="papers_up_to_date_yes" value="1" checked>
                                        <label class="form-check-label" for="papers_up_to_date_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="papers_up_to_date"
                                            id="papers_up_to_date_no" value="0">
                                        <label class="form-check-label" for="papers_up_to_date_no">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="name_transfer_documents">Name transfer documents</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="name_transfer_documents"
                                            id="name_transfer_documents_yes" value="1" checked>
                                        <label class="form-check-label" for="name_transfer_documents_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="name_transfer_documents"
                                            id="name_transfer_documents_no" value="0">
                                        <label class="form-check-label" for="name_transfer_documents_no">
                                           No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description </label>
                                        <textarea name="description" id="description" cols="30" rows="10"
                                            class="form-control">{!! old('description') !!}</textarea>
                                        @error('description')
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