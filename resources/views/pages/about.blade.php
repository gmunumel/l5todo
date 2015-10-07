@extends('app')

@section('content')

{{--    @if ($first == 'John')
        <h1>Hi John</h1>
    @else
        <h1>Else</h1>
    @endif--}}

    <h1>About</h1>

    @if (count($people))
        <h3>People I like:</h3>
        <ul>
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif

{{--    <h1>About Me: {{ $first }} {{ $last }}</h1>--}}

    <p>sjdkaj askjd askjdk</p>

@stop