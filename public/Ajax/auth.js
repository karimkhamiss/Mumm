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
                    $(this).delay(500).fadeOut(function () {
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
            reload(data);
            // tellme(data);
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
$('#Signup').submit(function (e) {
    var button = $('#Signup button[type="submit"]');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url : '/signup',
        type: 'POST',
        data: $('#Signup').serialize(),
        success: function (data) {
            $("#Signup label.alert").fadeOut();
            button_done(button);
            if(data)
            {
                PrintOnSelector('#Signup>div.alert', "Account Created Successfully");
                $("#Signup>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(500).fadeOut(function () {
                        location.href = "/dashboard"
                    });
                });
            }
            else {
                PrintOnSelector('#Signup>div.alert', "Unexpected Error Come , Please Try Again");
                $("#Signup>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
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
            $("#Signup label.alert").addClass("alert-danger").fadeIn();
            error_handler(
                error["errors"],
                [
                    '#Signup #User_first_name',
                    '#Signup #User_last_name',
                    '#Signup #User_username',
                    '#Signup #User_password'
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

