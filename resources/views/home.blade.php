@extends('layout.general')

@section('general')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-primary text-white">
                        <h2>Menu</h2>
                    </div>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-dark btn-lg w-100">
                                    <i class="bi bi-basket2 d-block mb-2" style="font-size: 2rem;"></i>
                                    Pedidos
                                </a>
                            </div>
                            <div class="col-6 mb-3">
                                <a href="{{ route('products.index') }}" class="btn btn-outline-warning btn-lg w-100">
                                    <i class="bi bi-box-seam d-block mb-2" style="font-size: 2rem;"></i>
                                    Produtos
                                </a>
                            </div>
                            <div class="col-6 mb-3">
                                <a href="{{ route('supplies.index') }}" class="btn btn-outline-secondary btn-lg w-100">
                                    <i class="bi bi-tools d-block mb-2" style="font-size: 2rem;"></i>
                                    Insumos
                                </a>
                            </div>
                            <div class="col-6 mb-3">
                                <a href="{{ route('suppliers.index') }}" class="btn btn-outline-success btn-lg w-100">
                                    <i class="bi bi-truck d-block mb-2" style="font-size: 2rem;"></i>
                                    Fornecedores
                                </a>
                            </div>
                            <div class="col-6 mb-3">
                                <a href="{{ route('users.index') }}" class="btn btn-outline-info btn-lg w-100">
                                    <i class="bi bi-people d-block mb-2" style="font-size: 2rem;"></i>
                                    Usuários
                                </a>
                            </div>
                            <div class="col-6 mb-3">
                                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-lg w-100">
                                    <i class="bi bi-box-arrow-right d-block mb-2" style="font-size: 2rem;"></i>
                                    Sair
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection