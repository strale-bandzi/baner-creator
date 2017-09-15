<div class="container">
    <div class="row">

        <div class="col-xs-6">
            {!! Form::select('colorpicker', [
                    '#000000'=>'Black',
                    '#7bd148'=> 'Green',
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

            {!! Form::hidden('image', '', ['id'=>'1file1']) !!}


            {{--JCROP Values--}}

            {!! Form::hidden('x1', '', ['id'=>'x1']) !!}
            {!! Form::hidden('y1', '', ['id'=>'y1']) !!}

            {!! Form::hidden('w', '', ['id'=>'w']) !!}
            {!! Form::hidden('h', '', ['id'=>'h']) !!}


            <br>

            <div>

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

                    $("#imgId").change(function () {
                        readURL(this);
                    });


                    $('document').ready(function () {

                        /*Check for aspect ratio*/

                        var aspect;

                        $("[href='#tab2']").click(function () {
                            var arButton = $('input[name=bannertemplate]:checked').val();
                            if (arButton == 'Leaderboard') {
                                aspect = 234 / 29;

                            } else {
                                aspect = 73 / 61;

                            }

                            /* display image and crop */

                            $('#imageDisplay').Jcrop({
                                trackDocument: true,
                                bgColor: 'black',
                                bgOpacity: .4,
                                setSelect: [100, 100, 50, 50],
                                boxWidth: 750,
                                boxHeight: 500,
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

            </div>
            <br>
        </div>
    </div>
</div>

<script>

    $('select[name="colorpicker"]').simplecolorpicker({theme: 'glyphicons'});

</script>