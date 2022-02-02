<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Saving Investor Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Saving Investor Page</li>
                </ol>
            </div>
        </div>
    </div>




    {{-- Form for adding Saving Investor --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Saving Investor</h4>
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="name" class="form-control" wire:model="name">
                                    <label>Name</label>
                                </div>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" wire:model="opening_date">
                                    <label>opening_date</label>
                                </div>
                                @error('opening_date')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" wire:model="current_amount">
                                    <label>Current Amount</label>
                                </div>
                                @error('current_amount')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="mt-3 text-center">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button class="btn btn-success btn-lg text-white" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Endc Form for adding investor --}}

    {{-- Showing All investor --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table color-bordered-table primary-bordered-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Opening Date</th>
                                <th>Initial Deposit</th>
                                <th>Current Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investors as $investor)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $investor->name }}</td>
                                <td>{{ $investor->opening_date }}</td>
                                <td>{{ $investor->initial_deposit }}</td>
                                <td>{{ $investor->current_amount }}</td>
                                <td>
                                    <button wire:click="select_saving_investor({{ $investor->id }} , 'edit')"
                                        class="btn btn-info btn-circle"><i class="fa fa-pen text-white"></i>
                                    </button>
                                    <button wire:click="select_saving_investor({{ $investor->id }} , 'delete')"
                                        onclick="confirm('Are you sure you want to remove ?') || event.stopImmediatePropagation()"
                                        class="btn btn-danger btn-circle"><i class="fa fa-trash text-white"></i>
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
    {{--End of Showing investor --}}

</div>