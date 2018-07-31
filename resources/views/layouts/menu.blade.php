<div class="control-panel-menu">
        <div class="menu-items">
            @if($user->role_id == 1)
            <a href="{{ URL::route('admins') }}" class=" @if($page == "admins") active @endif">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Admins
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('followers') }}" class=" @if($page == "followers") active @endif">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Followers
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('categories') }}" class=" @if($page == "categories") active @endif">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Categories
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('articles') }}" class=" @if($page == "articles") active @endif">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Articles
                </p>
                </div>
            </a>
            @endif
            @if($user->role_id == 1)
            <a href="{{ URL::route('settings') }}" class=" @if($page == "settings") active @endif">
                <div class="menu-item text-center">
                <i class="fa fa-home"></i>
                <p class="text-dark-grey">
                    Settings
                </p>
                </div>
            </a>
            @endif
        </div>
</div>