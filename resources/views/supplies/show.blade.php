@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Detalhes do Insumo</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Insumo</label>
                    <p id="name" class="form-control-plaintext">{{ $supply->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <p id="description" class="form-control-plaintext">{{ $supply->description }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fornecedores e Preços</label>
                    <ul>
                        @foreach($supply->suppliers as $supplier)
                            <li>{{ $supplier->name }}: {{ $supplier->pivot->price }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="text-center">
                    <a href="{{ route('supplies.edit', $supply->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('supplies.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection