<div id="update-category-popup" class="popup"> <!-- update-player-popup -->
    <i class="fa fa-times gray" data-toggle="tooltip" data-placement="right" title="Close"></i>

    <div class="popup-content"> <!-- start popup-content -->
        <form id="UpdateCategory"method="POST" class="text-center" action="">
            <input type="hidden" name="id">
            <h3 class="popup-title">
                Update Category
            </h3>
            {!! csrf_field() !!}
            <div class="col-md-12"> <!-- player name -->
                <input type="text" name="name" placeholder="Name"/>
                <label class="alert" id="Category_name"></label>
            </div>
            <div class="col-md-12">
                <input type="text" name="description" placeholder="Description[optional]"/>
            </div>
            <div class="clearfix"></div>
            <div class="col-xs-12">
                <button type="submit" class="yellow-btn">Update Category</button>
            </div>
            <div class="clearfix"></div>
            <div class="alert"></div>
            <div class="clearfix"></div>

        </form>
    </div> <!-- end popup content -->

</div> <!-- update-Category-popup -->
