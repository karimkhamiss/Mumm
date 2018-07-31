@extends('layouts.dashboard')

@section('style')

@endsection

@section('title')
    Categories
@endsection

@section('tab')
    @include('forms.categories.add')
    @include('forms.categories.update')
    @include('forms.categories.delete')
    @if($user->role_id == 1)
        <button class="AddButton" data-popup="add-category-popup">+</button>
    @endif
    <div role="tabpanel" class="tab-pane text-center active in" id="article"> <!-- Start tab category -->
        <h3 class="section-title text-left">
            Categories
        </h3>
        <div class="col-md-12"> <!-- search category -->
            <div class="col-md-12 filter" id="Players-Filter"></div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 box-lg"> <!-- start Category table -->
            <table id="Players-table" class="text-center list-view">
                <thead> <!-- main row -->
                <tr class="info">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Articles</th>
                    <th>Options</th>
                </tr>
                </thead> <!-- main row -->
                <tbody>
                @foreach($categories as $category)
                    <tr class="danger">
                        <td id="name">{{$category->name}}</td>
                        <td id="description">{{$category->description}}</td>
                        <td>{{sizeof($category->articles)}}</td>
                        <td>
                            <i class="fa fa-pencil-alt white UpdateCategoryButton" data-id="{{$category->id}}" data-popup="update-category-popup"></i>
                            <i class="fa fa-times white DeleteCategoryButton" data-id="{{$category->id}}" data-popup="delete-category-popup"></i>
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

    <script src="{{ asset('Ajax/categories.js')}}"></script>

@endsection