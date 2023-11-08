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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Número</th>
                                <th>Tipo Habitación</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_number }}</td>
                                <td>{{ $room->room_type }}</td>
                                <td>S/ {{ $room->price }}</td>
                                <td>{{ $room->status }}</td>
                                <td>
                                    <div style="display: flex; gap: 10px">
                                        <a href="{{ route('room.edit', ['room' => $room]) }}" class="btn btn-primary">Editar</a>
                                        <a href="{{ route('room.delete', ['room' => $room]) }}" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $rooms->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection