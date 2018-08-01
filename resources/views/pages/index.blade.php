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
            padding-top: 220px;
        }
        h1
        {
            font-weight: 700;
        }
        p
        {
            font-size:20px;
            line-height: 1.65;
        }
        img
        {
            /*margin:20px 0;*/
        }
    </style>
@endsection

@section('title')
    Home
@endsection
@section('contents')
    @include('forms.auth.signin')
    @include('forms.auth.signup')
    <header>
        <div class="container">
            <div class="caption">
                <h1>Welcome to MUMM Blog</h1>
                <p>We care about our clients feedbacks <br>Checkout our daily articles and give us your comments.</p>
                <div>
                    <button class="yellow-btn" data-popup="sign-up-popup">
                        Create Free Account
                    </button>
                    <button class="yellow-btn" data-popup="sign-in-popup">
                        Sign in
                    </button>
                </div>
                <div>
                    <a href="/articles">
                    <button style="margin-left: 45px;" class="yellow-btn">
                        Try Without Registration?
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('script')
    <script src="{{ asset('Ajax/auth.js') }}"></script>
@endsection