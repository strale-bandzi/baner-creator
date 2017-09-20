@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="jumbotron">

            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <h1>Create your own custom banner</h1>
                    </div>
                </div>
                <hr>

                <div class="container">
                    <div class="col-lg-12">

                        <div class="container">
                            @include('layouts.wizardbar')
                        </div>

                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>

@endsection