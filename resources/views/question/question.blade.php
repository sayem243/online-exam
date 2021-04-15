@extends('welcome')
@section('title')
    Question
@endsection
@section('body')
    <div class="container-fluid">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error !!</strong>{{$error}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach

            @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !!</strong>{{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php Session::forget('message');  ?>
                @endif

        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-7">
                            <Button data-toggle="modal" data-target="#Modal_add" class="btn btn-primary">Add</Button><a href="/" class="btn btn-info">Home</a>
                        </div>

                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Question <i class="fa fa-sort"></i></th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($questions as $question)
                        <tr>
                            <td>{{$i++}} </td>
                            <td> {{$question->question}} </td>

                            <td>
                                <a href="#" class="text-warning" data-toggle="modal" data-target="#Modal_update{{$question->id}}">Update</a>
                                <a href="#" class="text-danger"  data-toggle="modal" data-target="#Modal_delete{{$question->id}}" >Delete</a>
                            </td>
                        </tr>

                        <div class="modal fade" id="Modal_update{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('update-question',$question->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">Question</div>
                                                <div class="col-md-8"><input type="text" name="question" value="{{$question->question}}" class="form-control"> </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6"><label>A:</label></div>
                                                <div class="col-md-6"><label>B:</label></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"><input type="text" name="a" value="{{$question->a}}"></div>
                                                <div class="col-md-6"><input type="text" name="b" value="{{$question->b}}"></div>

                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6"><label>C:</label></div>
                                                <div class="col-md-6"><label>D:</label></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6"><input type="text" name="c" value="{{$question->c}}"></div>
                                                <div class="col-md-6"><input type="text" name="d" value="{{$question->d}}"></div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-3">
                                                    <label> Answer</label>

                                                </div>
                                                <div class="col-md-9">
                                                    <select name="answer" class="form-control">
                                                        <option value="{{$question->answer}}">{{$question->answer}}</option>
                                                        <option value="a">A</option>
                                                        <option value="b">B</option>
                                                        <option value="c">C</option>
                                                        <option value="d">D</option>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="Modal_delete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{route('delete-question',$question->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <h3>Are you Sure?</h3>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>




    <!-- Modal-Add -->
    <div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('add-question')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">Question</div>
                       <div class="col-md-8"><input type="text" name="question" class="form-control"> </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6"><label>A:</label></div>
                        <div class="col-md-6"><label>B:</label></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"><input type="text" name="a"></div>
                        <div class="col-md-6"><input type="text" name="b"></div>

                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6"><label>C:</label></div>
                        <div class="col-md-6"><label>D:</label></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6"><input type="text" name="c"></div>
                        <div class="col-md-6"><input type="text" name="d"></div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-3">
                           <label> Answer</label>

                        </div>
                        <div class="col-md-9">
                            <select name="answer" class="form-control">
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                <option value="d">D</option>
                            </select>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Question</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal-Update -->



@endsection
