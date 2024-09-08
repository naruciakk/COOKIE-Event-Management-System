@extends('master')

@section('content')
	<h1>Edytuj wydarzenie:</h1>
	<p>Edytuj ustawienia i informacje o danym wydarzeniu.</p>

	<form method="POST" action="/panel/events/edit" class="form-horizontal">
	    {!! csrf_field() !!}
	    <input type="hidden" name="id" value="{{ $event->id }}" />
	    <div class="form-group">
	        <label for="name" class="col-sm-2 control-label">Nazwa</label>
	        <div class="col-sm-10">
	            <input type="text" name="name" class="form-control" value="{{ $event->name }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="creator" class="col-sm-2 control-label">Prowadzący</label>
	        <div class="col-sm-10">
	            <input type="text" name="creator" class="form-control" value="{{ $event->creator }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="desc" class="col-sm-2 control-label">Opis</label>
	        <div class="col-sm-10">
	            <textarea name="desc" class="form-control">{{ $event->desc }}</textarea>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="start" class="col-sm-2 control-label">Początek (HH:MM:SS)</label>
	        <div class="col-sm-10">
	            <input type="time" name="start" class="form-control" value="{{ $event->start }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="end" class="col-sm-2 control-label">Koniec (HH:MM:SS)</label>
	        <div class="col-sm-10">
	            <input type="time" name="end" class="form-control" value="{{ $event->end }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="day" class="col-sm-2 control-label">Dzień tygodnia</label>
	        <div class="col-sm-10">
	            <select name="day" class="form-control">
	            	@foreach ($days as $day)
	            		<option value="{{ $day->id }}">{{ $day->day }}</option>
	            	@endforeach
	            </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="place" class="col-sm-2 control-label">Miejsce</label>
	        <div class="col-sm-10">
	            <input type="text" name="place" class="form-control" value="{{ $event->place }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="visible" class="col-sm-2 control-label">Widoczność</label>
	        <div class="col-sm-10">
	            <select name="visible" class="form-control">
	            		<option value="1">Tak</option>
	            		<option value="0">Nie</option>
	            </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button class="btn btn-default" type="submit">Zapisz</button>
	        </div>
	    </div>
	</form>
@endsection