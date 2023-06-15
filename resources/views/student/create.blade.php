@extends('layouts.app')
@section('content')

<div class="container">

    <form action="{{route('students.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="stu_name" class="form-label">name</label>
            <input type="text" name="name" aria-describedby="emailHelp">

            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="iDno" class="form-label">iDno</label>
            <input type="text" name="iDno" id="exampleInputPassword1">

            @error('iDno')
            <div class="alert alert-danger ">{{ $message }}</div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="stu_age" class="form-label">age</label>
            <input type="number" name="stu_age" id="exampleInputPassword1">

            @error('stu_age')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group- mb-3">
            <label for="track" class="form-label">track</label>
            <select name="tracks_dropdown" class="form-label">
                <option value="">-- Select track --</option>
                @foreach($tracks as $track)
                <option value="{{$track->id}}">{{$track->name}}</option>
                @endforeach
            </select>
            @error('tracks_dropdown')
            <div class="alert alert-danger">

                <div class="error">{{ $message }}</div>

            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection