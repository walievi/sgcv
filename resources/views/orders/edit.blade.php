@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Pedido</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('orders.update', $order->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="customer_name" class="form-label">Nome do Cliente</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name', $order->customer_name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Produtos</label>
                        @foreach($products as $product)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="products[{{ $product->id }}][id]" value="{{ $product->id }}" id="product{{ $product->id }}" @if($order->products->contains($product->id)) checked @endif>
                                <label class="form-check-label" for="product{{ $product->id }}">
                                    {{ $product->name }} - R$ {{ number_format($product->cost, 2, ',', '.') }}
                                </label>
                                <input type="number" class="form-control mt-2" name="products[{{ $product->id }}][quantity]" value="{{ old('products.' . $product->id . '.quantity', $order->products->where('id', $product->id)->first()->pivot->quantity ?? '') }}" placeholder="Quantidade">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection