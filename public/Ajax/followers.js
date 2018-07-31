$(document).on('click','.DeleteFollowerButton',function(){
    var FollowerID = $(this).attr("data-id");
    // alert(FollowerID);
    $("#DeleteFollower input[name='id']").val(FollowerID);
})
$("#DeleteFollower").submit(function(e){
    var button = $('#DeleteFollower button');
    button_waiting(button);
    e.preventDefault();
    $.ajax({
        url:"/follower/delete",
        type:"POST",
        data:$("#DeleteFollower").serialize(),
        success:function(data){
            // alert(data);
            // alert(data['responseText']);
            button_done(button);
            $("#DeleteFollower label.alert").fadeOut();
            if(data == 1)
            {
                PrintOnSelector('#DeleteFollower>div.alert', "Follower Deleted Successfully");
                $("#DeleteFollower>div.alert").removeClass("alert-danger").addClass("alert-success").fadeIn(function () {
                    $(this).delay(1000).fadeOut(function () {
                        location.reload();
                    });
                });
            }
            else {
                PrintOnSelector('#DeleteFollower>div.alert', "Unexpected Error Come , Please Try Again");
                $("#DeleteFollower>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                    $(this).delay(1000).fadeOut(function () {
                        location.reload();
                    });
                });
            }


        },
        error:function(data){reload(data);
            //tellme(data)
            button_done(button);
            // alert(data['responseText']);
            PrintOnSelector('#DeleteFollower>div.alert', "Cannot Delete This Follower");
            $("#DeleteFollower>div.alert").removeClass("alert-success").addClass("alert-danger").fadeIn(function () {
                $(this).delay(1000).fadeOut(function () {
                    location.reload();
                });
            });
        }
    });
})