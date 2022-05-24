@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Search Affiliates</h1>

        <form action="{{ route('affiliates.search'), ['distance_km'] }}" method="get">
            @include('layouts.partials.messages')

{{--            @csrf--}}
            <div class="form-group mt-4">
                <input type="text" name="distance_km" value="" class="form-control">
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">Search</button>
        </form>

    </div>
@endsection
