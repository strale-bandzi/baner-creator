<div class="container">
    <div class="row">

        <div class="col-md-12">
            {!! Form::select('colorpicker', [
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
            {!! Form::label('file_image', 'Or you can upload your own photo') !!}
            {!! Form::file('file_image', ['class'=>'filestyle', 'data-buttonName'=>'btn-primary', 'id'=>'imgId']) !!}
            <br>
            {!! Form::label('wholeImage', 'Check to use whole image') !!}
            {!! Form::checkbox('wholeImage', 'wholeImage', false) !!}
            <br>
            {!! Form::hidden('image', '', ['id'=>'1file1']) !!}

            {{--JCROP Values--}}

            {!! Form::hidden('x1', '', ['id'=>'x1']) !!}
            {!! Form::hidden('y1', '', ['id'=>'y1']) !!}

            {!! Form::hidden('w', '', ['id'=>'w']) !!}
            {!! Form::hidden('h', '', ['id'=>'h']) !!}
        </div>
        <br>
        <div class="col-xs-12">

            <img src="" id="imageDisplay"/>


            <script type='text/javascript'>


                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $('#imageDisplay').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }

                var show = $("#imgId").change(function () {
                    readURL(this);
                });

                if (show) {
                    $("#imageDisplay").hide();
                }


                $('document').ready(function () {

                    /**Check for aspect ratio*/

                    var aspect;

                    $("#tab2").click(function () {

                        var arButton = $('input[name=bannertemplate]:checked').val();

                        switch (arButton) {
                            case 'leaderboard-car':
                                aspect = 364 / 45;
                                break;
                            case 'leaderboard-iphone-blue':
                                aspect = 364 / 45;
                                break;
                            case  'leaderboard-airplane':
                                aspect = 364 / 45;
                                break;
                            case  'leaderboard-get-around':
                                aspect = 364 / 45;
                                break;
                            case 'leaderboard-iphone7':
                                aspect = 364 / 45;
                                break;
                            case 'leaderboard-antivirus':
                                aspect = 364 / 45;
                                break;
                            case 'rectangle-airplane':
                                aspect = 6 / 5;
                                break;
                            case 'rectangle-kismetrics':
                                aspect = 6 / 5;
                                break;
                            case 'rectangle-iphone':
                                aspect = 6 / 5;
                                break;
                            case 'rectangle-get-around':
                                aspect = 6 / 5;
                                break;
                            case 'rectangle-antivirus':
                                aspect = 6 / 5;
                                break;
                            case 'rectangle-iphoneblue':
                                aspect = 6 / 5;
                                break;
                            case 'skycraper-antivirus':
                                aspect = 1 / 5;
                                break;
                            case 'skycraper-iphone7':
                                aspect = 1 / 5;
                                break;
                            case 'skycraper-airplane':
                                aspect = 1 / 5;
                                break;
                            case 'skycraper-get-around':
                                aspect = 1 / 5;
                                break;
                            case 'skycraper-iphone-blue':
                                aspect = 1 / 5;
                                break;

                        }

                        /* display image and crop */
                        console.log(arButton);

                        $('#imageDisplay').Jcrop({
                            trackDocument: true,
                            bgColor: 'black',
                            bgOpacity: .4,
                            setSelect: [0, 10, 50, 10],
                            boxWidth: 900,
                            boxHeight: 450,
                            aspectRatio: aspect,
                            onChange: showCoords,
                            onSelect: showCoords
                        });
                    });


                    /* hidden input image file */

                    $('#imgId').click(function () {
                        $('#1file1').val('radi');
                        return true;
                    });

                });

                /* collect coordinates */

                function showCoords(c) {
                    jQuery('#x1').val(c.x);
                    jQuery('#y1').val(c.y);
                    jQuery('#w').val(c.w);
                    jQuery('#h').val(c.h);

                }


            </script>


            <br>
        </div>
    </div>
</div>
<script>

    $('select[name="colorpicker"]').simplecolorpicker({theme: 'fontawesome'});


</script>