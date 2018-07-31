@extends('layouts.dashboard')

@section('style')

@endsection

@section('title')
    Articles
@endsection

@section('tab')
    @if($user->role_id == 1)
        <button class="AddButton" data-popup="add-article-popup">+</button>
    @endif
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab pricing -->
        <h3 class="section-title text-left">
            Articles
        </h3>
    </div>
@endsection
@section('script')

    <script src="{{ asset('Ajax/articles.js')}}"></script>

@endsection