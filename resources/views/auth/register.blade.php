@extends('master')

@section('content')
<!--
@if (count($errors) > 0)
    <div class="alert alert-danger">
        Wystąpiły błędy przy wypełnianiu formularza. Popraw je i wyślij ponownie:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/auth/register" class="form-horizontal">
    {!! csrf_field() !!}

    <h1>Rejestracja na Ponymeeta:</h1>
    <p>W tym miejscu możecie zarejestrować się na Middle Equestrian Convention 2016. Pola oznaczone gwiazdką są wymagane.</p>
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">Imię i nazwisko*</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="nickname" class="col-sm-2 control-label">Twoja ksywa z fandomu</label>
        <div class="col-sm-10">
            <input type="text" name="nickname" class="form-control" value="{{ old('nickname') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-sm-2 control-label">Miejscowość*</label>
        <div class="col-sm-10">
            <input type="text" name="city" class="form-control" value="{{ old('city') }}" />
        </div>
    </div>

    <div class="form-group">
        <label for="adult" class="col-sm-2 control-label">Czy jesteś pełnoletni?*</label>
        <div class="col-sm-10">
            <select class="form-control" name="adult">
                <option value="0">Nie</option>
                <option value="1">Tak</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="night" class="col-sm-2 control-label">Czy potrzebujesz noclegu?</label>
        <div class="col-sm-10">
            <select class="form-control" name="night">
                <option value="0">Nie</option>
                <option value="1">Tak</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="rank" class="col-sm-2 control-label">Wybierz wersję wejściówki*</label>
        <div class="col-sm-10">
            <select class="form-control" name="rank">
                @foreach(\EventTool\Rank::all() as $rank)
                    @if($rank->available == 1)
                        <option value="{{ $rank->id }}" style="background: #{{ $rank->colour }};">{{ $rank->name }} | {{ $rank->desc }} | Cena przy przedpłacie: {{ $rank->prepayment }} PLN | Cena na miejscu: {{ $rank->payment }} PLN</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email*</label>
        <div class="col-sm-10">
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" />
        </div>
    </div>

    <div class="form-group"> 
        <label for="password" class="col-sm-2 control-label">Hasło*</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" />
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-sm-2 control-label">Potwierdź hasło*</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password_confirmation" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button class="btn btn-default" type="submit">Zarejestruj</button>
        </div>
    </div>
</form>-->

<h1>Rejestracja zakończona!</h1>
Zapraszamy do kupna wejściówki na miejscu. 

@endsection
