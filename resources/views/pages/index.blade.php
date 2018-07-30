@extends('layouts.master')

@section('style')
    <style>
        header
        {
            background: url("images/header.jpg");
            background-size:cover;
            height: 677px;
            color:#fff;
        }
        header div.caption
        {
            padding-top: 150px;
        }
        h1
        {
            font-weight: 700;
        }
        p
        {
            font-size:19px
        }
        img
        {
            margin:20px 0;
        }
    </style>
@endsection

@section('title')
    Home
@endsection
<header>
    <div class="text-center">
    <img src="images/logo_white.png" width="200" alt="">
    </div>
    <div class="container">
        <div class="caption">
        <h1>Welcome to Mumm Blog</h1>
        <p>We care about our clients feedbacks <br>Checkout our daily articles and give us your comments.</p>
        <div>
            <button class="yellow-btn">
                Create Free Account
            </button>
            <button class="yellow-btn">
                Sign in
            </button>
        </div>
        </div>
    </div>
</header>
@section('contents')


@endsection

@section('script')

@endsection