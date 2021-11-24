@extends('layouts.frontend.app')
@push('title') Login @endpush
@section('content')
<div class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="page-title">
                    <h2 style="color:white;">Login </h2>
                </div>
            </div>
            <!--col-xs-12-->
        </div>
        <!--row-->
    </div>
    <!--container-->
</div>
<div class="main-container col1-layout wow bounceInUp animated animated animated" style="visibility: visible;">

    <div class="main">
        <div class="account-login container">
            <!--page-title-->

            <form action="{{ route('login') }}" method="post" id="login-form">
                @csrf
                <input name="form_key" type="hidden" value="EPYwQxF6xoWcjLUr">
                <fieldset class="col2-set">
                    <div class="col-1 new-users">
                        <strong>Login note</strong>
                        <div class="content">

                            <p>By creating an account with our store, you will be able to move through the checkout
                                process faster, store multiple shipping addresses, view and track your orders in your
                                account and more.</p>

                        </div>
                    </div>
                    <div class="col-2 registered-users">
                        <strong>Administrative Login</strong>
                        <div class="content">

                            <p>If you have an account with us, please log in.</p>
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="text" name="email" value="" id="email"
                                            class="input-text required-entry validate-email" title="Email Address">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-info" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </li>
                                <li>
                                    <label for="pass">Password<em class="required">*</em></label>
                                    <div class="input-box">
                                        <input type="password" name="password"
                                            class="input-text required-entry validate-password" id="pass"
                                            title="Password">
                                        @error('password')
                                        <div class="alert alert-info" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </li>
                            </ul>
                            <div class="remember-me-popup">
                                <div class="remember-me-popup-head" style="display:none">
                                    <h3 id="text2">What's this?</h3>
                                    <a href="#" class="remember-me-popup-close" onclick="showDiv()"
                                        title="Close">Close</a>
                                </div>
                                <div class="remember-me-popup-body" style="display:none">
                                    <p id="text1">Checking "Remember Me" will let you access your shopping cart on this
                                        computer when you are logged out</p>
                                    <div class="remember-me-popup-close-button a-right">
                                        <a href="#" class="remember-me-popup-close button"
                                            title="Close"><span>Close</span></a>
                                    </div>
                                </div>
                            </div>
                            <p class="required">* Required Fields</p>
                            <div class="buttons-set">
                                <button type="submit" class="button login" title="Login" name="send"
                                    id="send2"><span>Login</span></button>

                                <a href="#" class="forgot-word">Forgot Your Password?</a>
                            </div>
                            <!--buttons-set-->
                        </div>
                        <!--content-->
                    </div>
                    <!--col-2 registered-users-->
                </fieldset>
                <!--col2-set-->
            </form>

        </div>
        <!--account-login-->

    </div>
    <!--main-container-->

</div>
@endsection

@push('head')

@endpush

@push('foot')

@endpush