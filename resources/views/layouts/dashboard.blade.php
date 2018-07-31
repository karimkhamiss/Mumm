@extends('layouts.master')
@section('style')
@endsection

@section('title')
    Control Panel
@endsection

@section('contents')
    <div id="control-panel" class="control-panel"> <!-- Star Control Panel -->
        <div>
            @if($user)
            @include('layouts.panelheader')
        @if($user->role_id == 1)
            @include('layouts.menu')
            @endif
            @endif
            <div class="container-fluid">
                <div class="tab-content">
                    @yield('tab')
                </div>


            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>

    </script>
@endsection




