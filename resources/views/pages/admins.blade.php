@extends('layouts.dashboard')

@section('style')

@endsection

@section('title')
    Admins
@endsection

@section('tab')
    @include('forms.admins.add')
    @include('forms.admins.delete')
    @if($user->role_id == 1)
        <button class="AddButton" data-popup="add-admin-popup">+</button>
    @endif
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab pricing -->
        <h3 class="section-title text-left">
            Admins
        </h3>
        <div class="col-md-12"> <!-- search admin -->
            <div class="col-md-12 filter" id="Players-Filter"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 box-lg"> <!-- start Admin table -->
            <table id="Players-table" class="text-center list-view">
                <thead> <!-- main row -->
                <tr class="info">
                    <th>Name</th>
                    <th>Articles</th>
                    <th>Options</th>
                </tr>
                </thead> <!-- main row -->
                <tbody>
                @foreach($admins as $admin)
                    <tr class="danger">
                        <td>{{$admin->name}}</td>
                        <td>{{sizeof($admin->articles)}}</td>
                        <td>
                            @if($admin->id != $user->id)
                            <i class="fa fa-times white DeleteAdminButton" data-id="{{$admin->id}}" data-popup="delete-admin-popup"></i>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table> <!-- table -->
        </div> <!-- end players table -->
        <div class="text-center pagination">

        </div>
    </div>
@endsection
@section('script')

    <script src="{{ asset('Ajax/admins.js')}}"></script>

@endsection