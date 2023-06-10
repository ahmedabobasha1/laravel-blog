<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students_data = Student::all();

       return view('student.index',compact('students_data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // dd($request);
       // $data = $request->all();
       // dd($data);
        Student::create([
            'name'=>$request->stu_name,
            'iDno'=>$request->std_iDno,
            'age'=>$request->stu_age,
            'track_id'=>$request->track
        ]);
        return redirect()->route('students.index');
      // Student::create($request)
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $stu_data = Student::find($id);
       // dd($stu_data);
       
       $stu_data->name = $request->stu_name;
       $stu_data->iDno = $request->std_iDno;
       $stu_data->age = $request->stu_age;
       $stu_data->track_id = $request->track;
        $stu_data->save();
    return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return 'hello';
       //dd( Student::find($id));
       Student::find($id)->delete();
        return redirect()->route('students.index');
    }
}
