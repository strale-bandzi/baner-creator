<div class='form-group col-xs-6'>

    {!! Form::label('btntext', 'Your text here:') !!}
    {!! Form::text('btntext', '', ['class'=>'form-control', 'id'=>'nosam'])!!}

    <br>

    {!! Form::label('btnColor', 'Select button color') !!}

    {!! Form::select('btnColor', [
    '#fff'=> 'White',
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

    {!! Form::label('btnTextColor', 'Select button text color') !!}

    {!! Form::select('btnTextColor', [
    '#fff'=> 'White',
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
    {!! Form::submit('Confirm', ['class'=>'btn btn-info']) !!}

    {!! Form::close() !!}
</div>
<script>

    $('select[name="btnTextColor"]').simplecolorpicker({theme: 'fontawesome'});
    $('select[name="btnColor"]').simplecolorpicker({theme: 'fontawesome'});

</script>