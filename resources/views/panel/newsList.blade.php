@extends('master')

@section('content')
	<h1>Lista newsów:</h1>
	<p>Lista newsów połączona z funkcjami administratorskimi.</p>

	<h4><b>Opcje globalne:</b> <a href="/panel/news/add">Dodaj nowego newsa</a></h4>

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Tytuł</th>
				<th>Kto napisał</th>
				<th>Czas dodania</th>
				<th>Czas edycji</th>
				<th>Opcje</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($news as $new)
				<tr>
					<td>{{ $new->id }}</td>
					<td>{{ $new->title }}</td>
					<td>{{ $new->creator }}</td>
					<td>{{ $new->created_at }}</td>
					<td>{{ $new->updated_at }}</td>
					<td>
						<a href="/panel/news/edit/{{ $new->id }}">Edytuj</a> | <a href="/panel/news/delete/{{ $new->id }}">Usuń</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection