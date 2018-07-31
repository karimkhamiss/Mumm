@extends('layouts.dashboard')

@section('style')
    <style>
        .article .content
        {
            padding: 20px;
        }
        .article .title
        {
            font-size: 30px;
            font-weight: 700;
        }
        .article .info i
        {
            width: auto;
            height: auto;
            line-height: normal;
            margin: 0;
            margin-right:10px;
            background: none;
            color:#888;
        }
        .article .info span
        {
            color:#888;
            margin: 20px 0;
            margin-right: 15px;
            margin-bottom: 30px;
            font-size: 15px;
        }
        .article
        {

        }
    </style>
@endsection

@section('title')
    {{$article->title}}
@endsection

@section('tab')
    @include('forms.articles.update')
    @include('forms.articles.delete')
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab pricing -->
        <div class="article">
            <div class="article-image">
                @if($article->cover)
                    <img style="width: 95%;height: 500px" src="{{$article->cover}}" alt="">
                @else
                    <div style="width: 100%;height: 500px;background: #ddd;"></div>
                @endif
            </div>
            <div class="content text-left">
            <h3 class="title text-left">{{$article->title}}</h3>
                <div class="info">
                    <span><i class="fa fa-clock"></i> {{$article->date}}</span>
                    <span><i class="fa fa-user"></i> {{$article->user->name}}</span>
                    <span><i class="fa fa-folder"></i> {{$article->category->name}}</span>
                    <span><i class="fa fa-comments"></i> {{sizeof($article->comments)}} Comments</span>
                </div>
                <p class="lead">
                    {{$article->body}}
                </p>
            </div>
            <div class="comments">
                @foreach($article->comments as $comment)

                @endforeach

            </div>
            <div class="leave-comment text-left">
                <h3>Feel Free to Give Us Your Feedback</h3>
                @include('forms.comments.add')
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ asset('Ajax/articles.js')}}"></script>
    <script src="{{ asset('Ajax/comments.js')}}"></script>

@endsection