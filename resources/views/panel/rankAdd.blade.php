@extends('master')

@section('content')
    <h1>Dodaj rangę:</h1>
    <p>Dodaj nową rangę do bazy danych.</p>

    <form method="POST" action="/panel/ranks/add" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nazwa</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="colour" class="col-sm-2 control-label">Kolor</label>
            <div class="col-sm-10">
                <input type="text" name="colour" class="form-control" value="{{ old('colour') }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Krótki opis</label>
            <div class="col-sm-10">
                <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
            </div>
        </div>

        <div class="form-group">
            <label for="payment" class="col-sm-2 control-label">Domyślna cena</label>
            <div class="col-sm-10">
                <input type="text" name="payment" class="form-control" value="{{ old('payment') }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="prepayment" class="col-sm-2 control-label">Cena w przedpłacie</label>
            <div class="col-sm-10">
                <input type="text" name="prepayment" class="form-control" value="{{ old('prepayment') }}" />
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