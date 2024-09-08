@extends('master')

@section('content')
    <h1>Lista prerogatyw:</h1>
    <p>Lista prerogatyw połączona z funkcjami administratorskimi.</p>

    <h4><b>Opcje globalne:</b> <a href="/panel/prerogatives/add">Dodaj nową prerogatywę</a></h4>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Uczestnik</th>
            <th>Typ prerogatywy</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($prerogatives as $prerogative)
                <tr>
                    <td>{{ $prerogative->id }}</td>
                    <td>{{ $prerogative->user_id }}</td>
                    <td>{{ $prerogative->pre_id }}</td>
                    <td>
                        <a href="/panel/prerogatives/edit/{{ $prerogative->id }}">Edytuj</a> | <a href="/panel/prerogatives/delete/{{ $prerogative->id }}">Usuń</a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>

@endsection