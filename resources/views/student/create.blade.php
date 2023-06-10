@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="stu_name" class="form-label">name</label>
            <input type="text"  name="stu_name" aria-describedby="emailHelp">
        </div>
     
        <div class="mb-3">
            <label for="std_iDno" class="form-label">iDno</label>
            <input type="text" name="std_iDno" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="stu_age" class="form-label">age</label>
            <input type="number" name="stu_age"  id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="track" class="form-label">track id</label>
            <input type="track" name="track"   id="exampleInputPassword1">
        </div>

   

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection