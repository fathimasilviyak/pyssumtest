<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SpecialStudentActivityMaster;
use App\Models\StudentClass;


class SpecialStudentActivityMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialStudentActivityMasters = SpecialStudentActivityMaster::where('branch_id', session('branch'))->get();
        $studentClasses = StudentClass::where('type','special_student')
                                        ->where('branch_id', session('branch'))
                                        ->get();

        return view('super-admin.activity-master.special-student-activity-master.index',compact('specialStudentActivityMasters', 'studentClasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $specialStduentActivityMaster = new SpecialStudentActivityMaster();
        $specialStduentActivityMaster->student_class_id = $request->student_class_id;
        $specialStduentActivityMaster->class_section_id = $request->class_section_id;
        $specialStduentActivityMaster->group = $request->group;
        $specialStduentActivityMaster->activity_number = $request->activity_number;
        $specialStduentActivityMaster->max_mark = $request->max_mark;
        $specialStduentActivityMaster->name = $request->name;
        $specialStduentActivityMaster->branch_id = session('branch');
        $save = $specialStduentActivityMaster->save();

        return back()->with('success','Activity Master for Special Student Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SpecialSTudentActivityMaster $specialStudentActivityMaster)
    {
        $data = [
            'class_section_id' => $request->updt_class_section_id,
            'student_class_id' => $request->updt_student_class_id,
            'group' => $request->updt_group,
            'activity_number' => $request->updt_activity_number,
            'max_mark' => $request->updt_max_mark,
            'name' => $request->updt_name
        ];
        $specialStudentActivityMaster->update($data);

        return back()->with('success','Activity Master for Special Student Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SpecialSTudentActivityMaster $specialStudentActivityMaster)
    {
        $specialStudentActivityMaster->delete();
        return back()->with('success','Activity Master for Special Student Deleted Successfully !'); 
    }
}
