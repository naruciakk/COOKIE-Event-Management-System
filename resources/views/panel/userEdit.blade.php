@extends('master')

@section('content')
	<h1>Edytuj dane uczestnika:</h1>
	<p>Edytuj dane uczestnika <b>{{ $users->name }}</b>.<br /><br /></p>

	<form method="POST" action="/panel/users/edit" class="form-horizontal">
	    {!! csrf_field() !!}
	    <input type="hidden" name="id" value="{{ $users->id }}" />
	    <div class="form-group">
	        <label for="name" class="col-sm-2 control-label">Imię i nazwisko</label>
	        <div class="col-sm-10">
	            <input type="text" name="name" class="form-control" value="{{ $users->name }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="nickname" class="col-sm-2 control-label">Ksywa</label>
	        <div class="col-sm-10">
	            <input type="text" name="nickname" class="form-control" value="{{ $users->nickname }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="email" class="col-sm-2 control-label">Email</label>
	        <div class="col-sm-10">
	            <input type="email" name="email" class="form-control" value="{{ $users->email }}" />
	        </div>
    	</div>

	    <div class="form-group">
	        <label for="sign" class="col-sm-2 control-label">Numer podpisu</label>
	        <div class="col-sm-10">
	            <input type="text" name="sign" class="form-control" value="{{ $users->sign }}" />
	        </div>
	    </div>

	    @if (\EventTool\Classes\AuthChecking::checkAuth(0))
	   	    <div class="form-group">
		        <label for="rank" class="col-sm-2 control-label">Ranga</label>
		        <div class="col-sm-10">
		            <input type="text" name="rank" class="form-control" value="{{ $users->rank }}" />
		        </div>
		    </div>
	    @endif

	    <div class="form-group">
	        <label for="city" class="col-sm-2 control-label">Miejscowość</label>
	        <div class="col-sm-10">
	            <input type="text" name="city" class="form-control" value="{{ $users->city }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="adult" class="col-sm-2 control-label">Pełnoletność</label>
	        <div class="col-sm-10">
	            <input type="text" name="adult" class="form-control" value="{{ $users->adult }}" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="night" class="col-sm-2 control-label">Nocleg</label>
	        <div class="col-sm-10">
	            <input type="text" name="night" class="form-control" value="{{ $users->night }}" />
	        </div>
	    </div>

		<div class="form-group">
			<label for="city" class="col-sm-2 control-label">Zniżka / podwyżka</label>
			<div class="col-sm-10">
				<input type="text" name="discount" class="form-control" value="{{ $users->discount }}" />
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Dodatkowe adnotacje</label>
			<div class="col-sm-10">
				<textarea name="notes" class="form-control">{{ $users->notes }}</textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-default" type="submit">Zmień dane użytkownika</button>
			</div>
		</div>
	</form>
@endsection