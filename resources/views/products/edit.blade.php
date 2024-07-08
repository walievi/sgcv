@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Produto</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Produto</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Insumos Necessários</label>
                        @foreach($supplies as $supply)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="supplies[]" value="{{ $supply->id }}"
                                    @if($product->supplies->contains($supply->id)) checked @endif>
                                <label class="form-check-label">
                                    {{ $supply->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection