@extends('master')

@section('content')
	@foreach ($news as $new)
		<h1>{{ $new->title }}</h1>
		<h4><i>{{ $new->creator }}</i>, {{ $new->created_at }}</h4>
		<p>{!! html_entity_decode($new->text) !!}</p>
		<hr />
	@endforeach

@endsection