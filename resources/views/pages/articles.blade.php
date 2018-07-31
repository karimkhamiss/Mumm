@extends('layouts.dashboard')

@section('style')
    <style>
        .articles
        {
            text-align: center;
        }
        .articles .article
        {
            display: inline-block;
            width: 25%;
            margin: 2%;
            box-shadow: 0 1px 5px 1px #bbb;
            padding: 10px;
        }
        .articles .article h4.title
        {
            font-size: 26px;
        }
        .articles .article h5.category
        {
            color:#555;
        }
        .articles .article
        {

        }
        .articles .article
        {

        }
    </style>
@endsection

@section('title')
    Articles
@endsection

@section('tab')
    @include('forms.articles.add')
    @if($user->role_id == 1)
        <button class="AddButton" data-popup="add-article-popup">+</button>
    @endif
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab pricing -->
        <h3 class="section-title text-left">
            Articles
        </h3>
        <div class="articles">
            @foreach($articles as $article)
            <div class="article">
                <div class="image">
                    <img src="{{$article->cover}}" alt="">
                </div>
                <div class="caption">
                    <h3 class="title">{{$article->title}}</h3>
                    <h5 class="category">{{$article->category->name}}</h5>
                    <a href="/article/{{$article->id}}">
                        <button class="yellow-btn">Read More</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ asset('Ajax/articles.js')}}"></script>

@endsection