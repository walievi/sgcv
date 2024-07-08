@extends('layout.internal')

@section('top')
    <h1>Insumos</h1>
    <a href="{{ route('supplies.create') }}" class="btn btn-primary">Criar Insumo</a>
@endsection
@section('content')
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($supplies as $supply)
                <tr>
                    <td>{{ $supply->id }}</td>
                    <td>{{ $supply->name }}</td>
                    <td>{{ $supply->description }}</td>
                    <td>
                        <a href="{{ route('supplies.show', $supply) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('supplies.edit', $supply) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('supplies.destroy', $supply) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection