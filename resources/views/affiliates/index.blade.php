@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>Affiliates</h1>
{{--        <a href="{{ route('affiliates.view') }}" class="btn btn-primary float-right mb-3">Search affiliates</a>--}}

        @include('layouts.partials.messages')

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Distance(km)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($affiliates as $affiliate)
                <tr>
                    <td width="3%">{{ $affiliate->affiliate_id }}</td>
                    <td>{{ $affiliate->name }}</td>
                    <td width="10%">{{ $affiliate->latitude }}</td>
                    <td width="10%">{{ $affiliate->longitude }}</td>
                    <td width="5%">{{ $affiliate->distance_km }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
