@extends('welcome')
@section('title')
    Home-page
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4 start-quize">
                <h3>Are you ready ?</h3>
                <a href="{{route('test')}}" class="btn btn-success quize">Start Quize</a>
                <a href="{{route('home')}}" class="btn btn-dark quize">Home</a>

            </div>
            <div class="col-md-3"></div>

        </div>
    </div>


@endsection
