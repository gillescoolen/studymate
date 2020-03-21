@extends('layouts.app')

@section('content')
    <div class="card-header"><h3>{{$teacher->firstname}} {{$teacher->lastname}}</h3></div>
    <div class="card">
        <div class="card-body">
            <form id="create-form" action="{{ route('teacher.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" value="{{old('firstname', $teacher->firstname)}}" placeholder="firstname" id="firstname" name="firstname">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" value="{{old('lastname', $teacher->lastname)}}" placeholder="lastname" id="lastname" name="lastname">
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection