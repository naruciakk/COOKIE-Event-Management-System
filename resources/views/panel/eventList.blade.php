@extends('master')

@section('content')
	<h1>Lista wydarzeń:</h1>
	<p>Lista wydarzeń połączona z funkcjami administratorskimi.</p>

	<h4><b>Opcje globalne:</b> <a href="/panel/events/add">Dodaj nowe wydarzenie</a></h4>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nazwa</th>
				<th>Prowadzący</th>
				<th>Rozpoczęcie</th>
				<th>Zakończenie</th>
				<th>Sala</th>
				<th>Opcje</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($events as $event)
				@if($event->visible == 0)
				<tr class="warning">
				@else
				<tr>
				@endif
					<td>{{ $event->id }}</td>
					<td>{{ $event->name }}</td>
					<td>{{ $event->creator }}</td>
					<td>{{ $event->start }}</td>
					<td>{{ $event->end }}</td>
					<td>{{ $event->place }}</td>
					<td>
						<a href="/panel/events/edit/{{ $event->id }}">Edytuj</a> | <a href="/panel/events/delete/{{ $event->id }}">Usuń</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection