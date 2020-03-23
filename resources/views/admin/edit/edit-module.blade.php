@extends('layouts.app')

@section('content')
    <div class="card-header"><h3>{{$module->name}}</h3></div>
    <div class="card">
        <div class="card-body">
            <form id="create-form" action="{{ route('module.update', $module->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" value="{{old('name', $module->name)}}" placeholder="name" id="name" name="name" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" value="{{old('ec', $module->ec)}}" placeholder="ec" id="ec" name="ec" min="0" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <select class="form-control" id="period_id" name="period_id" required>
                            @if(count($periods) > 0)
                                @foreach($periods as $period)
                                    <option value="{{$period->id}}" {{ old('period', $module->period->period) == $period->period ? 'selected' : '' }}>Periode: {{$period->period}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-control" id="teacher_id" name="teacher_id" required>
                            @if(count($teachers) > 0)
                                @foreach($teachers as $teacher)
                                    <option value="{{$teacher->id}}" {{ old('teacher', $module->teacher->id) == $teacher->id ? 'selected' : '' }}>{{$teacher->firstname}} {{$teacher->lastname}}</option>
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