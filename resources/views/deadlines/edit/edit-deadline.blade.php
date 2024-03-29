@extends('layouts.app')

@section('content')
<div class="card-header">
    <h3>{{$deadline->exam->name}} {{$deadline->date}}</h3>
</div>
<div class="card">
    <div class="card-body">
        <form id="create-form" action="{{ route('deadline.update', $deadline->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="col-6">
                    <input dusk="date" value="{{old('date', $deadline->date)}}" type="date" class="form-control" placeholder="datum" id="date" name="date">
                    <input dusk="done" type="checkbox" name="done" value="1" {{$deadline->done === 1 ? 'checked' : ''}}>
                    <label for="done">Voldaan</label>
                </div>
                <div class="col-6">
                    <select dusk="tags" multiple class="form-control" id="tags" name="tags[]">
                        @if(count($tags) > 0)
                            @foreach($tags as $tag)
                                <option {{in_array($tag->name, $deadlineTags) ? 'selected' : ''}} value="{{$tag->name}}">{{$tag->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <button dusk="save" id="submit" type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection