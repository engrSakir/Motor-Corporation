<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Car Details</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">car Details</li>
                </ol>
                <a href="{{ route('backend.pos') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card ">
                <div class="card-header text-center bg-primary text-white">
                    <h3>Car No: #{{ $car->id }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <h4>
                                    {{-- Car Info --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <b class="text-danger">Car Information</b>
                                            <img style="width:50px; height:50px" src="{{ asset($car->image) }}" alt="">
                                            <br>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="javascript:void(0)"
                                                wire:click="download_spacification({{ $car->id }})"
                                                class="btn btn-primary shadow sharp">Download
                                                Spacification</a>
                                        </div>

                                    </div>
                                </h4>
                                <tr>
                                    <td>Car Name</td>
                                    <td>{{ $car->name ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Brand</td>
                                    <td>{{ $car->brand ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Model</td>
                                    <td>{{ $car->model ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Cateogry</td>
                                    <td>{{ $car->category->name ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Vendor</td>
                                    <td>{{ $car->vendor->name ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Papers Up-to-Date</td>
                                    <td>{{ $car->papers_up_to_date ? 'Yes' : 'No'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Name Transfer Documents</td>
                                    <td>{{ $car->name_transfer_documents ? 'yes' : 'No'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Purchase Price</td>
                                    <td>{{ $car->purchase_price ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Expected Price</td>
                                    <td>{{ $car->selling_price ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Vat Percentage</td>
                                    <td>{{ $car->vat_percentage ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Discount Percentage</td>
                                    <td>{{ $car->discount_percentage ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Registration</td>
                                    <td>{{ $car->registration ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Mileages</td>
                                    <td>{{ $car->mileages ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Chassis Number</td>
                                    <td>{{ $car->chassis_number ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Number</td>
                                    <td>{{ $car->car_number ?? 'Not Found'}} </td>
                                </tr>
                                <tr>
                                    <td>Car Description</td>
                                    <td>{{ $car->description ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Car Car type</td>
                                    <td>{{ $car->placement ?? 'Not Found'}}</td>
                                </tr>
                                <tr>
                                    <td>Created at</td>
                                    <td>{{$car->created_at->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td><span class="label label-success">{{ $car->creator->name ?? 'Not Found'
                                            }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td><span class="label label-warning">{{ $car->editor->name ?? 'Not Found' }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Destroyer</td>
                                    <td><span class="label label-danger">{{ $car->destroyer->name ?? 'Not Found'
                                            }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Add Image</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save" class="form-horizontal form-material"
                        enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    accept="image/*" wire:model.defer="image">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div wire:loading wire:target="image">Uploading...</div>
                                        @if ($image)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ $image->temporaryUrl() }}">
                                            </div>
                                        </div>
                                        @elseif($selected_image)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ asset($selected_image->image) }}">
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-success text-white"> <i
                                            class="fa fa-check"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="form-group col-md-12">
                    <div class="table-responsive">
                        <div class="card-header bg-success">
                            <h4 class="mb-0 text-white">Car Images</h4>
                        </div>
                        <table class="table table-resonsive-md">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($car_images as $car_image)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width:50px; height:50px;" src="{{ asset($car_image->image) }}"
                                            alt="">
                                    </td>
                                    <td wire:click="select_image({{ $car_image->id }} , 'status')">
                                        @if($car_image->status)
                                        <div class="d-flex aligns-items-center mr-3">
                                            <i class="fa fa-circle text-success "></i>
                                            Actice
                                        </div>
                                        @else
                                        <div class="d-flex aligns-items-center mr-3">
                                            <i class="fa fa-circle text-danger "></i>
                                            Deactice
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="javascript:void(0)"
                                                wire:click="select_image({{ $car_image->id }} , 'edit')"
                                                class="btn btn-primary shadow sharp" style="margin-right: 10px"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)"
                                                wire:click="select_image({{ $car_image->id }} , 'delete')"
                                                onclick="confirm('Are you sure you want to remove ?') || event.stopImmediatePropagation()"
                                                class="btn btn-danger shadow sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    @push('head')

    @endpush

    @push('foot')

    @endpush

</div>