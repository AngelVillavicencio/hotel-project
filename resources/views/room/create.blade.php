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

                    <form action="{{ route('room.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="room_number">Número de Habitación *</label>
                            <input type="text" name="room_number" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="room_type">Tipo de Habitación *</label>
                            <select name="room_type" class="form-control" required>
                                <option value="SIMPLE">SIMPLE</option>
                                <option value="MATRIMONIAL">MATRIMONIAL</option>
                                <option value="CAMA_DOBLE">CAMA DOBLE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Precio *</label>
                            <input type="number" name="price" class="form-control" step="0.01" requiredd>
                        </div>

                        <div class="form-group">
                            <label for="status">Estado de Habitación *</label>
                            <select name="status" class="form-control" required>
                                <option value="DISPONIBLE">DISPONIBLE</option>
                                <option value="MANTENIMIENTO">MANTENIMIENTO</option>
                            </select>
                        </div>

                        <div class="d-flex" style="gap: 10px">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="{{ route('room.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
