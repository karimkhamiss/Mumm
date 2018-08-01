$('#AddAdmin').submit(function (e) {
    var button = $('#AddAdmin button[type="submit"]');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url : '/admin/add',
        type: 'POST',
        data: $('#AddAdmin').serialize(),
        success: function (data) {
            $("#AddAdmin label.alert").fadeOut();
            button_done(button);
            if(data)
            {
                PrintOnSelector('#AddAdmin>div.alert', "Admin Added Successfully");
                $("#AddAdmin>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#AddAdmin>div.alert', "Unexpected Error Come , Please Try Again");
                $("#AddAdmin>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
        },
        error:function(data){
            reload(data);
            // tellme(data);
            var error = data.responseJSON;
            button_done(button);
            $("#AddAdmin label.alert").addClass("alert-danger").fadeIn();
            error_handler(
                error["errors"],
                [
                    '#AddAdmin #User_first_name',
                    '#AddAdmin #User_last_name',
                    '#AddAdmin #User_username',
                    '#AddAdmin #User_password'
                ],
                [
                    'first_name',
                    'last_name',
                    'username',
                    'password'
                ]
            );
        }
    });
});
$(document).on('click','.DeleteAdminButton',function(){
    var AdminID = $(this).attr("data-id");
    // alert(AdminID);
    $("#DeleteAdmin input[name='id']").val(AdminID);
})
$("#DeleteAdmin").submit(function(e){
    var button = $('#DeleteAdmin button');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url:"/admin/delete",
        type:"POST",
        data:$("#DeleteAdmin").serialize(),
        success:function(data){
            // alert(data);
            // alert(data['responseText']);
            button_done(button);
            $("#DeleteAdmin label.alert").fadeOut();
            if(data == 1)
            {
                PrintOnSelector('#DeleteAdmin>div.alert', "Admin Deleted Successfully");
                $("#DeleteAdmin>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#DeleteAdmin>div.alert', "Unexpected Error Come , Please Try Again");
                $("#DeleteAdmin>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.reload();
                    });
                });
            }


        },
        error:function(data){reload(data);
            tellme(data)
            button_done(button);
            // alert(data['responseText']);
            PrintOnSelector('#DeleteAdmin>div.alert', "Cannot Delete This Admin");
            $("#DeleteAdmin>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                $(this).delay(500).fadeOut(function () {
                    location.reload();
                });
            });
        }
    });
})