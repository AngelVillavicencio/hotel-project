@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Productos</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('product.update', ['product' => $product]) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre del Producto *</label>
                            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Precio *</label>
                            <input type="number" name="price" class="form-control" step="0.01" value="{{ $product->price }}" requiredd>
                        </div>

                        <div class="form-group">
                            <label for="stock">Stock *</label>
                            <input type="number" name="stock" class="form-control" value="{{ $product->stock }}" required>
                        </div>

                        <div class="d-flex" style="gap: 10px">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('product.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
