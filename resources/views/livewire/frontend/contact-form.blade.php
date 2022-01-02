<div class="content">
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2 style="color:white;">Contact Us </h2>
                    </div>
                </div>
                <!--col-xs-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </div>
    <div class="main-container col1-layout" style="visibility: visible;">
        <div class="main">
            <div class="account-login container">
<form wire:submit.prevent="submit" >
                    <fieldset class="col2-set">
                        <div class="col-1 new-users">
                            <div class="content">
                                <ul class="form-list">
                                    <li>
                                        <label for="name" style="color: white">Name<em class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="text" 
                                                value="" id="name" class="input-text required-entry" title="Full name"
                                                wire:model="name">
                                        </div>
                                        @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </li>
                                    <li>
                                    <label for="email" style="color: white">Email Address<em
                                                class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="email"
                                                value="" id="email" class="input-text required-entry validate-email"
                                                title="Email Address" wire:model="email">
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-2 registered-users">
                            <div class="content">
                                <ul class="form-list">
                                    
                                    <li>
                                        <label for="phone" style="color: white">Phone number<em
                                                class="required">*</em></label>
                                        <div class="input-box">
                                            <input style="color: red; background-color:white;" type="text" 
                                                class="input-text required-entry" id="pass" title="Phone"
                                                wire:model="phone">
                                            @error('phone')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </li>
                                    <li>
                                    <label for="phone" style="color: white">Message<em
                                                class="required">*</em></label>
                                        <div class="input-box">
                                            <textarea style="color: red; background-color:white;"
                                                class="w-full mt-1 form-control form-textarea" rows="4" cols="50" id="pass" title="Short Message"
                                                wire:model="shortmsg"></textarea>
                                            @error('shortmsg')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
</li>
                                </ul>
                                <p class="required">* Required Fields</p>
                                <div class="buttons-set">
                                    <button type="submit" class="button login" title="Submit"><span>Send Us Message</span></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
</div>
</div>
</div>
