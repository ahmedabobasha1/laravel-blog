@extends('layouts.app')

@section('content')
@if(session('message'))
<div  class="alert alert-success text-center">
    {{session('message')}}
</div>
@elseif(session('deleted'))
<div  class="alert alert-danger text-center">
    {{session('deleted')}}
</div>
@elseif(session('update'))
<div  class="alert alert-success text-center">
    {{session('update')}}
</div>
@endif


<div class="container">
    @can('create', App\Models\Student::class)
<a href="{{route('students.create')}}"class="btn btn-primary">create student</a>
    @endcan
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>iDno</th>
                <th>name</th>
                <th>age</th>
                <th>track</th>
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
                    <!-- <td>{{\App\Models\Track::find($student->track_id)->name}}</td> -->
                    <td>{{$student->track->name}}</td>
                    <td>
                    @can('update', $student)
                        <a href ="{{route('students.edit',$student)}}" class="btn btn-info">Edit</a>
                        @endcan
                    </td>
                    <form action="{{route('students.destroy',$student->id)}}" method="POST">
                    @method('delete')
                     @csrf
                    <td>
                    @can('delete', $student)
                        <button type="submit"  class="btn btn-danger">Delete</button>
                    </td>
                    @endcan
                    </form>
                   
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
@endsection