<form id="AddComment">
    {!! csrf_field() !!}
    <input type="hidden" name="article_id" value="{{$article->id}}">
    @if(!\Illuminate\Support\Facades\Auth::check())
    <div class="col-md-12">
        <input type="text" name="visitor_name" placeholder="Name[Optional]">
    </div>
    @endif
    <div class="col-md-12">
        <textarea name="body" placeholder="Comment"></textarea>
        <label class="alert" id="Comment_body"></label>
    </div>
    <div class="col-xs-12 text-center">
        <button type="submit" class="yellow-btn">
            Publish
        </button>
    </div>
    <div class="clearfix"></div>
    <div class="alert"></div>
    <div class="clearfix"></div>
</form>