<div class="container">
    <div class='form-group col-xs-6'>


        {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','files'=>true, 'id'=>'upload']) !!}

        <p>
            {!! Form::label('bannertemplate', 'Leaderboard (468x58)') !!}
            {{Form::radio('bannertemplate', 'Leaderboard')}}
            <img src="/template/leaderboard.jpg" alt="leaderboard.jpg"/>
        </p>


        <p>
            {!! Form::label('bannertemplate', 'Rectangle (219x183)') !!}
            {{Form::radio('bannertemplate', 'Rectangle')}}
            <img src="/template/rectangle.jpg" alt="rectangle.jpg"/>
        </p>


    </div>
</div>