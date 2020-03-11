@extends('dashboard')

@section('content')

@if(count($periods) > 0)
    @foreach($periods as $period)
        <div>
            {{$period->id}}<br/>
            {{$period->modules}}
        </div>
    @endforeach
@else
    Geen talen beschikbaar.
@endif

@endsection