<div id="delete-follower-popup" class="popup"> <!-- add-client-popup -->
    <i class="fa fa-times gray" data-toggle="tooltip" data-placement="right" title="Close"></i>

    <div class="popup-content">
        <form id="DeleteFollower" method="POST" class="text-center" action="">
            {!! csrf_field() !!}
            <input type="text"  name="id" class="hidden">
            <h3 class="popup-title">
                Are You Sure You Want Delete This Follower?
            </h3>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">Delete Follower</button>
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>

        </form>
    </div>

</div>
