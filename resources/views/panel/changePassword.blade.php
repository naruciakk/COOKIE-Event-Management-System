@extends('master')

@section('content')
	<h1>Zmień swoje hasło:</h1>
	Za pomocą tego narzędzia możesz zmienić hasło.<br /><br />
	
	@yield('error')

	<form method="POST" action="/panel/password" class="form-horizontal">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	    <div class="form-group"> 
	        <label for="password" class="col-sm-2 control-label">Stare hasło</label>
	        <div class="col-sm-10">
	            <input type="password" class="form-control" name="oldPassword" />
	        </div>
	    </div>

	    <div class="form-group"> 
	        <label for="password" class="col-sm-2 control-label">Nowe hasło</label>
	        <div class="col-sm-10">
	            <input type="password" class="form-control" name="newPassword" />
	        </div>
	    </div>

	    <div class="form-group">
	        <label for="password_confirmation" class="col-sm-2 control-label">Potwierdź nowe hasło</label>
	        <div class="col-sm-10">
	            <input type="password" class="form-control" name="newPasswordConfirmation" />
	        </div>
	    </div>
		<div class="form-group">
	        <div class="col-sm-offset-2 col-sm-10">
	            <button type="submit" class="btn btn-default">Zmień hasło</button>
	        </div>
   		</div>
   	</form>
	
@endsection