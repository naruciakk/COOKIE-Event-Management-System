@extends('master')

@section('content')
<h1 style="color: #{{ \EventTool\Classes\RankTools::rankColour($user->rank) }}">Cześć {{ $user->name }}!</h1>
<h4><b>Ksywa:</b> {{ $user->nickname }}</h4>
<h4><b>Numer na liście podpisów:</b>
	@if($user->sign == NULL)
		<i>brak</i>
	@else
		{{ $user->sign }}
	@endif
</h4>
<h4><b>Miasto:</b> {{ $user->city }}</h4>
<h4><b>Pełnoletność?:</b> 
	@if($user->adult == 0)
		Nie
	@else
		Tak
	@endif
</h4>
<h4><b>Nocleg?:</b> 
	@if($user->night == 0)
		Nie
	@else
		Tak
	@endif
</h4>
<h4><b>Adnotacje:</b>
	@if($user->notes == NULL)
		<i>brak</i>
	@else
		{{ $user->notes }}
	@endif
</h4>
<h3><b>Menu użytkownika:</b></h3>
<dl>
    <dt><a href="panel/password">Zmień hasło</a></dt>
    <dd>Zmień swoje hasło wykorzystywane do logowania do systemu.</dd>

    @if(\EventTool\Classes\AuthChecking::checkAuth(0))
	    <dt><a href="panel/users">Zarządzaj uczestnikami</a></dt>
	    <dd>Usuń, akredytuj lub edytuj uczestnika.</dd>
	    <dt><a href="panel/events">Zarządzaj wydarzeniami</a></dt>
	    <dd>Dodaj, usuń lub edytuj wydarzenia.</dd>
	    <dt><a href="panel/news">Zarządzaj newsami</a></dt>
	    <dd>Dodaj, usuń lub edytuj newsy.</dd>
		<dt><a href="panel/ranks">Zarządzaj rangami</a></dt>
		<dd>Dodaj, usuń lub edytuj rangi uczestników.</dd>
		<dt><a href="panel/prerogatives">Zarządzaj prerogatywami</a></dt>
		<dd>Dodaj, usuń lub edytuj prerogatywy uczestników.</dd>
		<dt><a href="panel/users/payment">Zarządzaj opłatami</a></dt>
		<dd>Potwierdź wpłaty przedpłat za bilety uczesników.</dd>
    @endif

    @if(\EventTool\Classes\AuthChecking::checkAuth(1) && !(\EventTool\Classes\AuthChecking::checkAuth(0)))
	    <dt><a href="panel/users">Lista uczestników</a></dt>
	    <dd>Lista uczestników, połączona z funkcjami akredytacyjnymi dla osób upoważnionych.</dd>
    @endif
    
    <dt><a href="auth/logout">Wyloguj</a></dt>
    <dd>Wyloguj się z systemu zapisów.</dd>
</dl>
@endsection
