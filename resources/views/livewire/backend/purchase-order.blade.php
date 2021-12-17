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
                    <form action="{{ route('backend.purchaseOrder.store') }}" method="POST"
                        class="form-horizontal form-material" enctype="multipart/form-data">
                        @csrf
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
                                        <div class="form-group">
                                            <label class="form-label" for="vendor_name">Vendor<b class="text-danger">*</b> </label>
                                            <select class="select2 form-select form-control" id="vendor_name" name="vendor_name" required>
                                                <option selected disabled value="">Chose vendor</option>
                                                @foreach ($vendors as $vendor)
                                                <option value="{{ $vendor->id }}" @if(old('vendor_name') == $vendor->id) selected @endif>{{ $vendor->name }}</option>
                                                @endforeach
                                              </select>
                                              </select>
                                            @error('vendor_name')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <textarea name="" id="" class="form-control" cols="30" rows="2" placeholder="Description"></textarea>
                                                    @error('work_description')
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" placeholder="Price">
                                                    @error('amount')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control">
                                                    @error('job_finish_date')
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>

                                        </table>
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
</div>
