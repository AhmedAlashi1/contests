<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CoursesDataTable;
use App\DataTables\PointsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CoursesRequest;
use App\Models\Courses;
//use App\Traits\ImageTrait;
use App\Models\Points;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\App;

class PointsController extends Controller
{
    use ImageTrait;
//    public function __construct()
//    {
//        $this->middleware('permission:display courses', ['only' => ['index']]);
//        $this->middleware('permission:create courses', ['only' => ['create','store']]);
//        $this->middleware('permission:update courses', ['only' => ['edit','update']]);
//        $this->middleware('permission:delete courses', ['only' => ['destroy']]);
//    }



    public function index(PointsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.points.index');
    }

    public function create()
    {
        return view('dashboard.points.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {

        $courses = Points::create([
            'name' => $request->name,
            'point' => $request->point,
            'status' => '1',
        ]);

        toastr()->success(__('messages.Created successfully'));
        return redirect()->route('points.index');
    } catch (\Exception $ex) {
        toastr()->error(__('messages.There was an error try again'));
        return redirect()->route('points.create');
    }
}

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $points=Points::findorFail($id);

        return view('dashboard.points.edit', compact('points'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CoursesRequest $request
     * @param Courses $courses
     */
    public function update(Request $request,$id)
    {
        $points = Points::findorFail($id);
        try {
            $data = $request->all();

            $points->update($data);

            toastr()->success(__('messages.updated successfully'));
            return redirect()->route('points.index');
        } catch (\Exception $ex) {
            toastr()->error(__('messages.There was an error try again'));
            return redirect()->route('points.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Courses $courses
     */
    public function destroy($id)
    {
        $points = Points::findorFail($id);

        $points->delete();
        return response()->json('success');
    }

    public function updateStatus($id)
    {
       try {
            $points = Points::findorFail($id);

           $points->update(['status' => !$points->status]);
            return response()->json('success');
       } catch (\Exception $ex){
           return response()->json(__('messages.There was an error try again'), 400);
       }
    }
}
