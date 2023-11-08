@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Habitaciones</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('room.update', ['room' => $room]) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="room_number">Número de Habitación *</label>
                            <input type="text" name="room_number" class="form-control" value="{{ $room->room_number }}" required>
                        </div>

                        <div class="form-group">
                            <label for="room_type">Tipo de Habitación *</label>
                            <select name="room_type" class="form-control" required>
                                <option value="SIMPLE" @if ($room->room_type == 'SIMPLE') selected @endif>SIMPLE</option>
                                <option value="MATRIMONIAL" @if ($room->room_type == 'MATRIMONIAL') selected @endif>MATRIMONIAL</option>
                                <option value="CAMA_DOBLE" @if ($room->room_type == 'CAMA_DOBLE') selected @endif>CAMA DOBLE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Precio *</label>
                            <input type="number" name="price" class="form-control" value="{{ $room->price }}" step="0.01" requiredd>
                        </div>

                        <div class="form-group">
                            <label for="status">Estado de Habitación *</label>
                            <select name="status" class="form-control" required>
                                <option value="DISPONIBLE" @if ($room->status == 'DISPONIBLE') selected @endif>DISPONIBLE</option>
                                <option value="MANTENIMIENTO" @if ($room->status == 'MANTENIMIENTO') selected @endif>MANTENIMIENTO</option>
                            </select>
                        </div>

                        <div class="d-flex" style="gap: 10px">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('room.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
