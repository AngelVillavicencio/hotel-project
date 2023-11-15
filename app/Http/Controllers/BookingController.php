<?php

namespace App\Http\Controllers;

use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::query()->where('deleted','=',false)->paginate(10);
        return view('booking.index', compact('bookings'));
    }

    public function create()
    {
        return view('booking.create');
    }

    public function store(Request $request) 
    {
        $body = $request->all();
        
        $customer = $body['customer'];
        $check = $body['check'];
        $dni = $body['dni'];
        $gender = $body['gender'];
        $room = $body['room'];
        $price = $body['price'];
        $payment_type = $body['payment_type'];
        $observations = $body['observations'];

        $checkin = $check[0];
        $checkout = $check[1];
        
        $booking = new Booking();
        $booking->customer = $customer;
        $booking->checkin = Carbon::parse($checkin)->timezone('America/Lima');
        $booking->checkout = Carbon::parse($checkout)->timezone('America/Lima');
        $booking->dni = $dni;
        $booking->gender = $gender;
        $booking->room = $room;
        $booking->gender = $gender;
        $booking->price = $price;
        $booking->payment_type = $payment_type;
        $booking->observations = $observations;
        $booking->save();

        return response()->json(['message' => 'Recurso creado correctamente'], 201);
    }
}
