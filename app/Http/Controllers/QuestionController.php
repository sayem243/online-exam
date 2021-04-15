<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function index(){

        Session::put('nextq',1);
        Session::put('correctAnswer',0);
        Session::put('wrongAnswer',0);
        $question=Question::all()->first();
        return view('answer')->with(['question'=>$question]);
    }
    public function show(){

        return view('question.question',[
            'questions'=>Question::all()
        ]);
    }

    public function start(){


        return view('quize.quize-start');
    }
    public function endQuize(){

        return view('quize.quize-end');
    }

    public function add(Request $request){

        $validate=$request->validate([
           'question'=>'required',
           'a'=>'required',
           'b'=>'required',
           'c'=>'required',
           'd'=>'required',
           'answer'=>'required',
        ]);

        $question=new Question();
        $question->question  =  $request->question;
        $question->a         =  $request->a;
        $question->b         =  $request->b;
        $question->c         =  $request->c;
        $question->d         =  $request->d;
        $question->answer    =  $request->answer;

        $question->save();
        Session::put('message','Successfuly Added Question');
        return redirect('/question');
    }

    public function update(Request $request,$id){

        $question=Question::find($id);
        $validate=$request->validate([
            'question'=>'required',
            'a'=>'required',
            'b'=>'required',
            'c'=>'required',
            'd'=>'required',
            'answer'=>'required',

        ]);


        $question->question  =  $request->question;
        $question->a         =  $request->a;
        $question->b         =  $request->b;
        $question->c         =  $request->c;
        $question->d         =  $request->d;
        $question->answer    =  $request->answer;

        $question->save();
        Session::put('message','Successfuly Update Question');
        return redirect('/question');
    }

    public function delete(Request $request ,$id){
        $question=Question::find($id);
        $question->delete();
        Session::put('message','Successfuly Delete Question');
        return redirect('/question');

    }
    public function submitAnswer(Request $request){
        $nextq=Session::get('nextq');;
        $correctAnswer=Session::get('correctAnswer');;
        $wrongAnswer=Session::get('wrongAnswer');;


        $validate=$request->validate([

            'answer'=>'required',

        ]);

        $nextq+=1;

        if($request->db_answer==$request->answer){
            $correctAnswer+=1;
        }
        else{
            $wrongAnswer+=1;
        }
        Session::put('nextq',$nextq);
        Session::put('correctAnswer',$correctAnswer);
        Session::put('wrongAnswer',$wrongAnswer);

        $i=0;
        $questions=Question::all();
        foreach ($questions as $question){
            $i++;
            if($questions->count() < $nextq){
                return view('quize.quize-end');
            }
            if ($i==$nextq){
                return view('answer')->with(['question'=>$question]);
            }
        }
    }

}
