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

                            {!! Form::label('insCsv', "Upload csv data here") !!}
                            {!! Form::file('insCsv', ['class'=>'filestyle', 'data-buttonName'=>'btn-primary', 'id'=>'imgId']) !!}

                            <br>
                            <p>If you are not sure, <a href="#">click</a> here to see full process.</p>
                            <br>
                        </div>
                        <br>

                        <div class="col-xs-5">

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success" role="alert">

                                    {{ Session::get('success') }}

                                </div>


                            @elseif($message = Session::get('error'))
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
@endsection



