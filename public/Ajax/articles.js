$(function () {
    $("div.filter select[name='category_id']").change(function(){
        var category_id = $(this).val();
        var category_name = $("div.filter select[name='category_id'] option[value='"+category_id+"']").text();
        $(".articles .article .category").each(function(){
            if ($(this).text().search(new RegExp(category_name, "i")) < 0) {
                $(this).parent().parent().hide(400);
            } else {
                $(this).parent().parent().show(400);
            }
        });    });
    $('#AddArticle').submit(function (e) {
        var button = $('#AddArticle button[type="submit"]');
        button_waiting(button);
        e.preventDefault();
        $.ajax({
            url : '/article/add',
            type: 'POST',
            data : new FormData(this),
            contentType: false,
            cache      : false,
            processData: false,
            success: function (data) {
                // alert(data);
                $("#AddArticle label.alert").fadeOut();
                button_done(button);
                if(data == 0)
                {
                    PrintOnSelector('#AddArticle>div.alert', "Unexpected Error Come , Please Try Again");
                    $("#AddArticle>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                        $(this).delay(500).fadeOut(function () {
                            location.reload();
                        });
                    });

                }
                else {
                    // $(".articles").prepend(data);
                    // closePopup()
                    PrintOnSelector('#AddArticle>div.alert', "Article Published Successfully");
                    $("#AddArticle>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                        $(this).delay(500).fadeOut(function () {
                            location.reload();
                        });
                    });
                }
            },
            error:function(data){reload(data);
            tellme(data)
                var error = data.responseJSON;
                button_done(button);
                $("#AddArticle label.alert").removeClass("alert-success").addClass("alert-danger").fadeIn();
                error_handler(
                    error,
                    [
                        '#AddArticle #Article_title',
                        '#AddArticle #Article_body',
                        '#AddArticle #Article_category_id',
                    ],
                    [
                        'title',
                        'body',
                        'category_id',
                    ]
                );
            }
        });
    });
        });