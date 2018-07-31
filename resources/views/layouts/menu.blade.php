<div class="control-panel-menu">
        <div class="menu-items">
            @if($user->role_id == 1)
            <a href="{{ URL::route('admins') }}">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Admins
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('followers') }}">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Followers
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('categories') }}">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Categories
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('articles') }}">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Articles
                </p>
                </div>
            </a>
            @endif
        </div>
</div>