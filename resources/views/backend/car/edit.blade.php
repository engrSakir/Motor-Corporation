@extends('layouts.backend.app')

@section('title') Car Edit | @endsection

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
                <h4 class="mb-0 text-white">Update Car</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('backend.car.update',$car) }}" method="POST" class="form-horizontal form-material" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <div class="form-body">
                        <div class="card-body">
                            <div class="row pt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vendor">Vendor<b class="text-danger">*</b> </label>
                                        <select class="select2 form-select form-control" id="vendor" name="vendor" required>
                                            <option selected disabled value="">Chose vendor</option>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}" @if($car->vendor_id == $vendor->id) selected @endif>{{ $vendor->name }}</option>
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
                                        <label class="form-label" for="category">Category<b class="text-danger">*</b> </label>
                                        <select class="select2 form-select form-control" id="category" name="category" required>
                                            <option selected disabled value="">Chose category</option>
                                            @foreach ($carCategories as $category)
                                            <option value="{{ $category->id }}" @if($car->car_category_id == $category->id) selected @endif>{{ $category->name }}</option>
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
                                        <label class="form-label" for="name">Car Name<b class="text-danger">*</b> </label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="{{ $car->name }}" required>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="brand">Car Brand<b class="text-danger">*</b> </label>
                                        <input type="text" id="brand" name="brand" class="form-control" placeholder="Brand" value="{{ $car->brand }}" required>
                                        @error('brand')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="model">Car Model<b class="text-danger">*</b> </label>
                                        <input type="text" id="model" name="model" class="form-control" placeholder="Model" value="{{ $car->model }}" required>
                                        @error('model')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="purchase_price">Purchase price<b class="text-danger">*</b> </label>
                                        <input type="number" step="any" step="any" id="purchase_price" name="purchase_price" class="form-control" placeholder="Purchase price" value="{{ $car->purchase_price }}" required>
                                        @error('purchase_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="selling_price">Selling price<b class="text-danger">*</b> </label>
                                        <input type="number" step="any" step="any" id="selling_price" name="selling_price" class="form-control" placeholder="Selling price" value="{{ $car->selling_price }}" required>
                                        @error('selling_price')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="vat_percentage">Vat percentage (%)<b class="text-danger">*</b> </label>
                                        <input type="number" step="any" step="any" id="vat_percentage" name="vat_percentage" class="form-control" placeholder="Vat percentage" value="{{ $car->vat_percentage }}" required>
                                        @error('vat_percentage')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_percentage">Discount percentage (%)<b class="text-danger">*</b> </label>
                                        <input type="number" step="any" step="any" id="discount_percentage" name="discount_percentage" class="form-control" placeholder="Discount percentage" value="{{ $car->discount_percentage }}" required>
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
                                        <input type="text" id="registration" name="registration" class="form-control" placeholder="Registration" value="{{ $car->registration }}">
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
                                        <input type="text" id="mileages" name="mileages" class="form-control" placeholder="Mileages" value="{{ $car->mileages }}">
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
                                        <input type="file" accept="image/*" id="image" name="image" class="form-control" placeholder="image" value="{{ old('image') }}">
                                        <img id="image_display" width="150" src="{{ asset($car->image ?? 'uploads/images/no_image.png') }}" class="image-display" alt="User image" />

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
                                            <option value="deal_of_the_week" @if($car->placement == 'deal_of_the_week') selected @endif>Deal of the Week</option>
                                            <option value="popular" @if($car->placement == 'popular') selected @endif>Popular</option>
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
                                        <input class="form-check-input" type="radio" name="papers_up_to_date" id="papers_up_to_date_yes" value="1" @if($car->papers_up_to_date) checked @endif>
                                        <label class="form-check-label" for="papers_up_to_date_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="papers_up_to_date" id="papers_up_to_date_no" value="0" @if($car->papers_up_to_date == false) checked @endif>
                                        <label class="form-check-label" for="papers_up_to_date_no">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="name_transfer_documents">Name transfer documents</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="name_transfer_documents" id="name_transfer_documents_yes" value="1" @if($car->name_transfer_documents) checked @endif>
                                        <label class="form-check-label" for="name_transfer_documents_yes">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="name_transfer_documents" id="name_transfer_documents_no" value="0" @if($car->name_transfer_documents == false) checked @endif>
                                        <label class="form-check-label" for="name_transfer_documents_no">
                                            No
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Description </label>
                                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $car->description !!}</textarea>
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
