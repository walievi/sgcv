@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Criar Novo Insumo</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('supplies.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Insumo</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fornecedores e Preços</label>
                        @foreach($suppliers as $supplier)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="suppliers[{{ $supplier->id }}][id]" value="{{ $supplier->id }}">
                                <label class="form-check-label">
                                    {{ $supplier->name }}
                                </label>
                                <input type="number" class="form-control mt-2" name="suppliers[{{ $supplier->id }}][price]" placeholder="Preço">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="{{ route('supplies.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection