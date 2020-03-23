@extends('layouts.app')

@section('content')
    <div class="card-header"><h3>{{$exam->firstname}} {{$exam->lastname}}</h3></div>
    <div class="card">
        <div class="card-body">
            <form id="create-form" action="{{ route('exam.update', $exam->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" value="{{old('name', $exam->name)}}" placeholder="name" id="name" name="name" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" value="{{old('grade', $exam->grade)}}" placeholder="grade" id="grade" name="grade" min="0" max="10" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="module_id" name="module_id" required>
                            @if(count($modules) > 0)
                                @foreach($modules as $module)
                                    <option value="{{$module->id}}" {{ old('module', $exam->module->name) == $module->name ? 'selected' : '' }}>Module: {{$module->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="type" name="type" required>
                            @if(count($types) > 0)
                                @foreach($types as $type)
                                    <option value="{{$type->type}}" {{ old('type', $exam->type) == $type ? 'selected' : '' }}>Type: {{$type->type}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection