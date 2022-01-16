<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Video Page</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Video Page</li>
                </ol>
            </div>
        </div>
    </div>

    {{-- Form for adding Video --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Video Url</h4>
                    <form wire:submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="title" class="form-control" wire:model="title">
                                    <label for="video">Video Title</label>
                                </div>
                                @error('title')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="url" class="form-control" wire:model="url">
                                    <label for="video">Video Url</label>
                                </div>
                                @error('url')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="mt-3 text-center">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button class="btn btn-danger btn-lg text-white" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Endc Form for adding Video --}}

    {{-- Showing All video --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table color-bordered-table primary-bordered-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Video Title</th>
                                <th>Video Url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $video)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $video->title }}</td>
                                <td>{{ $video->url }}</td>
                                <td wire:click="select_video({{ $video->id }} , 'status')">
                                    @if ($video->status)
                                    <div class="d-flex align-items-center"><i
                                            class="fa fa-circle text-success mr-1"></i>
                                        {{ __('Active') }} </div>
                                    @else
                                    <div class="d-flex align-items-center"><i
                                            class="fa fa-circle text-danger mr-1"></i>{{ __('Inactive') }}
                                    </div>
                                    @endif
                                </td>
                                <td>
                                    <button wire:click="select_video({{ $video->id }} , 'edit')"
                                        class="btn btn-info btn-circle"><i class="fa fa-pen text-white"></i>
                                    </button>
                                    <button wire:click="select_video({{ $video->id }} , 'delete')"
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
    {{--End of Showing video --}}

</div>