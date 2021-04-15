@extends('welcome')
@section('title')
    Home-page
@endsection
@section('body')



    <div class="container-fluid">
        <img src="{{asset('/images/device.png')}}" class="main-pageBackground">

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 button">

            </div>
            <div class="col-md-4 main-button" >
                <a href="{{route('show')}}" class="btn btn-primary teacher">Teacher</a>
                <a href="{{route('start')}}" class="btn btn-primary">Student</a>
            </div>
        </div>
    </div>

@endsection
