@extends('layouts.app')

@section('content')
    <div class="card-header"><h3>Period: {{$period->period}}</h3></div>
    <div class="card">
        <div class="card-body">
            <form id="create-form" action="{{ route('period.update', $period->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col">
                        <input type="number" class="form-control" value="{{old('period', $period->period)}}" placeholder="period" id="period" name="period" required min="0">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" value="{{old('semester', $period->semester)}}" placeholder="semester" id="semester" name="semester" required min="0">
                    </div>
                </div>
                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection