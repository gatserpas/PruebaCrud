@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalle del Producto</h1>
    
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $product->name }}</h2>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">Volver a la lista de productos</a>
        </div>
    </div>
</div>
@endsection
