@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>Productos</div>
                        <div style="justify-content: end;">
                            <a href="{{ route('product.create') }}">Nuevo</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre Producto</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>S/ {{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <div style="display: flex; gap: 10px">
                                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary">Editar</a>
                                        <a href="{{ route('product.delete', ['product' => $product]) }}" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection