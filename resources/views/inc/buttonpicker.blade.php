<link rel="stylesheet" href="css/style.css"/>
<div class='form-group col-xs-8'>
    <p>
        {!! Form::label('button', 'Blue') !!}
        {!! Form::radio('button', 'blueAndWhite')!!}
        <img src="/template/button1.png"/>
    </p>
    <p>
        {!! Form::label('button', 'Green') !!}
        {!! Form::radio('button', 'greenAndWhite')!!}
        <img src="/template/button2.png"/>
    </p>
    <p>
        {!! Form::label('button', 'White') !!}
        {!! Form::radio('button', 'whiteAndGreen')!!}
        <img src="/template/button3.png"/>
    </p>
    <br>
</div>

<script>
    $(document).ready(function () {
        $("form button").click(function () {
            $('form button').removeClass('active');
            $(this).addClass('active');
        });
    });

</script>