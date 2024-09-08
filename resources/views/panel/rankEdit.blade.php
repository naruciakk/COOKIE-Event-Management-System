@extends('master')

@section('content')
	<h1>Edytuj rangę:</h1>
	<p>Edytujesz rangę o numerze <b>{{ $rank->id }}</b> i nazwie: <b>{{ $rank->name }}</b>.</p>

	<form method="POST" action="/panel/ranks/edit/{{ $rank->id }}" class="form-horizontal">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Nazwa</label>
			<div class="col-sm-10">
				<input type="text" name="name" class="form-control" value="{{ $rank->name }}" />
			</div>
		</div>

		<div class="form-group">
			<label for="colour" class="col-sm-2 control-label">Kolor</label>
			<div class="col-sm-10">
				<input type="text" name="colour" class="form-control" value="{{ $rank->colour }}" />
			</div>
		</div>

		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">Krótki opis</label>
			<div class="col-sm-10">
				<textarea name="desc" class="form-control">{{ $rank->desc }}</textarea>
			</div>
		</div>

		<div class="form-group">
			<label for="payment" class="col-sm-2 control-label">Domyślna cena</label>
			<div class="col-sm-10">
				<input type="text" name="payment" class="form-control" value="{{ $rank->payment }}" />
			</div>
		</div>

		<div class="form-group">
			<label for="prepayment" class="col-sm-2 control-label">Cena w przedpłacie</label>
			<div class="col-sm-10">
				<input type="text" name="prepayment" class="form-control" value="{{ $rank->prepayment }}" />
			</div>
		</div>


        <div class="form-group">
            <label for="available" class="col-sm-2 control-label">Czy ma być dostępna przy rejestracji?</label>
            <div class="col-sm-10">
                <select class="form-control" name="available">
                    <option value="0">Nie</option>
                    <option value="1">Tak</option>
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