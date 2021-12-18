<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Purchase Orders</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Purchase Orders</li>
                </ol>
                <a href="{{ route('backend.purchaseOrder.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> PO List</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Create Purchase Orders</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="submit">
                        <div class="form-body">
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
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        @foreach ($vendors as $vendor)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vendor_name" id="vendor_no_{{ $vendor->id }}" value="{{ $vendor->id }}" wire:model="vendor_name" required>
                                            <label class="form-check-label" for="vendor_no_{{ $vendor->id }}">{{ $vendor->name }}</label>
                                        </div>
                                        @endforeach
                                        @error('vendor_name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-striped table-hover">
                                            @foreach ($po_items as $key => $po_item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <textarea name="work_description" id="" class="form-control" cols="30" rows="2" placeholder="Description" wire:model="po_field.{{ $key }}.description" required></textarea>
                                                    @error('po_field.'.$key.'.description')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" placeholder="Price" wire:model="po_field.{{ $key }}.price" required>
                                                    @error('po_field.'.$key.'.price')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control" wire:model="po_field.{{ $key }}.date">
                                                    @error('po_field.'.$key.'.date')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger" wire:click="remove_item({{ $key }})">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="card-body">
                                    <button type="button" class="btn btn-info text-white" wire:click="add_item"> <i class="fa fa-plus"></i>
                                        Add item</button>
                                    @if(count($po_items) > 0)
                                    <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i>
                                        Save</button>
                                    <button type="reset" class="btn btn-danger">Reset form</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
