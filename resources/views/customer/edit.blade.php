@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Clientes</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.update', ['customer' => $customer]) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="name_one">Primer Nombre *</label>
                            <input type="text" name="name_one" class="form-control" value="{{ $customer->name_one }}" required>
                        </div>

                        <div class="form-group">
                            <label for="name_two">Segundo Nombre</label>
                            <input type="text" name="name_two" class="form-control"  value="{{ $customer->name_two }}">
                        </div>

                        <div class="form-group">
                            <label for="lastname_one">Primer Apellido *</label>
                            <input type="text" name="lastname_one" class="form-control"  value="{{ $customer->lastname_one }}" required>
                        </div>

                        <div class="form-group">
                            <label for="lastname_two">Segundo Apellido *</label>
                            <input type="text" name="lastname_two" class="form-control" value="{{ $customer->lastname_two }}" required>
                        </div>

                        <div class="form-group">
                            <label for="document_identification">Tipo Documento *</label>
                            <select name="document_identification" class="form-control" required>
                                <option value="DNI" @if ($customer->document_identification == 'DNI') selected @endif>DNI</option>
                                <option value="PASAPORTE" @if ($customer->document_identification == 'PASAPORTE') selected @endif>PASAPORTE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="document_identification_number">Numero Documento *</label>
                            <input type="text" name="document_identification_number" class="form-control" value="{{ $customer->document_identification_number }}" required>
                        </div>

                        <div class="form-group">
                            <label for="gender">Sexo *</label>
                            <select name="gender" class="form-control" required>
                                <option value="MASCULINO" @if ($customer->gender == 'MASCULINO') selected @endif>MASCULINO</option>
                                <option value="FEMENINO" @if ($customer->gender == 'FEMENINO') selected @endif>FEMENINO</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección *</label>
                            <input type="text" name="address" class="form-control" value="{{ $customer->address }}" required>
                        </div>

                        <div class="d-flex" style="gap: 10px">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
