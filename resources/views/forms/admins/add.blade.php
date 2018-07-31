<div id="add-admin-popup" class="popup">
    <i class="fa fa-times" data-toggle="tooltip" data-placement="right" title="Close"></i>
    <h3 class="popup-title">
        Add New Admin
    </h3>
    <div class="popup-content">
        <form id="AddAdmin" class="text-center">
            {!! csrf_field() !!}
            <div class="col-md-6 col-xs-12">
                <input type="text" name="first_name" placeholder="First Name">
                <label class="alert" id="User_first_name"></label>
            </div>
            <div class="col-md-6 col-xs-12">
                <input type="text" name="last_name" placeholder="Last Name">
                <label class="alert"  id="User_last_name"></label>
            </div>
            <div class="col-md-6 col-xs-12">
                <input type="text" name="username" placeholder="Username">
                <label class="alert" id="User_username"></label>
            </div>
            <div class="col-md-6 col-xs-12">
                <input type="password" name="password" placeholder="Password">
                <label class="alert"  id="User_password"></label>
            </div>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">
                    Add Admin
                </button>
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>
        </form>
    </div>

</div>