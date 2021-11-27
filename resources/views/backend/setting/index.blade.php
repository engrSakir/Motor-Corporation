@extends('layouts.backend.app')

@section('title') Setting @endsection

@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Global Setting</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Setting</li>
            </ol>
            <a href="{{ url('/') }}" target="_blank" class="btn btn-info d-none d-lg-block m-l-15"><i
                    class="fa fa-plus-circle"></i> Website</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Setting</h4>
            </div>
            <form action="{{ route('backend.settings') }}" method="POST" class="form-horizontal form-material"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <h4 class="card-title">Site Settings</h4>
                </div>
                <hr>
                <div class="form-body">
                    <div class="card-body">
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="number" name="mobile" placeholder="Companies Mobile Number"
                                        value="{{ get_static_option('mobile') }}" id="mobile" class="form-control">
                                    @error('mobile')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" placeholder="Companies Email"
                                        value="{{ get_static_option('email') }}" id="email" class="form-control">
                                    @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                    <label for="address">Address</label>
                                    <textarea class="form-control" name="address"
                                        id="address">{{ get_static_option('address') }}</textarea>
                                    @error('address')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                               <!-- <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" value="{{ get_static_option('facebook') }}"
                                        id="facebook" class="form-control">
                                    @error('facebook')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>-->
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Title 1</label>
                                    <input type="text" name="title1" value="{{ get_static_option('title1') }}"
                                        id="title1" class="form-control">
                                    @error('title1')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">Video URL 1</label>
                                    <input type="text" name="video1" value="{{ get_static_option('video1') }}"
                                        id="video1" class="form-control">
                                    @error('video1')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Title 2</label>
                                    <input type="text" name="title2" value="{{ get_static_option('title2') }}"
                                        id="title3" class="form-control">
                                    @error('title2')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">Video URL 2</label>
                                    <input type="text" name="video2" value="{{ get_static_option('video2') }}"
                                        id="video3" class="form-control">
                                    @error('video2')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->
                        <!--/row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter">Title 3</label>
                                    <input type="text" name="title3" value="{{ get_static_option('title3') }}"
                                        id="title3" class="form-control">
                                    @error('title3')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="linkedin">Video URL 3</label>
                                    <input type="text" name="video3" value="{{ get_static_option('video3') }}"
                                        id="video3" class="form-control">
                                    @error('video3')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!--/span-->
                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner_image">Logo image</label>
                                    <input type="file" name="logo" value="{{ get_static_option('logo') }}" id="logo"
                                        class="form-control">
                                    <div class="image">
                                        <img src="{{ asset(get_static_option('logo')) ?? 'assets/images/logo-bg.png' }}" width="100"
                                            class="img-circle elevation-2">
                                    </div>
                                    @error('logo')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="banner_image">Banner Video</label>
                                    <input type="file" name="banner_video"
                                        value="{{ get_static_option('banner_video') }}" id="banner_video"
                                        class="form-control">

                                    @error('banner_video')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                               <!-- <div class="form-group">
                                    <label for="facebook_page_id">Facebook page ID</label>
                                    <input type="text" name="facebook_page_id"
                                        value="{{ get_static_option('facebook_page_id') }}" id="facebook_page_id"
                                        class="form-control">
                                    @error('facebook_page_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <!-- <div class="form-group">
                                    <label for="facebook_page_access_token">Facebook page Access token</label>
                                    <input type="text" name="facebook_page_access_token"
                                        value="{{ get_static_option('facebook_page_access_token') }}"
                                        id="facebook_page_access_token" class="form-control">
                                    @error('facebook_page_access_token')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>-->
                            </div>
                            <!--/span-->
                            <div class="col-md-6">


                            </div>
                            <!--/span-->
                        </div>
                        <!--/row-->

                        <h4>Opening Hours</h4>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_page_access_token">Day</label>
                                    <input type="text" name="line1" placeholder="Saturday-Sunday"
                                        value="{{ get_static_option('line1') }}" id="line1" class="form-control">


                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_page_access_token">Time</label>
                                    <input type="text" name="time1" placeholder="1:00 AM-3:00PM"
                                        value="{{ get_static_option('time1') }}" id="time1" class="form-control">

                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                               <!-- <div class="form-group">
                                    <label for="address">About Company</label>
                                    <textarea class="ckeditor form-control"
                                        name="about">{{ get_static_option('about') }}</textarea>
                                    @error('about')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div> -->
                            </div>
                            <!--/span-->
                            <div class="col-md-6">


                            </div>
                            <!--/span-->
                        </div>

                        <div class="form-actions">
                            <div class="card-body">
                                <button type="submit" name="submit" class="btn btn-success text-white"> <i
                                        class="fa fa-check"></i> Save</button>
                                <button type="reset" class="btn btn-danger">Reset form</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection

@push('head')

@endpush

@push('foot')

@endpush