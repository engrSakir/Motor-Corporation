<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Contact Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Contact Info Page</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Showing All Contact Info --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table color-bordered-table primary-bordered-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Mame</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->message }}</td>
                                <td wire:click="select_contact({{ $contact->id }} , 'status')">
                                    @if ($contact->status)
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-circle text-success mr-2"></i>
                                        &nbsp;{{ __('Read') }}
                                    </div>
                                    @else
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-circle text-danger mr-2"></i>&nbsp;{{ __('Unread') }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="select_contact({{ $contact->id }} , 'delete')"
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
    {{--End of Showing contact --}}

</div>