@extends('welcome')
@section('title')
    Home
@endsection
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4 start-quize">
                <label>Correct Ans: <small>{{Session::get('correctAnswer')}}</small></label>
                <label>Incorrect Ans: <small>{{Session::get('wrongAnswer')}}</small></label>
                <label>Result<small>{{Session::get('correctAnswer')}}/{{Session::get('correctAnswer')+ Session::get('wrongAnswer')}} </small></label>
                <br>
                <a href="#" class="btn btn-success quize">Finish Quize</a>
                <a href="/" class="btn btn-dark quize">Home</a>

            </div>
            <div class="col-md-3"></div>

        </div>
    </div>


@endsection
