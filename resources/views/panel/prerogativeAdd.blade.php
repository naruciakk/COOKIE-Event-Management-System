@extends('master')

@section('content')
    <h1>Dodaj prerogatywę:</h1>
    <p>Dodaj nową prerogatywę do bazy danych.</p>

    <form method="POST" action="/panel/prerogatives/add" class="form-horizontal">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Uczestnik</label>
            <div class="col-sm-10">
                <input type="text" name="user_id" class="form-control" value="{{ old('user_id') }}" />
            </div>
        </div>

        <div class="form-group">
            <label for="colour" class="col-sm-2 control-label">Prerogatywa</label>
            <div class="col-sm-10">
                <input type="text" name="pre_id" class="form-control" value="{{ old('pre_id') }}" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-default" type="submit">Zapisz</button>
            </div>
        </div>
    </form>

    <h3>Możliwe prerogatywy do nadania:</h3>
    <ol>
        <li>Pozwól uczestnikowi na przeglądanie listy uczestników.</li>
        <li>Pozwój uczestnikowi na akredytację innych uczestników.</li>
    </ol>
@endsection