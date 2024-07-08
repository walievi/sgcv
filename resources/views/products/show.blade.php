@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Detalhes do Produto</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Produto</label>
                    <p id="name" class="form-control-plaintext">{{ $product->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <p id="description" class="form-control-plaintext">{{ $product->description }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Insumos Necessários</label>
                    <ul>
                        @foreach($product->supplies as $supply)
                            <li>{{ $supply->name }}: R$ {{ number_format($supply->cheapest_supplier->pivot->price, 2, ',', '.') }} (Fornecedor: {{ $supply->cheapest_supplier->name }})</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-3">
                    <label class="form-label">Custo Total de Produção</label>
                    <p class="form-control-plaintext">R$ {{ number_format($product->cost, 2, ',', '.') }}</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection