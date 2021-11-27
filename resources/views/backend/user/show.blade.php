@extends('layouts.backend.app')

@section('title') User Show @endsection

@section('bread-crumb')
   <!-- ============================================================== -->
   <div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Profile</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <a href="{{ route('backend.user.index') }}" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Back to list</a>
        </div>
    </div>
</div>
<!-- ============================================================== -->
@endsection

@section('content')
      <!-- Row -->
      <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-6 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{ asset($user->image ?? 'uploads/images/no_image.png') }}" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{ $user->name }}</h4>
                        <h6 class="card-subtitle">{{ $user->email }}</h6>
                        
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> <small class="text-muted">Email address </small>
                    <h6>{{ $user->email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
                    <h6>{{ $user->phone }}</h6> <small class="text-muted p-t-30 db">Address</small>
                    <h6>{{ $user->address }}</h6>
                </div>
            </div>
        </div>
        <!-- Column -->
       
    </div>
    <!-- Row -->
@endsection

@push('head')

@endpush

@push('foot')
<script>
    $(".copy-btn").click(function() {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).text()).select();
        document.execCommand("copy");
        $temp.remove();
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Copy',
            showConfirmButton: false,
            timer: 500
        })
    });
    </script>
@endpush
