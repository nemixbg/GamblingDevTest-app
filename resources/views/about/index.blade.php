@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">

        <h1>Gambling.com Group Dev Code Test</h1>
        <br>
        <h3>Dev-codetest</h3>
        <p class="lead">Gambling.com Groups Irish office is in Dublin, where the best minds come together to solve Technical problems.</p>
        <p class="lead">The JSON-encoded affiliates.txt file attached contains a shortlist of affiliate contact records - one per line.</p>
        <p class="lead">We want to invite any affiliate that lives within 100km of our Dublin office for some food and drinks using this text file as the input (without being altered).</p>

        <h3>Task</h3>
        <p class="lead">Write a program that will read the full list of affiliates from this txt file and output the name and IDs of matching affiliates within 100km, sorted by Affiliate ID (ascending).</p>
        <p class="lead">You can use the first formula from this [Wikipedia article](https://en.wikipedia.org/wiki/Great-circle_distance) to calculate distance. Don't forget, you'll need to convert degrees to radians.</p>
        <p class="lead">The GPS coordinates for our Dublin office are 53.3340285, -6.2535495.</p>
        <p class="lead">You can find the affiliate list in this repository called affiliates.txt.</p>
        <p class="lead">Please don’t forget, your code should be production ready, clean and tested!</p>

        <h3>Nice to haves:</h3>
        <p class="lead">- Demonstrate understanding of MVC</p>
        <p class="lead">- Unit Tests</p>
        <p class="lead">- Basic HTML output</p>
        <p class="lead">- Usage of a PHP Framework (We're a Laravel based company so bonus points for using that)</p>
        <p class="lead">- Use the original txt file as input</p>


    </div>
@endsection
