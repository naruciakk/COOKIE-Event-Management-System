@extends('master')

@section('content')
	<h1>Zgłoś wydarzenie:</h1>
	<p>Zgłoś wydarzenie. Gdy zostanie potwierdzone przez administrację i zostanie przyznany jemu dzień i godzina: pojawi się na planie.</p>

	@yield('error')

	<form method="POST" action="/events/add" class="form-horizontal">
	    {!! csrf_field() !!}
	    <div class="form-group">
	        <label for="name" class="col-sm-2 control-label">Nazwa</label>
	        <div class="col-sm-10">
	            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="desc" class="col-sm-2 control-label">Opis</label>
	        <div class="col-sm-10">
	            <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button class="btn btn-default" type="submit">Zapisz</button>
	        </div>
	    </div>
	</form>
@endsection