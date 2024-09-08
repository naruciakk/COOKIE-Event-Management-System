@extends('master')

@section('content')
	<h1>Edytuj newsa:</h1>
	<p>Edytujesz newsa o numerze <b>{{ $news->id }}</b> i tytule: <b>{{ $news->title }}</b>.</p>

	<form method="POST" action="/panel/news/edit/{{ $news->id }}" class="form-horizontal">
	    {!! csrf_field() !!}
	    <div class="form-group">
	        <label for="title" class="col-sm-2 control-label">Tytuł</label>
	        <div class="col-sm-10">
	            <input type="text" name="title" class="form-control" value="{{ $news->title }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="text" class="col-sm-2 control-label">Treść</label>
	        <div class="col-sm-10">
	            <textarea name="text" class="form-control">{{ $news->text }}</textarea>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button class="btn btn-default" type="submit">Zapisz</button>
	        </div>
	    </div>
	</form>
@endsection