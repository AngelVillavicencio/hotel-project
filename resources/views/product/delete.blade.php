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

                    <p>¿ Seguro que desea eliminar el producto ?</p>

                    <table class="table">
                        <th>
                            <tr>
                                <td>Nombre del Producto</td>
                                <td>Precio</td>
                                <td>Stock</td>
                            </tr>
                        </th>
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>S/ {{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                        </tr>
                    </table>

                    <form action="{{ route('product.destroy', ['product' => $product]) }}" method="post">
                        @csrf
                        <a href="{{ route('product.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection