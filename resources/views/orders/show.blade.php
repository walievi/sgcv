@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Detalhes do Pedido</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Nome do Cliente</label>
                    <p id="customer_name" class="form-control-plaintext">{{ $order->customer_name }}</p>
                </div>
                <div class="mb-3">
                    <label class="form-label">Produtos</label>
                    <ul>
                        @foreach($order->products as $product)
                            <li>{{ $product->name }} - Quantidade: {{ $product->pivot->quantity }} - Preço: R$ {{ number_format($product->cost, 2, ',', '.') }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="mb-3">
                    <label class="form-label">Custo Total</label>
                    <p class="form-control-plaintext">R$ {{ number_format($order->total_cost, 2, ',', '.') }}</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection