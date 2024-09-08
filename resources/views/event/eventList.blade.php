@extends('master')

@section('content')
	<h1>Lista wydarzeń:</h1>
	<p>Lista wydarzeń podzielona na poszczególnie dni.</p>
	
	<h4><b>Opcje globalne:</b> <a href="/events/add">Zgłoś panel/prelekcję/konkurs/itd.</a></h4>

	@foreach ($days as $day)
		<h2>{{ $day->day }}</h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Rozpoczęcie</th>
					<th>Zakończenie</th>
					<th>Nazwa</th>
					<th>Prowadzący</th>
					<th>Opis</th>
					<th>Sala</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($events as $event)
					@if ($event->day == $day->id)
					<tr>
						<td class="col-md-1">{{ $event->start }}</td>
						<td class="col-md-1">{{ $event->end }}</td>
						<td class="col-md-2"><a href="/events/{{ $event->id }}">{{ $event->name }}</a></td>
						<td class="col-md-1">{{ $event->creator }}</td>
						<td class="col-md-4">{{ $event->desc }}</td>
						<td class="col-md-1">{{ $event->place }}</td>
					</tr>
					@endif
				@endforeach
			</tbody>
		</table>
	@endforeach

@endsection