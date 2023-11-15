@extends('layouts.app')

@section('content')

    <div 
        id="BookingForm"
        data-booking-store={{ route('booking.store') }}>
    </div>

@endsection
