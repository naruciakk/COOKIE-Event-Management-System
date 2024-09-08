@extends('master')

@section('content')
    <h1>Akredytacja:</h1>
    <p>W tym miejscu należy akredytować danego uczestnika.</p>

    <h2>Postępuj zgodnie z poniższą instrukcją:</h2>
    <ol>
        <li>Sprawdź dokument tożsamości uczestnika, jego zgodność z danymi:</li>
        <h3>Imię i nazwisko: <b>{{ $user->name }}</b><br />
            Miasto: <b>{{ $user->city }}</b><br />
            Pełnoletność:<b>
            @if($user->adult == 1)
                Tak
            @else
                Nie
            @endif
            </b>
        </h3>
        @if($user->adult == 0)
        <li style="color: red;">Sprawdź zgodę od rodzica/opiekuna prawnego.</li>
        @endif
        <li>Pobierz następującą kwotę pieniężną:</li>
        <h3>Do zapłaty: <b>{{ \EventTool\Classes\RankTools::rankPayment($user->rank, $user->payment_paid, 2) - $user->discount}}</b> zł</h3>
        <li>Podaj listę do podpisania i spisz numer podpisu do okienka poniżej. Następnie wydaj identyfikator i ew. inne środki. </li><br />
            <form method="POST" action="/panel/users/activate/{id}">
                {!! csrf_field() !!}
                <input type="hidden" name="user_id" value="{{ $user->id }}" />
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Numer podpisu</label>
                    <div class="col-sm-10">
                        <input type="text" name="list_number" class="form-control" value="{{ old('list_number') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Dodatkowe adnotacje</label>
                    <div class="col-sm-10">
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button class="btn btn-default" type="submit">Akredytuj</button>
                    </div>
                </div>
            </form>
    </ol>
@endsection
