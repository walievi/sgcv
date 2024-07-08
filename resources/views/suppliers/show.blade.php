@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Detalhes do Fornecedor</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Fornecedor</label>
                    <p id="name" class="form-control-plaintext">{{ $supplier->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Contato</label>
                    <p id="contact" class="form-control-plaintext">{{ $supplier->contact }}</p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p id="email" class="form-control-plaintext">{{ $supplier->email }}</p>
                </div>
                <div class="text-center">
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-primary">Editar</a>
                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection