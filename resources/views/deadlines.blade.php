@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-8">
        @include('deadlines.deadlines')
    </div>
    <div class="col-4">
        @include('deadlines.create.create-deadline')
    </div>
</div>
@endsection