@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{route('students.update',$student)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" value="{{old('name')??$student->name}}" name="name" aria-describedby="emailHelp">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="std_iDno" class="form-label">iDno</label>
            <input type="text" value="{{old('std_iDno')??$student->iDno}}" name="iDno" id="exampleInputPassword1">
            @error('iDno')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stu_age" class="form-label">age</label>
            <input type="number" name="stu_age" value="{{ old('stu_age')?? $student->age  }}" id="exampleInputPassword1">
            @error('stu_age')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group- mb-3">
        <label for="track" class="form-label">track</label>
            <select name="tracks_dropdown" class="form-label">
            <option value="{{$track->id}}">{{$track->name}}</option>
                @foreach($tracks as $track)
                <option value="{{$track->id}}">{{$track->name}}</option>
                @endforeach
            </select>
            @error('tracks_dropdown')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
       

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection