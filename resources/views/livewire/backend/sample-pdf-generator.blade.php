<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Custom Generate Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Custom Generate Page</li>
                </ol>
                @can('pos')
                <a href="{{ route('backend.pos') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
                @endcan

            </div>
        </div>
    </div>
    <div class="card-header bg-primary text-white">
        Delivery chalan
    </div>
    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="generate_chalan">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><b>Date :</b></div>
                            </div>
                            <input type="date" required class="form-control" wire:model='chalan.date'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><b>Invoice No. :</b></div>
                            </div>
                            <input type="text" required class="form-control" wire:model='chalan.no'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><b>Mr/Mrs/M/s :</b></div>
                            </div>
                            <input type="text" required class="form-control" wire:model='chalan.customer_name'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><b>Address :</b></div>
                            </div>
                            <input type="text" required class="form-control" wire:model='chalan.address'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><b>Phone :</b></div>
                            </div>
                            <input type="text" required class="form-control" wire:model='chalan.phone'>
                        </div>
                    </div>
                    <hr style="height: 20px;" class="bg-success">
                    <div class="col-md-12 row">
                        <div class="col-md-6 row">
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Category :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.category'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Name :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.car_name'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Brand :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.brand'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Model :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.model'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Registration :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.registration'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Mileages :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.mileages'>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Chassis number :</b></div>
                                    </div>
                                    <input type="text" required class="form-control" wire:model='chalan.chassis_number'>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 row row d-flex align-items-center">
                            <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><b>Unit :</b></div>
                                    </div>
                                    <input type="number" required class="form-control" wire:model='chalan.unit'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success col-12">Generate chalan</button>
            </form>
        </div>
    </div>
    @push('head')

    @endpush

    @push('foot')

    @endpush

</div>