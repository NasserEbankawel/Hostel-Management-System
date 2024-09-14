<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hostel;
use App\Models\Room;
use App\Mail\NewItemAdded;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', [
            'rooms' => $rooms
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Fetch all hostels for the dropdown

        $hostels = Hostel::all(['id','name'])->map(function ($hostel) {
            return [ 
                'value' => $hostel->id,
                'label' => $hostel->name
            ];
        });
        return view('rooms.create', ['hostels' => $hostels], [ "room" => new Room ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'room_number' => 'required|string|max:50|unique:rooms',
            'type' => 'required|in:single,double,dormitory',
            'status' => 'required|in:occupied,available',
            'capacity' => 'required|integer',
            'price_per_month' => 'required|numeric',
            'hostel_id' => 'required|exists:hostels,id', // Foreign key constraint
        ]);

        $room = Room::create($data);

        Mail::to('recipient@example.com')->send(new NewItemAdded($room, 'room'));

        return redirect()->route('rooms.index')->with('alertMessage', "Room {$data['room_number']} added successfully")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        return view('rooms.show', ['room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
         // Get all hostels for the dropdown

        $hostels = Hostel::all(['id','name'])->map(function ($hostel) {
            return [ 
                'value' => $hostel->id,
                'label' => $hostel->name
            ];
        });

        return view('rooms.edit', [
            'room' => $room,
            'hostels' => $hostels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'room_number' => 'required|string|max:50|unique:rooms,room_number,' . $room->id,
            'type' => 'required|in:single,double,dormitory',
            'status' => 'required|in:occupied,available',
            'capacity' => 'required|integer',
            'price_per_month' => 'required|numeric',
            'hostel_id' => 'required|exists:hostels,id', // Foreign key constraint
        ]);

        $room->update($data);
        return redirect()->route('rooms.index')->with('alertMessage', "Room {$room->room_number} updated successfully")->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('alertMessage', "Room {$room->room_number} deleted successfully")->with('type', 'success');
    }
}
