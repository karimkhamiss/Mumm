<div id="sign-in-popup" class="popup">
    <i class="fa fa-times" data-toggle="tooltip" data-placement="right" title="Close"></i>
    <h3 class="popup-title">
        Back to account
    </h3>
    <div class="popup-content">
        <form id="Signin" class="text-center">
            {!! csrf_field() !!}
            <div class="col-xs-12">
                <input type="text" name="username" placeholder="Username">
                <label class="alert" id="User_username"></label>
            </div>
            <div class="col-xs-12">
                <input type="password" name="password" placeholder="Password">
                <label class="alert"  id="User_password"></label>
            </div>
            <div style="padding:10px 20px;">
                <div class="text-center fl-left">
                    <input name="remember" id="rememeber" class="fl-left" type="checkbox">
                    <label for="rememeber" class="fl-left" style="margin-left:2px;font-size:14px;">Remember Me</label>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">
                    Sign in
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>
        </form>
    </div>

</div>