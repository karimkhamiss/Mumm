@extends('layouts.dashboard')

@section('style')

@endsection

@section('title')
    Followers
@endsection

@section('tab')
    @include('forms.followers.delete')
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab pricing -->
        <h3 class="section-title text-left">
            Followers
        </h3>
        <div class="col-md-12"> <!-- search follower -->
            <div class="col-md-12 filter" id="Players-Filter"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 box-lg"> <!-- start Follower table -->
            <table id="Players-table" class="text-center list-view">
                <thead> <!-- main row -->
                <tr class="info">
                    <th>Name</th>
                    <th>Join Date</th>
                    <th>Options</th>
                </tr>
                </thead> <!-- main row -->
                <tbody>
                @foreach($followers as $follower)
                    <tr class="danger">
                        <td>{{$follower->name}}</td>
                        <td>{{$follower->date}}</td>
                        <td>
                            <i class="fa fa-times white DeleteFollowerButton" data-id="{{$follower->id}}" data-popup="delete-follower-popup"></i>
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

    <script src="{{ asset('Ajax/followers.js')}}"></script>

@endsection