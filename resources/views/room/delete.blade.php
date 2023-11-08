@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>Habitaciones</div>
                        <div style="justify-content: end;">
                            <a href="{{ route('room.create') }}">Nuevo</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>¿ Seguro que desea eliminar la habitación ?</p>

                    <table class="table">
                        <th>
                            <tr>
                                <td>Nombre del Producto</td>
                                <td>Precio</td>
                                <td>Stock</td>
                            </tr>
                        </th>
                        <tr>
                            <td>{{ $room->room_number }}</td>
                            <td>{{ $room->room_type }}</td>
                            <td>S/ {{ $room->price }}</td>
                            <td>{{ $room->status }}</td>
                        </tr>
                    </table>

                    <form action="{{ route('room.destroy', ['room' => $room]) }}" method="post">
                        @csrf
                        <a href="{{ route('room.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection