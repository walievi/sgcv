@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Insumo</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('supplies.update', $supply->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Insumo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supply->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $supply->description) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fornecedores e Preços</label>
                        @foreach($suppliers as $supplier)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="suppliers[{{ $supplier->id }}][id]" value="{{ $supplier->id }}"
                                    @if($supply->suppliers->contains($supplier->id)) checked @endif>
                                <label class="form-check-label">
                                    {{ $supplier->name }}
                                </label>
                                <input type="number" class="form-control mt-2" name="suppliers[{{ $supplier->id }}][price]"
                                    placeholder="Preço" value="{{ old('suppliers.' . $supplier->id . '.price', $supply->suppliers->find($supplier->id)->pivot->price ?? '') }}">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('supplies.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection