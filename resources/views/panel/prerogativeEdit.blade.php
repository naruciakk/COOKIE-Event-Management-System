@extends('master')

@section('content')
	<h1>Edytuj prerogatywę:</h1>
	<p>Edytujesz prerogatywę uczestnika o numerze <b>{{ $prerogative->user_id }}</b> o typie <b>{{ $prerogative->pre_id }}</b>.</p>

	<form method="POST" action="/panel/prerogatives/edit/{{ $prerogative->id }}" class="form-horizontal">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Uczestnik</label>
			<div class="col-sm-10">
				<input type="text" name="user_id" class="form-control" value="{{ $prerogative->user_id }}" />
			</div>
		</div>

		<div class="form-group">
			<label for="colour" class="col-sm-2 control-label">Prerogatywa</label>
			<div class="col-sm-10">
				<input type="text" name="pre_id" class="form-control" value="{{ $prerogative->pre_id }}" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-default" type="submit">Zapisz</button>
			</div>
		</div>
	</form>

	<h3>Możliwe prerogatywy do nadania:</h3>
	<ol>
		<li>Pozwól uczestnikowi na przeglądanie listy uczestników.</li>
		<li>Pozwój uczestnikowi na akredytację innych uczestników.</li>
	</ol>
@endsection