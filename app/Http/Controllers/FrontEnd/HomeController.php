<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $contests=Contest::where('status',1)->orderBy('id','desc')->simplePaginate(6);


        return view('front-end.index',compact('contests'));
    }
    public function quizPage($id){
        $contest=Contest::find($id);
        return view('front-end.quiz-page',compact('contest'));
    }

}
