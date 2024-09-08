@extends('master')

@section('content')
    <h1>Opłać już teraz swoją wejściówkę na wydarzenie.</h1>
    Aby opłacić wejściówkę na wydarzenie już teraz, należy wysłać przelew na podane dane. Nasi organizatorzy najszybciej jak to możliwe potwierdzą twoją wpłatę.<br />
    <h3>Stowarzyszenie Warszawa Bronies</h3>
    <h3>ul. Blatona 4/20</h3>
    <h3>01-494 Warszawa</h3>
    <br />
    <h3><b>Numer konta:</b> 65 1140 2004 0000 3302 7613 4087</h3>
    <h3><b>Tytuł przelewu:</b> {{ $user->payment }}</h3>
    <h3><b>Kwota przelewu:</b> {{ \EventTool\Classes\RankTools::rankPayment($user->rank, $user->payment_paid, 1) }} zł</h3>

    <h3><b>Menu użytkownika:</b></h3>
    <dl>
        <dt><a href="panel/password">Zmień hasł`o</a></dt>
        <dd>Zmień swoje hasło wykorzystywane do logowania do systemu.</dd>

        <dt><a href="auth/logout">Wyloguj</a></dt>
        <dd>Wyloguj się z systemu zapisów.</dd>
    </dl>
@endsection