<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $rooms = Room::query()->where('deleted','=',false)->paginate(10);
        return view('room.index', compact('rooms'));
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $room = new Room();
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->deleted = false;
        $room->save();
        
        return redirect()->route('room.index')->with('alert_message','Se registró la habitación.');
    }

    public function edit(Room $room)
    {
        return view('room.edit', compact('room'));
    }

    public function update(Room $room, Request $request)
    {
        $room->room_number = $request->room_number;
        $room->room_type = $request->room_type;
        $room->price = $request->price;
        $room->status = $request->status;
        $room->save();
        
        return redirect()->route('room.index')->with('alert_message','Se actualizó la habitación.');
    }

    public function delete(Room $room) 
    {
        return view('room.delete', compact('room'));
    }

    public function destroy(Room $room)
    {
        $room->deleted = true;
        $room->save();

        return redirect()->route('room.index')->with('alert_message','Se eliminó la habitación.');
    }
}
