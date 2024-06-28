<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Points;
use App\Models\Results;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $contests=Contest::where('status',1)->orderBy('id','desc')->simplePaginate(6);
        $points = Points::orderBy('point','desc')->get();
        return view('front-end.index',compact('contests','points'));
    }
    public function quizPage($id){
        $contest=Contest::find($id);
        $points = Points::orderBy('point','desc')->get();

        if(!$contest or $contest->status == 0 or $contest->end_time < now()){
            toastr()->info('هذا الاختبار غير متاح الان🥲', ' 🎁 winneBox ');
            return redirect()->back();
        }
//        if ($contest->start_time > now()){
//            toastr()->info('هذا الاختبار لم يبدأ بعد🥹', 'خطأ');
//            return redirect()->back();
//        }
        $suggested_competition=explode(',',$contest->suggested_competitions);
        $suggested_competitions=Contest::whereIn('id',$suggested_competition)->orderBy('id','desc')->get();
//        dd($suggested_competitions);
//
        return view('front-end.quiz-page',compact('contest','suggested_competitions','points'));
    }
    public function ResultStore(Request $request){

        $validator = Validator::make($request->all(), [
            'answer' => 'required',
            'user_name' => 'required',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            toastr()->error($error);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $result = Results::where('contest_id',$request->contest_id)->where('user_name',$request->user_name)->first();
        if($result){
            toastr()->info(' لقد قمت بالاجابة على هذا السؤال من قبل 😏', ' 🎁 winneBox ');
            return redirect()->back();
        }
        $contest = Contest::where('id',$request->contest_id)->first();
        if ($contest->start_time > now()){
            toastr()->info('هذا الاختبار لم يبدأ بعد🥹', ' 🎁 winneBox ');
            return redirect()->back();
        }
        $data = $request->all();
        $results = Results::create($data);
        toastr()->success('تم ارسال الاجابة بنجاح',' 🎁 winneBox ');

        return redirect()->route('quiz.index');

    }
    public function quizSuccess(){
        return view('front-end.quiz-sucess');
    }


}
