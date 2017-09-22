@extends('layouts.app')

@section('content')
    <br><br>
    <div class="container">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Send us .csv and get comfortable</h1>
                    </div>
                </div>
                <hr>
                <div class="container">
                    <div class="col-lg-12">
                        <div class="col-xs-7">
                            {!! Form::open(['method'=>'POST', 'action'=>'CsvController@importCsv', 'files'=>true ]) !!}

                            {!! Form::label('insCsv', "Upload csv data") !!}
                            {!! Form::file('insCsv', ['class'=>'filestyle', 'data-buttonName'=>'btn-primary', 'id'=>'imgId']) !!}

                            <br>
                            {{--Here we need .csv template to download --}}
                            <p><a href="#">Download</a> csv template. Fill. Upload.</p>

                            <br>
                        </div>
                        <br>

                        <div class="col-xs-5">

                            @if (count($images)>0)

                                <div class="alert alert-success" role="alert">
                                    Autobots, roll out!

                                    @foreach($images as $image)

                                        <li class="gallItem"><a href="images/csv/{{$image}}"
                                                                data-lightbox="baner-csv-recipe">Click here to see your
                                                banners</a></li>

                                    @endforeach

                                </div>

                                Order <a href="#">here</a>, we know you like it!

                            @elseif(Session::get('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                            @endif


                        </div>

                    </div>

                </div>

                <hr>

                <p align="center">
                    {!! Form::submit('Confirm', ['class'=>'btn btn-success btn-lg']) !!}
                </p>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            lightbox.option({
                'resizeDuration': 200,
                'maxWidth': 728,
                'wrapAround': true
            });

        });
    </script>
    <style>
        /* LIGHT BOX STYLE */
        .gallItem {
            text-decoration: none;
        }

        li {
            visibility: hidden;
            display: none;
        }

        li:first-child {
            visibility: visible;
            display: inline;
        }

        li a {
            color: #28455A;
        }

        li a:hover {
            text-decoration: none;
            color: white;
        }

    </style>
@endsection



