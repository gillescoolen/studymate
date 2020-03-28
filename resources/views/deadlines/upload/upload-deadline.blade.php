@extends('layouts.app')

@section('content')
<div class="card-header">
    <h3>{{$deadline->exam->name}} - {{$deadline->exam->module->name}}</h3>
</div>
<div class="card">
    <div class="card-body">
        <form id="create-form" action="{{ route('deadline.update', $deadline->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="file" name="file"/>
            <button dusk="save" id="submit" type="submit" class="btn btn-primary">Inleveren</button>
        </form>
    </div>
</div>
@endsection