@extends('welcome')
@section('title')
    AnswerScript
@endsection
@section('body')
<div class="container">
    <form action="{{route('submit-answer')}}" method="POST" enctype="multipart/form-data>">
        @csrf

        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">

                    </div>
                    <div class="col-md-4">
                        <h4>{{Session::get('nextq')}} : {{ $question->question }}</h4><br>
                        <input value="a" checked="true" name="answer" type="radio">(A)<small>{{$question->a}}</small><br>
                        <input value="b" name="answer" type="radio">(B)<small>{{$question->b}}</small><br>
                        <input value="c" name="answer" type="radio">(C)<small>{{$question->c}}</small><br>
                        <input value="d" name="answer" type="radio">(D)<small>{{$question->d}}</small><br>
                        <input  value="{{$question->answer}}" style="visibility: hidden"; name="db_answer">

                    </div>
                    <div class="col-md-5"></div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-4">
                      <button  type="submit" style="float: right" class="btn btn-primary">Next</button>
                    </div>
                    <div class="col-md-5"></div>
                </div>


            </div>
        </div>
    </form>
</div>


@endsection
