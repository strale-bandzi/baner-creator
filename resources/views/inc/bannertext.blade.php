<div class='form-group col-xs-6'>

    {!! Form::label('banertext', 'Insert your main text ') !!}

    {!! Form::text('banertext' , '', ['class'=>'form-control'])!!}

    <br>

    {!! Form::label('textColor', 'Main txt color: ') !!}

    {!! Form::select('textColor', [
    '#ffffff'=>'White',
    '#000000'=>'Black',
    '#534992'=> 'Indigo',
    '#5484ed'=>'Bold blue',
    '#a4bdfc'=>'Blue',
    '#46d6db'=>'Turquoise',
    '#7ae7bf'=>'Light green',
    '#51b749'=>'Bold green',
    '#fbd75b'=>'Yellow',
    '#ffb878'=>'Orange',
    '#ff887c'=>'Red',
    '#dc2127'=>'Bold red',
    '#dbadff'=>'Purple',
    '#e1e1e1'=>'Gray'
    ]) !!}

    <br>

    {!! Form::label('banertextFollow', 'Insert your following text') !!}

    {!! Form::text('banertextFollow' , '', ['class'=>'form-control', 'placeholder'=>'Following text goes here'])!!}


    <br>

    {!! Form::label('banertextFollow2', 'Insert your second following text') !!}

    {!! Form::text('banertextFollow2' , '', ['class'=>'form-control', 'placeholder'=>'Following text goes here'])!!}


    <br>

    {!! Form::label('FtextColor', 'Follow txt color: ') !!}

    {!! Form::select('FtextColor', [
    '#ffffff'=>'White',
    '#000000'=>'Black',
    '#534992'=> 'Indigo',
    '#5484ed'=>'Bold blue',
    '#a4bdfc'=>'Blue',
    '#46d6db'=>'Turquoise',
    '#7ae7bf'=>'Light green',
    '#51b749'=>'Bold green',
    '#fbd75b'=>'Yellow',
    '#ffb878'=>'Orange',
    '#ff887c'=>'Red',
    '#dc2127'=>'Bold red',
    '#dbadff'=>'Purple',
    '#e1e1e1'=>'Gray'
    ]) !!}

</div>

<script>

    $('select[name="textColor"]').simplecolorpicker({theme: 'glyphicons'});

    $('select[name="FtextColor"]').simplecolorpicker({theme: 'glyphicons'});

</script>
<style>

    select {
        background-color: #2A3F54;
    }
</style>