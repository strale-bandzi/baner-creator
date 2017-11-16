<div class="container">


    <div class="nav">
        <button class="btn btn-info" data-rel="leaderboard">Leaderboard</button>
        <button class="btn btn-success" data-rel="rectangle">Rectangle</button>
        <button class="btn btn-primary" data-rel="skycraper">Skycraper</button>
        <button class="btn btn-secondary" data-rel="rectwide">Rectangle Wide</button>
    </div>
<br>
    {!! Form::open(['method'=>'POST', 'action'=>'ImageController@store','files'=>true, 'id'=>'upload']) !!}
    {{ csrf_field() }}

    <div id="leaderboard">
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-car') !!}
            <img src="/template/leaderboard.jpg" alt="car"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-airplane')!!}
            <img src="/template/airplane.jpg" alt="airplane"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-get-around')!!}
            <img src="/template/baner728x90gettingaround.jpg" alt="get-around"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-iphone7')!!}
            <img src="/template/leaderboard-iphone.jpg" alt="iphone.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-antivirus')!!}
            <img src="/template/leaderboard-antivirus.jpg" alt="antivirus"/>
        </p>

        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-iphone-blue')!!}
            <img src="/template/leaderboard-iphone-blue.jpg" alt="iphone-blue"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-thai')!!}
            <img src="/template/leaderboard-thai.jpg" alt="thai"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 728x90') !!}
            {!! Form::radio('bannertemplate', 'leaderboard-medicine')!!}
            <img src="/template/leaderboard-medicine.jpg" alt="leaderboard-medicine"/>
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
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-thai') !!}<br>
            <img src="/template/rectangle-thai.jpg" alt="Rectangle Thai"/>
        </p>
        <p style="display: inline-block;">
            {!! Form::label('bannertemplate', 'Dims: 300x250') !!}
            {!! Form::radio('bannertemplate', 'rectangle-medicine') !!}<br>
            <img src="/template/rectangle-medicine.jpg" alt="Rectangle Medicine"/>
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
        <p>
            {!! Form::label('bannertemplate', 'Dims: 160x600') !!}
            {!! Form::radio('bannertemplate', 'skycraper-thai') !!}
            <img src="/template/sky-thai.jpg" alt="skycraper-thai.jpg"/>
        </p>
    </div>
    <div id="rectwide" class="presented"><br>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-airplane') !!}
            <img src="/template/rectanglewide-airplane.jpg" alt="rectanglewide-airplane.jpg"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-get-around') !!}
            <img src="/template/rectanglewide-get-around.jpg" alt="rectanglewide-get-around"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-thai') !!}
            <img src="/template/rectanglewide-thai.jpg" alt="rectanglewide-thai"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-iphoneblue') !!}
            <img src="/template/rectanglewide-iphoneblue.jpg" alt="rectanglewide-iphoneblue"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-iphone7') !!}
            <img src="/template/rectanglewide-iphone7.jpg" alt="rectanglewide-iphone7"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-antivirus') !!}
            <img src="/template/rectanglewide-antivirus.jpg" alt="rectanglewide-antivirus"/>
        </p>
        <p>
            {!! Form::label('bannertemplate', 'Dims: 240x400') !!}
            {!! Form::radio('bannertemplate', 'rectanglewide-medicine') !!}
            <img src="/template/rectanglewide-medicine.jpg" alt="rectanglewide-medicine"/>
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

    #skycraper p, #rectwide p {
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
                $('#rectwide').hide();
            }
            else if (selected == 'rectangle') {
                $('#leaderboard ').hide();
                $('#skycraper').hide();
                $('#rectangle ').show();
                $('#rectwide').hide();
            }
            else if (selected == 'skycraper') {
                $('#leaderboard ').hide();
                $('#rectangle ').hide();
                $('#skycraper').show();
                $('#rectwide').hide();
            }
            else if (selected == 'rectwide') {
                $('#leaderboard ').hide();
                $('#rectangle ').hide();
                $('#skycraper').hide();
                $('#rectwide').show();
            }

        });
    });
</script>