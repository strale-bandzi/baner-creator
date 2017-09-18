{{--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>--}}
<script type="text/javascript" src="js/lightbox.js"></script>
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen"/>

<div class="container">

        @foreach($images as $img)

            <a href="images/csv/{{Session::get('imageName')}}" data-lightbox="{{Session::get('imageName')}}">Click to see images</a>

        @endforeach

</div>

<script>

    $(document).ready(function () {

        lightbox.option({
            'resizeDuration': 200,
            'maxWidth': 728,
            'wrapAround': true
        });

    });
</script>