@extends('layout.internal')

@section('content')
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Editar Fornecedor</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome do Fornecedor</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contato</label>
                        <input type="text" class="form-control" id="contact" name="contact" value="{{ old('contact', $supplier->contact) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $supplier->email) }}" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection