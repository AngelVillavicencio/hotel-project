@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>Clientes</div>
                        <div style="justify-content: end;">
                            <a href="{{ route('customer.create') }}">Nuevo</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <p>¿ Seguro que desea eliminar al cliente ?</p>

                    <table class="table">
                        <th>
                            <tr>
                                <th>Tipo Documento</th>
                                <th>Número Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Sexo</th>
                                <th>Dirección</th>
                            </tr>
                        </th>
                        <tr>
                            <td>{{ $customer->document_identification }}</td>
                            <td>{{ $customer->document_identification_number }}</td>
                            <td>{{ $customer->name_one }} {{ $customer->name_two }}</td>
                            <td>{{ $customer->lastname_one }} {{ $customer->lastname_two }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->address }}</td>
                        </tr>
                    </table>

                    <form action="{{ route('customer.destroy', ['customer' => $customer]) }}" method="post">
                        @csrf
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary">Regresar</a>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection