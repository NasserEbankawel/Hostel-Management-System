@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('rooms.create')}}">Add New Room</a>

<table class="table table-Secondary table-striped">
  <thead>
    <tr>
      <th scope="col">Room ID</th>
      <th scope="col">Room Number</th>
      <th scope="col">Type</th>
      <th scope="col">Status</th>
      <th scope="col">Capacity</th>
      <th scope="col">Price</th>
      <th scope="col">Hostel</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($rooms as $room)
    <tr>
      <th scope="row">{{ $room->id}}</th>
      <td>{{ $room->room_number}}</td>
      <td>{{ $room->type}}</td>
      <td>{{ $room->status}}</td>
      <td>{{ $room->capacity}}</td>
      <td>{{ $room->price_per_month}}</td>
      <td>{{ $room->hostel->name}}</td>
      <td>
        <a class="btn btn-outline-primary" href="{{route('rooms.show', $room->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('rooms.edit', $room->id)}}">edit</a>
        <x-deletebutton :action="route('rooms.destroy', $room->id)" /> 
<!--        <a class="btn btn-outline-danger" href="{{route('rooms.destroy', $room->id)}}">delete</a> -->
      </td>
    </tr>

  @endforeach

</table>

@endsection

@section('title', 'list of rooms')
