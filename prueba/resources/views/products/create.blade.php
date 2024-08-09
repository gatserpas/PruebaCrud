@extends('layout.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ isset($product) ? 'Editar Producto' : 'Crear Nuevo Producto' }}</h1>
    
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}" method="POST">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($product) ? $product->name : old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ isset($product) ? $product->price : old('price') }}" required step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($product) ? 'Actualizar Producto' : 'Crear Producto' }}</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
