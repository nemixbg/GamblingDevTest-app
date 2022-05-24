@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
{{--        @auth--}}
        <h1>Homepage</h1>
        <p class="lead">Affiliates</p>
        <a class="btn btn-md btn-primary" href="{{ route('affiliates.index') }}" role="button">View affiliates here &raquo;</a>
{{--        @endauth--}}

{{--        @guest--}}
        <p class="lead">Files</p>
        <a class="btn btn-md btn-primary" href="{{ route('files.read') }}" role="button">Read affiliates file &raquo;</a>
{{--        @endguest--}}
    </div>
@endsection
