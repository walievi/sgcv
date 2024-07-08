@extends('layout.general')

@section('general')
<div class="row">
    <div class="col-2">
        @include('layout.menu')
    </div>
    <div class="col-10">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="container mt-5">
            <div class="col-md-12">
                    @yield('top', '')
                <div class="row justify-content-center">
                    @yield('content', '')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection