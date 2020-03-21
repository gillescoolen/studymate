@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        @include('deadlines.create.create-deadline')
    </div>
    <div class="col-12">
        @include('deadlines.table')
    </div>
</div>
@endsection