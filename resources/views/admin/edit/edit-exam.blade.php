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
                        <input type="number" class="form-control" value="{{old('ec', $exam->ec)}}" placeholder="ec" id="ec" name="ec" min="0" required>
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
                        <select class="form-control" id="type_id" name="type_id" required>
                            @if(count($types) > 0)
                                @foreach($types as $type)
                                    <option value="{{$type->id}}" {{ old('type', $exam->type->type) == $type->type ? 'selected' : '' }}>type: {{$type->type}}</option>
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