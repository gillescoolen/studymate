@extends('layouts.app')

@section('content')

<div class="card-header">
    <h3>{{$deadline->exam->name}} - {{$deadline->exam->module->name}}</h3>
</div>
<div class="card">
    <div class="card-body">
        <form id="file-form" action="{{ route('deadline.file', $deadline->id) }}" method="POST" enctype="multipart/form-data" accept="zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed">
            @csrf
            @method('PUT')
            <input type="file" id="file" name="file"/>
            <button dusk="save" type="submit" class="btn btn-primary">Inleveren</button>
        </form>
    </div>
</div>
<br>
Ingeleverd werk: <a href="{{ route('deadline.download', $deadline->id) }}">{{$deadline->work}}</a>
@endsection