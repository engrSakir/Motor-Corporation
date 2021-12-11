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
                    <h4 class="card-title">Basic Form</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="tb-fname" placeholder="Enter Name here">
                                    <label for="tb-fname">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="tb-email" placeholder="name@example.com">
                                    <label for="tb-email">Email address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="tb-pwd" placeholder="Password">
                                    <label for="tb-pwd">Password</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="tb-cpwd" placeholder="Password">
                                    <label for="tb-cpwd">Confirm Password</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-md-flex align-items-center mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
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
                                    <th>Month</th>
                                    <th>Amount</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Created At</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expense_budgets as $expense_budget)
                                <tr>
                                    <td>
                                        <button wire:click="delete({{ $expense_budget->id }})"
                                            class="btn btn-danger btn-circle"><i class="fa fa-trash text-white"></i>
                                        </button>
                                    </td>
                                    <td scope="row">{{ $expense_budget->id }}</td>
                                    <td>{{ $expense_budget->name }}</td>
                                    <td>{{ $expense_budget->phone }}</td>
                                    <td>{{ $expense_budget->email }}</td>
                                    <td>{{ $expense_budget->address }}</td>
                                    <td>{{ $expense_budget->created_at->format('d/m/Y h:i A') }}</td>
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