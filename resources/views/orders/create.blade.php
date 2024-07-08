@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Criar Novo Pedido</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Produtos</label>
                        @foreach($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}" id="product{{ $product->id }}">
                                <label class="form-check-label" for="product{{ $product->id }}">
                                    {{ $product->name }} - R$ {{ number_format($product->cost, 2, ',', '.') }}
                                </label>
                                <input type="number" class="form-control mt-2" name="products[{{ $product->id }}][quantity]" placeholder="Quantidade" min="1">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection