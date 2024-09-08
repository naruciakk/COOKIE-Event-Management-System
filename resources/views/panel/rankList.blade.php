@extends('master')

@section('content')
    <h1>Lista rang:</h1>
    <p>Lista rang połączona z funkcjami administratorskimi.</p>

    <h4><b>Opcje globalne:</b> <a href="/panel/ranks/add">Dodaj nową rangę</a></h4>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nazwa</th>
            <th>Opis</th>
            <th>Kolor</th>
            <th>Domyślna cena</th>
            <th>Cena w przedpłacie</th>
            <th>Opcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($ranks as $rank)
                <tr style="background-color: #{{ $rank->colour }}">
                    <td>{{ $rank->id }}</td>
                    <td>{{ $rank->name }}</td>
                    <td>{{ $rank->desc }}</td>
                    <td>{{ $rank->colour }}</td>
                    <td>{{ $rank->payment }}</td>
                    <td>{{ $rank->prepayment }}</td>
                    <td>
                        <a href="/panel/ranks/edit/{{ $rank->id }}">Edytuj</a> | <a href="/panel/ranks/delete/{{ $rank->id }}">Usuń</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

@endsection