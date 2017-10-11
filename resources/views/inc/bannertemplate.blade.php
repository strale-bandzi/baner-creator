<div class="container">
    <div class='form-group col-xs-6'>


        <div class="nav">
            <button class="btn btn-info" data-rel="leaderboard">Leaderboard</button>
            <button class="btn btn-success" data-rel="rectangle">Rectangle</button>
            <button class="btn btn-primary" data-rel="skycraper">Skycraper</button>
        </div>

        {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','files'=>true, 'id'=>'upload']) !!}

        <div id="leaderboard">
            {!! Form::label('bannertemplate', 'Leaderboard (728x90)') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-car') !!}
            <img src="/template/leaderboard.jpg" alt="car.jpg"/>

            {!! Form::label('bannertemplate', 'Leaderboard (728x90)') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-airplane')!!}
            <img src="/template/airplane.jpg" alt="airplane.jpg"/>
        </div>


        <div id="rectangle" class="presented">
            {!! Form::label('bannertemplate', 'Rectangle (300x250)') !!}
            {!! Form::radio('bannertemplate', 'rectangle-kissmetrics') !!}
            <img src="/template/kissmetrics.jpg" alt="kissmetrics.jpg"/>

            {!! Form::label('bannertemplate', 'Rectangle (300x250)') !!}
            {!! Form::radio('bannertemplate', 'rectangle-get-around') !!}
            <img src="/template/getting-around.jpg" alt="getting-around.jpg"/>
        </div>

        <div id="skycraper" class="presented">
            <p>
                {!! Form::label('bannertemplate', 'Skycraper (120x600)') !!}
                {!! Form::radio('bannertemplate', 'skycraper-antivirus') !!}
                <img src="/template/baner-antivirus.jpg" alt="skycraper-antivirus.jpg"/>
            </p>
            <p>
                {!! Form::label('bannertemplate', 'Skycraper (120x600)') !!}
                {!! Form::radio('bannertemplate', 'skycraper-iphone7') !!}
                <img src="/template/baneriPhone7.jpg" alt="skycraper-iPhone7.jpg"/>
            </p>
        </div>

    </div>
</div>

<style type="text/css">
    .presented {
        display: none;
    }

    .nav button {
        float: left;
    }

    p{
        display: inline-block;
    }

</style>

<script>
    $(document).ready(function () {
        var selected;

        $('.nav button').click(function () {
            selected = $(this).attr("data-rel");

            if (selected == 'leaderboard') {
                $('#leaderboard ').show();
                $('#rectangle ').hide();
                $('#skycraper').hide();
            }
            else if (selected == 'rectangle') {
                $('#leaderboard ').hide();
                $('#skycraper').hide();
                $('#rectangle ').show();
            }
            else if (selected == 'skycraper') {
                $('#leaderboard ').hide();
                $('#rectangle ').hide();
                $('#skycraper').show();
            }

        });
    });
</script>