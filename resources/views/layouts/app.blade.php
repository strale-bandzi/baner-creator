<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Baner Creator &trade;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="stylesheet" href="https://bootswatch.com/darkly/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="/delije.jpg" type="image/x-icon">

    <!--COLOR PICKERR -->

    <link href="css/jquery.simplecolorpicker.css" rel="stylesheet"/>
    <link href="css/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet"/>
    <link href="css/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet"/>
    <link href="css/jquery.simplecolorpicker-regularfont.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.simplecolorpicker.js"></script>

    <!-- COLOR PICKER ENDS HERE -->

    <link rel="stylesheet" href="css/bootswizard.css"/>
    <link rel="stylesheet" href="css/style.css"/>

     <!--JCROP -->
    <script src="js/Jcrop.js"></script>
    <link rel="stylesheet" href="css/Jcrop.css" type="text/css">

    <script type="text/javascript">
        $(document).ready(function () {

            $(".accordion .accord-header").click(function () {
                if ($(this).next("div").is(":visible")) {
                    $(this).next("div").slideUp("slow");
                } else {
                    $(".accordion .accord-content").slideUp("slow");
                    $(this).next("div").slideToggle("slow");
                }
            });

        });

    </script>
    <style>

        #footer {
            position: absolute;
            position-fixed: bottom;
            left: 0px;
            bottom: 0px;
            width: 100%;
            text-align: center;

        }

    </style>
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="/" class="navbar-brand">BanerCreator</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{url('makeown')}}">or Send us csv data </a></li>

            </ul>

        </div>
    </div>
</div>

@yield('content')

<footer id='footer'>
    @include('layouts.footer')
</footer>
</body>
</html>
