@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservaciones</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('customer.store') }}" method="post">
                        @csrf

                        <div id="BookingForm"></div>

                        <div class="d-flex" style="gap: 10px">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
