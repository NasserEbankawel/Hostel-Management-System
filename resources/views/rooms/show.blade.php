@extends('layout.master')

@section('content')
<div class="container">
    <h1>Room {{ $room->room_number }}</h1>
    <p><strong>Room Type:</strong> {{ $room->type }}</p>
    <p><strong>Hostel:</strong> {{ $room->hostel->name }}</a></p>
    <p><strong>Status:</strong> {{ $room->status }}</p>
    
    <a href="{{ route('rooms.index', ['room' => $room->id]) }}" class="btn btn-primary">Back to Room List</a>
    <a href="{{ route('rooms.edit', ['room' => $room->id]) }}" class="btn btn-secondary">Edit Room</a>
    
    
   
</div>
@endsection