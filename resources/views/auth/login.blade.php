@extends('layout.general')

@section('general')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 col-12">
                        <input placeholder="Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="mb-3 col-12">
                        <input placeholder="Senha" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    </div>
                    <div class="row mb-0">
                        <center>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Acessar
                                </button>
                            </div>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection