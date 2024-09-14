@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('hostels.create')}}">Add New Hostel</a>

<table class="table table-Secondary table-striped">
  <thead>
    <tr>
      <th scope="col">Hostel ID</th>
      <th scope="col">Hostel Name</th>
      <th scope="col">Location</th>
      <th scope="col">Total Rooms</th>
      <th scope="col">Warden Name</th>
      <th scope="col">Contact</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($hostels as $hostel)
    <tr>
      <th scope="row">{{ $hostel->id}}</th>
      <td>{{ $hostel->name}}</td>
      <td>{{ $hostel->location}}</td>
      <td>{{ $hostel->total_rooms}}</td>
      <td>{{ $hostel->warden_name}}</td>
      <td>{{ $hostel->contact_number}}</td>
      <td>
        <a class="btn btn-outline-primary" href="{{route('hostels.show', $hostel->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('hostels.edit', $hostel->id)}}">edit</a>
        <x-deletebutton :action="route('hostels.destroy', $hostel->id)" /> 
        <!-- <a class="btn btn-outline-danger" href="{{route('hostels.destroy', $hostel->id)}}">delete</a> -->
      </td>
    </tr>

  @endforeach
   
  </tbody>
</table>

@endsection

@section('title', 'list of hostels')