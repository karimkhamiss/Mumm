$('#Signin').submit(function (e) {
    var button = $("#Signin button");
    button_waiting(button);
    e.preventDefault();
    var jsoner = {
        _token: $('#Signin input[name="_token"]').val(),
        username : $('#Signin input[name="username"]').val(),
        password : $('#Signin input[name="password"]').val(),
        remember : $('#Signin input[name="remember"]').val()
    };
    $.ajax({
        url: '/signin',
        type: 'POST',
        dataType: 'Json',
        data: jsoner,
        success:function (data) {
            button_done(button);
            $("#Signin label.alert").fadeOut();
            var auth = data.auth;
            var to_go = data.intended;
            if(auth == true) {
                PrintOnSelector('#Signin>div.alert', "Welcome Back");
                $("#Signin>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(1000).fadeOut(function () {
                        location.href = to_go;
                    });
                });
            }
            else {
                PrintOnSelector('#Signin>div.alert', "Wrong Username Or Password");
                $("#Signin>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                });
            }
        },
        error:function (data) {
            tellme(data);
            button_done(button);
            $("#Signin label.alert").addClass("alert-danger").fadeIn();
            var error = data.responseJSON;
            console.log(error);
            // alert(error[].toSource());
            error_handler(
                error["errors"],
                ['#User_username','#User_password'],
                ["username","password"]
            );
        }
    });
})
