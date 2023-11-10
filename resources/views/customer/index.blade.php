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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo Documento</th>
                                <th>Número Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Sexo</th>
                                <th>Dirección</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->document_identification }}</td>
                                <td>{{ $customer->document_identification_number }}</td>
                                <td>{{ $customer->name_one }} {{ $customer->name_two }}</td>
                                <td>{{ $customer->lastname_one }} {{ $customer->lastname_two }}</td>
                                <td>{{ $customer->gender }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <div style="display: flex; gap: 10px">
                                        <a href="{{ route('customer.edit', ['customer' => $customer]) }}" class="btn btn-primary">Editar</a>
                                        <a href="{{ route('customer.delete', ['customer' => $customer]) }}" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $customers->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection