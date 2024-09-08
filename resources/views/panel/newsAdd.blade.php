@extends('master')

@section('content')
	<h1>Dodaj newsa:</h1>
	<p>Dodaj nowego newsa do bazy danych.</p>

	<form method="POST" action="/panel/news/add" class="form-horizontal">
	    {!! csrf_field() !!}
	    <div class="form-group">
	        <label for="title" class="col-sm-2 control-label">Tytuł</label>
	        <div class="col-sm-10">
	            <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="text" class="col-sm-2 control-label">Treść</label>
	        <div class="col-sm-10">
	            <textarea name="text" class="form-control">{{ old('text') }}</textarea>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button class="btn btn-default" type="submit">Zapisz</button>
	        </div>
	    </div>
	</form>
@endsection