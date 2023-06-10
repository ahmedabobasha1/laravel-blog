@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{route('students.create')}}"class="btn btn-primary">create student</a>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>iDno</th>
                <th>name</th>
                <th>age</th>
                <th>update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
           @foreach($students_data as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->iDno}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->age}}</td>
                    <td><a href ="{{route('students.edit',$student)}}" class="btn btn-info">Edit</a></td>
                    <form action="{{route('students.destroy',$student->id)}}" method="POST">
                    @method('delete')
                     @csrf
                    <td><button type="submit"  class="btn btn-danger">Delete</button></td>
                    </form>
                   
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection