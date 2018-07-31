<!doctype html>
<html>
<head>
    <link rel="icon" href="{{asset('images/logo.png')}}">
    <!-- Css Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" media="all">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/fileinput.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/select.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" media="all">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" media="all">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <style>
        .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default
        {
            color:#8dc73f !important;
            border-color:#8dc73f !important;
        }
        .ui-widget-header,
        .ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight
        {
            background:#8dc73f !important;
            border:0 !important;
            color:#fff !important;
        }
        #loading
        {
            box-shadow: 0px 5px 7px 0px #a8a8a8;
            width:30%;
            height:250px;
            background: #fff;
            z-index:99999999;
            position:fixed;
            top:25%;
            left:35%;
            display: none;
        }
    </style>
    <!-- Css Files -->
    <meta charset="utf-8">
    <title>Mumm - @yield('title')
    </title>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<div class="background"></div>
<div id="loading" class="text-center">
    <img style="margin-top:80px"  src="{{ asset('images/loading.gif') }}" alt="">
</div>
@yield('contents')
<!-- start copyright -->
<footer>
    <div class="container">
        <div class="fl-left" style="line-height: 33px">
            Mumm © 2018
        </div>
        <div class="fl-right">
            <a class="text-white" target="_blank" href="https://www.facebook.com/getmumm/"><i class="fab fa-facebook-f"></i></a>
            <a class="text-white" target="_blank" href="https://www.instagram.com/getmumm/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>
<!-- end copyright-->
@include('layouts.loading')
<!-- Js Files -->
<script src="{{ asset('js/jquery-3.1.0.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js')}}"></script>
<script src="{{ asset('js/wow.min.js')}}"></script>
{{--<script src="{{ asset('js/jquery.nicescroll.min.js')}}"></script>--}}
<script src="{{ asset('js/jquery-ui.js')}}"></script>
<script src="{{ asset('Ajax/error_handler.js') }}"></script>
<script src="{{ asset('js/fileinput.min.js') }}"></script>
<script src="{{ asset('js/html2canvas.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/select.min.js')}}"></script>
<script src="{{ asset('js/print.js')}}"></script>
<script src="{{ asset('js/main.js')}}"></script>
<script>
    new WOW().init();
</script>
<script>
    $('.list-view').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "aaSorting": []
    });
</script>
<script>
    $("input[type=file]").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn green-btn",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
    });
</script>

<script>
    $(".dataTables_filter input").removeClass("form-control input-sm").
    appendTo("#Players-Filter,#Coaches-Filter,#Absences-Filter");
    $(".dataTables_length select").removeClass("form-control input-sm").
    appendTo("#Players-Length,#Coaches-Length,#Managements-Length");
    $("div.dataTables_length label , div.dataTables_filter label").remove();
    $("div.filter input").attr('placeholder','Search ...');

    $(".dataTables_paginate").detach().appendTo(".pagination");
</script>
<script>
    //    $('input[type=date]').datepicker({
    //        // Consistent format with the HTML5 picker
    //        dateFormat: 'yy-mm-dd'
    //    });
</script>
<script>
    function PrePrint(selector) {
        HideElement('body *');
        var item = selector.parent().siblings("div.pdf");
        item.show();
        item.find("table").show();
        item.find("table *").show();
        HideElement('.ignorepdf');
        $("body").append(item);
        document.title = "";
    }
    function PostPrint() {
        location.reload();
    }
    $(document).on('click','button.print',function() {
        PrePrint($(this));
        print();
        PostPrint();
    })

</script>
{{--<script>--}}
{{--//    $("button.print").click(function(){--}}
{{--//        alert("2");--}}
{{--//        $(".ignorepdf").css("display","none");--}}
{{--//        var doc = new jsPDF(--}}
{{--//                {--}}
{{--//                    orientation: 'landscape',--}}
{{--//                    format: 'a4'--}}
{{--//                }--}}
{{--//        );--}}
{{--//        var source = $(this).siblings(".pdf")[0];--}}
{{--//        doc.addHTML(source,function () {--}}
{{--//            doc.output("dataurlnewwindow");--}}
{{--//            $(".ignorepdf").css("display","block");--}}
{{--//            $(".ignorepdf").css("display","grid");--}}
{{--//        });--}}
{{--//--}}
{{--//    });--}}
{{--</script>--}}
@yield('script')
<script>
    $(".notification-icon").click(function(){
        $.ajax({
            url:"/notifications/read",
            success:function(data){
                $(".dropdown .number").text(0).fadeOut();
            },
            error:function(data){
                //tellme(data)
            }
        });
    })
</script>
</body>
</html>