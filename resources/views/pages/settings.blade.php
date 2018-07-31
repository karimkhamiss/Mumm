@extends('layouts.dashboard')

@section('style')

    <style>
        #control-panel .tab-content
        {
            padding-top: 0 !important;
        }
        .nav-tabs.settings
        {
            margin-bottom: 30px !important;
            text-align: center;
        }
        .nav-tabs.settings li
        {
            text-align: center;
        }
        .nav-tabs.settings li span
        {
            margin-bottom: 10px;
        }
        .nav-tabs>li
        {
            display: inline-block;
            float: none;
        }
    </style>
@endsection

@section('title')
    Settings
@endsection

@section('tab')
    <ul class="nav nav-tabs settings" role="tablist"> <!-- start Nav -->
        <li class="active" role="presentation">
            <a href="#Info" aria-controls="settings" role="tab" data-toggle="tab">
                <p class="text-yellow bold" style="margin-top: 5px">Update Info</p>
            </a>
        </li>
        <li class="" role="presentation">
            <a href="#Picture" aria-controls="settings" role="tab" data-toggle="tab">
                <p class="text-yellow bold" style="margin-top: 5px">Update Picture</p>
            </a>
        </li>
        <li role="presentation">
            <a href="#Password" aria-controls="settings" role="tab" data-toggle="tab">
                <p class="text-yellow bold" style="margin-top: 5px">Update Password</p>
            </a>
        </li>
    </ul> <!-- End Nav -->
    <div id="settings">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active fade in" id="Info">
                <form id="UpdateInfo">
                    {!! csrf_field() !!}
                    <div class="col-md-12 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">First Name</label>
                        <input type="text" name="first_name" value="{{$user->first_name}}">
                        <label class="alert" id="User_first_name"></label>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">Last Name</label>
                        <input type="text" name="last_name" value="{{$user->last_name}}">
                        <label class="alert" id="User_last_name"></label>
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">Username</label>
                        <input type="text" name="username" value="{{$user->username}}">
                        <label class="alert" id="User_username"></label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="alert text-center"></div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button class="yellow-btn">Update</button>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="Password">
                <form id="UpdatePassword">
                    {!! csrf_field() !!}

                    <div class="col-md-12 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">Old Password</label>
                        <input type="password" name="old_password" value="">
                        <label class="alert" id="User_old_password"></label>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">New Password</label>
                        <input type="password" name="password" value="">
                        <label class="alert" id="User_password"></label>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <label class="text-left" style="margin-left: 15px;">Password Confirm</label>
                        <input type="password" name="password_confirmation" value="">
                        <label class="alert" id="User_password_confirm"></label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="alert text-center"></div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button class="yellow-btn">Update</button>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane fade in" id="Picture">
                <form enctype="multipart/form-data" id="UpdatePicture">
                    {!! csrf_field() !!}

                    <div class="text-center">
                        @if($user->picture)
                            <img  src="{{$user->picture}}" width="300"/>
                        @else
                            <img src="images/user.jpg" width="300"/>
                        @endif
                        <input type="file" name="picture" id="Picture">
                        <label class="alert" id="User_picture"></label>
                    </div>
                    <div class="clearfix"></div>
                    <div class="alert text-center"></div>
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <button class="yellow-btn">Update</button>
                    </div>
                </form>
            </div>

        </div>


    </div>
@endsection
@section('script')

    <script src="{{ asset('Ajax/settings.js')}}"></script>

@endsection