<div class="header">
    <div class="container">
        <a href="/dashboard" class="fl-left bold text-white">
            <img src="images/logo.png" alt="">
        </a>
        <div class="fl-right">
            <li class="dropdown user-info">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                   aria-haspopup="true" aria-expanded="false">
                    <img src="@if($user->picture){{$user->picture}}@else images/user.jpg @endif" width="40" height="40" class="img-circle fl-left">
                    <p class="fl-left bold text-dark" style="line-height: 40px;margin-left: 10px">

                        {{$user->first_name}}
                        <span class="caret"></span>
                    </p>
                    </a>
                <ul class="dropdown-menu">
                    <li><a href="/">Home Page</a></li>
                    <li><a href="{{ URL::route('settings') }}">Settings</a></li>
                    <li><a href="{{ URL::route('signout') }}">Signout</a></li>
                </ul>
            </li>
        </div>
    </div>
</div>