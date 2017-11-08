<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Baner Creator &trade;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>

    <link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="shortcut icon" href="/zmaj.png" type="image/x-icon">

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

    <!-- Lightbox -->
    <script type="text/javascript" src="js/lightbox.js"></script>
    <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>

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
            position: relative;
            position-fixed: bottom;
            left: 0px;
            bottom: 0px;
            width: 100%;
            text-align: center;

        }

    </style>
</head>
<body>

<nav  class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">BanerCreator</a>
        </div>
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="active"><a href="#"></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item"><a class="navbar-brand nav-link" href="{{url('makeown')}}">Send us .csv</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer id='footer'>
    @include('layouts.footer')
</footer>
</body>
</html>
