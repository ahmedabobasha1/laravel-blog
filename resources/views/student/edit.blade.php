@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('students.update',$student)}}" method="POST">
    @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="stu_name" class="form-label">name</label>
            <input type="text" value="{{$student->name}}" name="stu_name" aria-describedby="emailHelp">
        </div>
     
        <div class="mb-3">
            <label for="std_iDno" class="form-label">iDno</label>
            <input type="text" value="{{$student->iDno}}" name="std_iDno" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="stu_age" class="form-label">age</label>
            <input type="number" name="stu_age" value="{{$student->age}}"  id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="track" class="form-label">track id</label>
            <input type="track" name="track" value="{{$student->track_id}}"  id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection