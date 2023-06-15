<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $this->authorize('create',Student::class);

       $tracks = Track::all();
       
        return view('student.create',compact('tracks'));
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
       $data = $request->all();
     //  dd($data);
        // validation 

         $request->validate([
            'name'=>['required','string','min:3',Rule::unique('students')->whereNull('deleted_at')],
           'iDno'=>['required','alpha_num:ascii'],
            'stu_age'=>'required|Numeric',
            'tracks_dropdown'=>'required'
        ]);
        
  

        Student::create([ 
            'name'=>$request->name,
            'iDno'=>$request->iDno,
            'age'=>$request->stu_age,
           'track_id'=>$request->tracks_dropdown,
            'user_id'=>$request->user()->id
        ]);
        return redirect()->route('students.index')->with('message','save success');
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
        $this->authorize('update', $student);
        $track = Track::find($student->track_id);
   
        $tracks = Track::all();

        return view('student.edit',compact('student','track','tracks'));
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
        if($request->user()->cannot('update',$stu_data)){
            abort(403);
        }
        
        $request->validate([
            'name'=>['required','string','min:3',Rule::unique('students')->ignore($stu_data->id, 'id'),
        ],
            'iDno'=>['required','alpha_num:ascii',Rule::unique('students')->ignore($stu_data->id, 'id')],
            'stu_age'=>'required|Numeric',
            'tracks_dropdown'=>'required'
        ]);
  
        
       //dd($stu_data);
       
       $stu_data->name = $request->name;
       $stu_data->iDno = $request->iDno;
       $stu_data->age = $request->stu_age;
       $stu_data->track_id = $request->tracks_dropdown;
       
        $stu_data->save();
    return redirect()->route('students.index')->with('update','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Student::find($id));
        // return 'hello';
       //dd( Student::find($id));
       Student::find($id)->delete();
        return redirect()->route('students.index')->with('deleted','deleted success');
    }
}
