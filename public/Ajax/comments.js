$('#AddComment').submit(function (e) {
    var button = $('#AddComment button[type="submit"]');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url : '/comment/add',
        type: 'POST',
        data: $('#AddComment').serialize(),
        success: function (data) {
            alert(data);
            $("#AddComment label.alert").fadeOut();
            button_done(button);
            if(data == 1)
            {
                PrintOnSelector('#AddComment>div.alert', "Published Successfully");
                $("#AddComment>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#AddComment>div.alert', "Unexpected Error Come , Please Try Again");
                $("#AddComment>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(1000).fadeOut(function () {
                        location.reload();
                    });
                });
            }
        },
        error:function(data){
            // reload(data);
            tellme(data)
            var error = data.responseJSON;
            button_done(button);
            $("#AddComment label.alert").addClass("alert-danger").fadeIn();
            error_handler(
                error["errors"],
                [
                    '#AddComment #Comment_body'
                ],
                [
                    'body'
                ]
            );
        }
    });
});