<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\ContestsDataTable;
use App\DataTables\CoursesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Courses;
use App\Models\Points;
use App\Models\Results;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContestsController extends Controller
{
    use ImageTrait;

//    public function __construct()
//    {
//        $this->middleware('permission:display contests', ['only' => ['index']]);
//        $this->middleware('permission:create contests', ['only' => ['create','store']]);
//        $this->middleware('permission:update contests', ['only' => ['edit','update']]);
//        $this->middleware('permission:delete contests', ['only' => ['destroy']]);
//    }

    public function index(ContestsDataTable $dataTable)
    {

        return $dataTable->render('dashboard.contests.index');
    }
    public function create()
    {
        $contests = Contest::orderBy('id','desc')->get();
        return view('dashboard.contests.create',compact('contests'));
    }
    public function store(Request $request)
    {
        $image_path = '';
        try {
            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
            }
            $request['image'] =$image_path;
            $request['status'] = '1';
            if ($request->suggested_competitions){
                $request['suggested_competitions'] = implode(',', $request->suggested_competitions);
            }
            $contests = Contest::create($request->all());

            toastr()->success(__('messages.Created successfully'));
            return redirect()->route('contests.index');
        } catch (\Exception $ex) {
            toastr()->error(__('messages.There was an error try again'));
            return redirect()->route('contests.create');
        }
    }

    public function edit($id)
    {
        $contests=Contest::findorFail($id);
        $suggested_competitions = Contest::orderBy('id','desc')->get();
//        return $contests->suggested_competitions;

        return view('dashboard.contests.edit', compact('contests','suggested_competitions'));
    }

    public function update(Request $request,$id)
    {
        $contests = Contest::findorFail($id);
        try {
            $data = $request->all();

            if ($request->has('photo')) {
                $image_path = $this->uploadImage('admin', $request->photo);
                $data['image'] = $image_path;
                if ($contests->image && File::exists($contests->image)) {
                    File::delete($contests->image);
                }
            }
            if ($request->suggested_competitions){
                $data['suggested_competitions'] = implode(',', $request->suggested_competitions);
            }
            if ($request->answer_1 != $contests->answer_1){
                if ($contests->correct_answer == $contests->answer_1){
                    $data['correct_answer'] = $request->answer_1;
                }
            }
            if ($request->answer_2 != $contests->answer_2){
                if ($contests->correct_answer == $contests->answer_2){
                    $data['correct_answer'] = $request['answer_2'];
                }
            }
            if ($request->answer_3 != $contests->answer_3){
                if ($contests->correct_answer == $contests->answer_3){
                    $data['correct_answer'] = $request->answer_3;
                }
            }
            if ($request->answer_4 != $contests->answer_4){
                if ($contests->correct_answer == $contests->answer_4){
                    $data['correct_answer'] = $request->answer_4;
                }
            }

            $contests->update($data);

            toastr()->success(__('messages.updated successfully'));
            return redirect()->route('contests.index');
        } catch (\Exception $ex) {
            toastr()->error(__('messages.There was an error try again'));
            return redirect()->route('contests.edit');
        }
    }


    public function destroy($contest)
    {
        $contest = Contest::findorFail($contest);
        if ($contest->image && File::exists($contest->image)) {
            File::delete($contest->image);
        }
        $contest->delete();
        return response()->json('success');
    }
    public function updateStatus($id)
    {
        try {
            $contest = Contest::findorFail($id);

            $contest->update(['status' => !$contest->status]);
            return response()->json('success');
        } catch (\Exception $ex){
            return response()->json(__('messages.There was an error try again'), 400);
        }
    }
    public function winner($id)
    {
        $contest = Contest::findorFail($id);
        $points = Points::orderBy('id','desc')->get();

//        return $contest;
        $winners =Results::where('contest_id',$id)->where('answer',$contest->correct_answer)->get();
        if(!$contest or $contest->status == 0){
            toastr()->error('هذا الاختبار غير متاح الان', 'خطأ');
            return redirect()->back();
        }
        if ( $contest->end_time > now()){
            toastr()->error('لم ينتهي الاختبار بعد', 'خطأ');
            return redirect()->back();
        }
        if ($contest->winner_id){
            toastr()->error('تم اختيار الفائز بالفعل', 'خطأ');
            return redirect()->back();
        }
        return view('front-end.quiz-admin', compact('winners', 'contest','points'));

    }
    public function winnerStore(Request $request)
    {
        $contest = Contest::findorFail($request->contest_id);

        $contest->update(['winner_id' => $request->winner_id]);
        toastr()->success('تم اضافة الفائز بنجاح');
        return redirect()->route('contests.index');
    }




}
