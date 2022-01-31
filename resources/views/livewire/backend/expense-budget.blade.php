<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Expense Budget Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Expense Budget Page</li>
                </ol>
                <button type="button" wire:click="show_form" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> Add New </button>
            </div>
        </div>
    </div>
    @if($form)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" step="any" wire:model="amount_from_in_hand"
                                        class="form-control" id="tb-fname" placeholder="Amount in hand">
                                    <label for="tb-fname">From amount in hand</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="month" wire:model="month" class="form-control" id="tb-fname">
                                    <label for="tb-fname">Month</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select wire:model="investment" class="form-control select2" id="investment">
                                        <option selected value="">Chose investment</option>
                                        @foreach ($investors as $investor)
                                        <optgroup label="{{ $investor->name }}">
                                            @foreach ($investor->investments as $investment)
                                            @if($investment->totalUsableAmount() > 0)
                                            <option value="{{ $investment->id }}" @if(old('investment')==$investment->
                                                id) selected @endif>ID: {{ $investment->id }} Balance: {{
                                                $investment->totalUsableAmount() }} of {{ $investment->amount }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" step="any" wire:model="amount_from_investment"
                                        class="form-control" id="tb-cpwd" placeholder="Amount from investment">
                                    <label for="tb-cpwd">Amount</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" wire:model="issue_date" class="form-control" id="tb-fname">
                                    <label for="tb-fname">Issue Date</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <textarea wire:model="note" cols="50" rows="60" class="form-control" id="tb-fname"
                                        name="note" rows="3" placeholder="Note"></textarea>
                                    <label for="tb-fname">Note</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-md-flex align-items-center mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Information is correct
                                        </label>
                                    </div>
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if (session()->has('message'))
                    <div class="alert alert-{{ session('message_type') }}" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table color-bordered-table primary-bordered-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Issue Date</th>
                                    <th>Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense_budgets as $expense_budget)
                                <tr>
                                    <td scope="row">#</td>
                                    <td> @if($expense_budget->investment_id) Investment @else In Hand @endif</td>
                                    <td>{{ $expense_budget->month }}</td>
                                    <td>{{ $expense_budget->amount }}</td>
                                    <td>{{ date("d-m-Y", strtotime($expense_budget->issue_date)) }}</td>
                                    <td>{{ $expense_budget->note }}</td>
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