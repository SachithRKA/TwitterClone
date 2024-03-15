@extends('layout.layout')

@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left-bar')
    </div>
    <div class="col-6">
        @include('shared.success')
        <hr>
        <div class="mt-3">
            @include('shared.idea_card')
        </div>

    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
@endsection
