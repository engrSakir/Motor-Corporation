<div>
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Instagram</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Instagram</li>
                </ol>
                <a href="{{ route('backend.pos') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                        class="fa fa-plus-circle"></i> POS </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Add Video</h4>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="save_video" class="form-horizontal form-material"
                        enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="card-body">
                                <div class="row pt-3">
                                    <div class="form-group col-md-12">
                                        <label for="url">Video Url</label>
                                        <input type="url" step="any" class="form-control" id="url"
                                            wire:model="video_url" placeholder="Enter Url">
                                        @error('video_url')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
        </div>
    </div>

    <div class="row">
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
                                <div class="row pt-3">
                                    <div class="form-group col-md-6">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control"
                                                    accept="image/*" wire:model.defer="image">
                                                <label class="custom-file-label">Choose file</label>
                                                @error('image')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                                @enderror

                                            </div>
                                        </div>
                                        <div wire:loading wire:target="image">Uploading...</div>
                                        @if ($image)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ $image->temporaryUrl() }}">
                                            </div>
                                        </div>
                                        @elseif($selected_instagram)
                                        <div class="row">
                                            <div class="col-3 card me-1 mb-1">
                                                <img src="{{ asset($selected_instagram->image) }}">
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="url">Url</label>
                                        <input type="url" step="any" class="form-control" id="url" wire:model="url"
                                            placeholder="Enter Url">
                                        @error('url')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
                            <h4 class="mb-0 text-white">Instagram Images</h4>
                        </div>
                        <table class="table table-resonsive-md">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><strong>Image</strong></th>
                                    <th><strong>Url</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Action</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($instagrams as $instagram)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img style="width:50px; height:50px;" src="{{ asset($instagram->image) }}"
                                            alt="">
                                    </td>
                                    <td>{{ $instagram->url }}</td>
                                    <td wire:click="select_instagram({{ $instagram->id }} , 'status')">
                                        @if($instagram->status)
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
                                                wire:click="select_instagram({{ $instagram->id }} , 'edit')"
                                                class="btn btn-primary shadow sharp" style="margin-right: 10px"><i
                                                    class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0)"
                                                wire:click="select_instagram({{ $instagram->id }} , 'delete')"
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