<div id="delete-admin-popup" class="popup"> <!-- add-client-popup -->
    <i class="fa fa-times gray" data-toggle="tooltip" data-placement="right" title="Close"></i>

    <div class="popup-content">
        <form id="DeleteAdmin" method="POST" class="text-center" action="">
            {!! csrf_field() !!}
            <input type="text"  name="id" class="hidden">
            <h3 class="popup-title">
                Are You Sure You Want Delete This Admin?
            </h3>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">Delete Admin</button>
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>

        </form>
    </div>

</div>
