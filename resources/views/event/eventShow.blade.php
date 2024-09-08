@extends('master')

@section('content')
	<h1>{{ $event->name }}</h1>
	<h3><i>{{ $event->creator }}</i></h3>

	<h5>Rozpoczęcie: {{ $event->start }}</h5>
	<h5>Zakończenie: {{ $event->end }}</h5>
	<h5>Sala: {{ $event->place }}</h5>
	<br />
	<p>{{ $event->desc }}</p>
	<br />
	@yield('sign')
@endsection