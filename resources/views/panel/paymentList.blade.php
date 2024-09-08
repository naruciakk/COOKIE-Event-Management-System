@extends('master')

@section('content')
    <h1>Lista przedpłat:</h1>
    <p>Lista przedpłat z możliwością potwierdzenia przedpłaty.</p>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Identyfikator płatności</th>
            @if(\EventTool\Classes\AuthChecking::checkAuth(0))
                <th>Opcje</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            @if($user->payment != NULL && $user->payment_paid == 0)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->payment}}</td>
                    <td>
                        @if(\EventTool\Classes\AuthChecking::checkAuth(0))
                            <a href="/panel/users/payment/{{ $user->id }}">Potwierdź płatność</a>
                        @endif
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@endsection