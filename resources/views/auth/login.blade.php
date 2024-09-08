@extends('master')

@section('content')
<form method="POST" action="/auth/login" class="form-horizontal">
    {!! csrf_field() !!}
    <h1>Zaloguj się:</h1>
    Aby się zalogować podaj email i hasło wykorzystane do rejestracji.<br />
    Nie masz konta? <a href="/auth/register">Zarejestruj się.</a><br /><br />
    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
        </div>
    </div>

    <div class="form-group"> 
        <label for="password" class="col-sm-2 control-label">Hasło</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Zapamiętaj mnie
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Zaloguj się</button>
        </div>
    </div>
</form>
@endsection
