<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Saving Investment Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Saving Investment Page</li>
                </ol>
                <a href="{{ route('backend.saving-investor') }}" class="btn btn-success d-none d-lg-block m-l-15"><i
                        class="fa fa-activity"></i> Saving Investor</a>
            </div>
        </div>
    </div>

    {{-- Form for adding Saving Investment --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Saving Investment</h4>
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Investor Name</label>
                                    <select id="investor" class="form-control" wire:model="investor_id">
                                        <option selected>Choose Investor...</option>
                                        @foreach ($investors as $investor)
                                        <option value="{{ $investor->id }}">{{ $investor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('investor_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" wire:model="amount">
                                    <label>Amount</label>
                                </div>
                                @error('amount')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" wire:model="interest">
                                    <label>Interest</label>
                                </div>
                                @error('interest')
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
    {{-- Endc Form for adding investment --}}

    {{-- Showing All investment --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table color-bordered-table primary-bordered-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Investor Id</th>
                                <th>Amount</th>
                                <th>Interest</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investments as $investment)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $investment->investor->name }}</td>
                                <td>{{ $investment->amount }}</td>
                                <td>{{ $investment->interest }}</td>
                                <td>
                                    <button wire:click="select_saving_investment({{ $investment->id }} , 'edit')"
                                        class="btn btn-info btn-circle"><i class="fa fa-pen text-white"></i>
                                    </button>
                                    <button wire:click="select_saving_investment({{ $investment->id }} , 'delete')"
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
    {{--End of Showing investment --}}

</div>