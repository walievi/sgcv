@extends('layout.internal')

@section('top')
    <h1>Lista de Usuários</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary">Criar Usuário</a>
@endsection
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->trashed())
                            Inativo em {{ $user->deleted_at->format('d/m/Y H:i:s') }}
                        @else
                            Ativo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        @if($user->trashed())
                            <form action="{{ route('users.restore', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Reativar</button>
                            </form>
                        @else
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Desativar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection