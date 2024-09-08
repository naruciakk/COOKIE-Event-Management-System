@extends('master')

@section('content')
	<h1>Lista uczestników:</h1>
	<p>Lista uczestników połączona z funkcjami administracyjnymi.</p>

	@if(($admin->rank == 2 && $prerogative[2] == 1) || $admin->rank == 3)
		<h4><b>Opcje globalne:</b> <a href="/panel/users/add">Rejestracja przy akredytacji</a></h4>
	@endif

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Imię i nazwisko</th>
				<th>Ksywa</th>
				<th>Adres email</th>
				@if(\EventTool\Classes\AuthChecking::checkAuth(1))
				<th style="width: 200px;">Adnotacje</th>
				<th style="width: 50px;">Nocleg</th>
				@endif
				<th style="width: 200px;">Miasto</th>
				@if(\EventTool\Classes\AuthChecking::checkAuth(1))
					<th>Podpis</th>
				@endif
				@if(\EventTool\Classes\AuthChecking::checkAuth(0))
					<th>Opcje</th>
				@endif
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr style="background-color: #{{ \EventTool\Classes\RankTools::rankColour($user->rank) }}">
					<td>{{ $user->id }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->nickname }}</td>
					<td>{{ $user->email }}</td>
					@if(\EventTool\Classes\AuthChecking::checkAuth(1))
					<td style="width: 200px;">{{ $user->notes }}</td>
					<td style="width: 50px;">
						@if($user->night == 1)
							<span style="color: green;">Tak</span>
						@else
							Nie
						@endif
					</td>
					@endif
					<td>{{ $user->city }}</td>
					@if ($user->sign == NULL)
						@if(\EventTool\Classes\AuthChecking::checkAuth(1))
							<td style="width: 130px;">
								<a href="/panel/users/activate/{{ $user->id }}">Akredytuj</a>
							</td>
						@endif
					@else	
						<td>{{ $user->sign }}</td>
					@endif
					<td>
						@if(\EventTool\Classes\AuthChecking::checkAuth(0))
							<a href="/panel/users/edit/{{ $user->id }}">Edytuj</a>
							@if ($user->admin == 0)
								<br /> <a href="/panel/users/delete/{{ $user->id }}">Usuń</a>
							@endif
						@endif
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection