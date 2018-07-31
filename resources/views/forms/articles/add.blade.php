<div id="add-article-popup" class="popup"> <!-- add-player-popup -->
    <i class="fa fa-times gray" data-toggle="tooltip" data-placement="right" title="Close"></i>
    <div class="popup-content">
        <form id="AddArticle" method="POST" class="text-center"   enctype="multipart/form-data">
            <h3 class="popup-title">
                Publish New Article
            </h3>
            {!! csrf_field() !!}
            <div class="col-xs-12">
                <input placeholder="Article Title" name="title">
                <label class="alert" id="Article_title"></label>
            </div>
            <div class="col-xs-12">
                <textarea placeholder="What do you want to say ?" name="body"></textarea>
                <label class="alert" id="Article_body"></label>
            </div>
            <div class="col-xs-12">
                <select title="Assign Gategory" name="category_id" class="selectpicker" data-show-subtext="true" data-live-search="true">
                    <option value="">Assign Gategory</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                </select>
                <label class="alert" id="Article_category_id"></label>
            </div>
            <div class="col-xs-12 text-left">
                <label >Cover Photo</label>
                <input type="file" name="picture">
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">Publish</button>
            </div>
        </form>
    </div>
</div>