<div class="container">
    <div class='form-group col-xs-6'>

        {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','files'=>true, 'id'=>'upload']) !!}

        <p>
            {!! Form::label('bannertemplate', 'Leaderboard (728x90)') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-car') !!}
            <img src="/template/leaderboard.jpg" alt="leaderboard.jpg"/>
        </p>

        <p>
            {!! Form::label('bannertemplate', 'Leaderboard (728x90)') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-airplane')!!}
            <img src="/template/airplane.jpg" alt="rectangle.jpg"/>
        </p>

    </div>
</div>

<style type="text/css">
    .bs-example{
        margin: 20px;
    }
</style>