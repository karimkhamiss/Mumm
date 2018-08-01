$('#AddCategory').submit(function (e) {
    var button = $('#AddCategory button[type="submit"]');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url : '/category/add',
        type: 'POST',
        data: $('#AddCategory').serialize(),
        success: function (data) {
            // alert(data);
            $("#AddCategory label.alert").fadeOut();
            button_done(button);
            if(data == 1)
            {
                PrintOnSelector('#AddCategory>div.alert', "Added Successfully");
                $("#AddCategory>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#AddCategory>div.alert', "Unexpected Error Come , Please Try Again");
                $("#AddCategory>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
        },
        error:function(data){
            reload(data);
            // tellme(data)
            var error = data.responseJSON;
            button_done(button);
            $("#AddCategory label.alert").addClass("alert-danger").fadeIn();
            error_handler(
                error["errors"],
                [
                    '#AddCategory #Category_name'
                ],
                [
                    'name'
                ]
            );
        }
    });
});
$(document).on('click','.UpdateCategoryButton',function(){
    var CategoryID = $(this).attr('data-id');
    category_name = $(this).parent().siblings("td#name");
    category_description = $(this).parent().siblings("td#description");
    $("#UpdateCategory input[name='id']").val(CategoryID);
    $("#UpdateCategory input[name='name']").val($.trim(category_name.text()));
    $("#UpdateCategory input[name='description']").val($.trim(category_description.text()));
})
$("#UpdateCategory").submit(function(e){
    var button = $('#UpdateCategory button[type="submit"]');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url:"/category/update",
        type:"Post",
        data:$("#UpdateCategory").serialize(),
        success:function(data){
            button_done(button)
            $("#UpdateCategory label.alert").fadeOut();
            if(data == 1)
            {
                PrintOnSelector('#UpdateCategory>div.alert', "Updated Successfully");
                $("#UpdateCategory>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#UpdateCategory>div.alert', "Unexpected Error Come , Please Try Again");
                $("#UpdateCategory>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }


        },
        error:function(data){reload(data); //tellme(data)
            // alert(data['responseText']);
            var error = data.responseJSON;
            button_done(button);
            $("#UpdateCategory label.alert").addClass("alert-danger").fadeIn();
            error_handler(
                error,
                [   '#UpdateCategory #Category_body',
                ],
                [   'body',
                ]
            );
        }
    });
})
$(document).on('click','.DeleteCategoryButton',function(){
    var CategoryID = $(this).attr("data-id");
    // alert(CategoryID);
    $("#DeleteCategory input[name='id']").val(CategoryID);
})
$("#DeleteCategory").submit(function(e){
    var button = $('#DeleteCategory button');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url:"/category/delete",
        type:"POST",
        data:$("#DeleteCategory").serialize(),
        success:function(data){
            // alert(data);
            // alert(data['responseText']);
            button_done(button);
            $("#DeleteCategory label.alert").fadeOut();
            if(data == 1)
            {
                PrintOnSelector('#DeleteCategory>div.alert', "Deleted Successfully");
                $("#DeleteCategory>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#DeleteCategory>div.alert', "Unexpected Error Come , Please Try Again");
                $("#DeleteCategory>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }


        },
        error:function(data){
            reload(data);
            //tellme(data)
            button_done(button);
            // alert(data['responseText']);
            PrintOnSelector('#DeleteCategory>div.alert', "Cannot Delete This Category");
            $("#DeleteCategory>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                $(this).delay(500).fadeOut(function () {
                    location.reload();
                });
            });
        }
    });
})