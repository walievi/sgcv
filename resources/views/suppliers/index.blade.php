@extends('layout.internal')

@section('top')
    <h1>Fornecedores</h1>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Criar Fornecedor</a>
@endsection
@section('content')

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>
                        <a href="{{ route('suppliers.show', $supplier) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" style="display:inline-block;">
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