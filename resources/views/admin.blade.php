@extends('main')

@section('content')
<div class="row">
    <div class="col-8">
        @include('admin.periods')
    </div>
    <div class="col-4">
        @include('admin.create.create-period')
        @include('admin.create.create-teacher')
        @include('admin.create.create-module')
        @include('admin.create.create-exam')
    </div>
</div>

<div class="row">
    <div class="col-8">
        @include('admin.modules')
        @include('admin.exams')
    </div>
</div>
@endsection