<div class="container">


    <div class="nav">
        <button class="btn btn-info" data-rel="leaderboard">Leaderboard</button>
        <button class="btn btn-success" data-rel="rectangle">Rectangle</button>
        <button class="btn btn-primary" data-rel="skycraper">Skycraper</button>
    </div>
<br>
    {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','files'=>true, 'id'=>'upload']) !!}

    <div id="leaderboard">
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-car') !!}
            <img src="/template/leaderboard.jpg" alt="car.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-airplane')!!}
            <img src="/template/airplane.jpg" alt="airplane.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-get-around')!!}
            <img src="/template/baner728x90gettingaround.jpg" alt="get-around.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-iphone7')!!}
            <img src="/template/leaderboard-iphone.jpg" alt="iphone.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-antivirus')!!}
            <img src="/template/leaderboard-antivirus.jpg" alt="antivirus.jpg"/>
        </p>

        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-iphone-blue')!!}
            <img src="/template/leaderboard-iphone-blue.jpg" alt="iphone-blue.jpg"/>
        </p>
    </div>

    <br>
    <div id="rectangle" class="presented">
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-kismetrics') !!}<br>
            <img src="/template/kissmetrics.jpg" alt="kissmetrics.jpg"/>
        </p>


        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-get-around') !!}<br>
            <img src="/template/getting-around.jpg" alt="getting-around.jpg"/>
        </p>
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-airplane') !!}<br>
            <img src="/template/Rectangle-Airplane.jpg" alt="Rectangle Airplane.jpg"/>
        </p>
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-iphone') !!}<br>
            <img src="/template/iphone7-rectangle.jpg" alt="Rectangle Iphone.jpg"/>
        </p>
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-antivirus') !!}<br>
            <img src="/template/rectangle-antivirus.jpg" alt="Rectangle Antivirus.jpg"/>
        </p>
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-iphoneblue') !!}<br>
            <img src="/template/rectangle-iphone-blue.jpg" alt="Rectangle Iphone Blue"/>
        </p>
    </div>

    <div id="skycraper" class="presented"><br>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-antivirus') !!}
            <img src="/template/baner-antivirus.jpg" alt="skycraper-antivirus.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-iphone7') !!}
            <img src="/template/baneriPhone7.jpg" alt="skycraper-iPhone7.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-airplane') !!}
            <img src="/template/sky-airplane.jpg" alt="skycraper-airplane.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-get-around') !!}
            <img src="/template/sky-get-around.jpg" alt="skycraper-get-around.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-iphoneblue') !!}
            <img src="/template/sky-iphoneblue.jpg" alt="skycraper-iphone-blue.jpg"/>
        </p>
    </div>

</div>

<style type="text/css">
    .presented {
        display: none;
    }

    .nav button {
        float: left;
    }

    #skycraper p {
        display: inline-block;
    }

    p
    {
        margin: 5px;
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