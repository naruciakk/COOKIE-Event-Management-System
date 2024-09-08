@extends('master')

@section('content')
<form method="POST" action="/panel/users/addaction" class="form-horizontal">
    {!! csrf_field() !!}
    <h1>Rejestracja na meecie:</h1>
    <p>W tym miejscu należy dodać osobę akredytowaną na meecie.</p>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Imię i nazwisko</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="nickname" class="col-sm-2 control-label">Ksywa z fandomu</label>
        <div class="col-sm-10">
            <input type="text" name="nickname" class="form-control" value="{{ old('nickname') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-sm-2 control-label">Miasto</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" value="{{ old('city') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="sign" class="col-sm-2 control-label">Numer podpisu</label>
        <div class="col-sm-10">
            <input type="text" name="sign" class="form-control" value="{{ old('sign') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="adult" class="col-sm-2 control-label">Pełnoletność</label>
        <div class="col-sm-10">
            <select class="form-control" name="adult">
                <option value="0">Nie</option>
                <option value="1">Tak</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="night" class="col-sm-2 control-label">Nocleg</label>
        <div class="col-sm-10">
            <select class="form-control" name="night">
                <option value="0">Nie</option>
                <option value="1">Tak</option>
            </select>
        </div>
    </div>

    <h1>Kwota do zapłaty dla takiej osoby wynosi: <b>{{ \EventTool\Classes\RankTools::rankPayment(1, 0, 2) }}</b></h1>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-default" type="submit">Dodaj</button>
        </div>
    </div>
</form>
@endsection
