@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-8">
        <div class="row">
            <div class="col-6">
                @include('admin.periods')
            </div>
            <div class="col-6">
                @include('admin.teachers')
            </div>
        </div>
        @include('admin.modules')
        @include('admin.exams')
    </div>
    <div class="col-4">
        @include('admin.create.create-period')
        <br>
        @include('admin.create.create-teacher')
        <br>
        @include('admin.create.create-module')
        <br>
        @include('admin.create.create-exam')
    </div>
</div>
@endsection