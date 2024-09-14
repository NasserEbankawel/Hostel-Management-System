@extends('layout.master')

@section('content')
<div class="container">
    <h1>{{ $hostel->name }}</h1>
    <p><strong>Location:</strong> {{ $hostel->location }}</p>
    <p><strong>Total Rooms:</strong> {{ $hostel->total_rooms }}</p>
    <p><strong>Warden Name:</strong> {{ $hostel->warden_name }}</p>
    <p><strong>Contact Number:</strong> {{ $hostel->contact_number }}</p>
    
    <a href="{{ route('hostels.index', ['hostel' => $hostel->id]) }}" class="btn btn-primary">Back to Hostel List</a>
   
    <a href="{{ route('hostels.edit', ['hostel' => $hostel->id]) }}" class="btn btn-secondary">Edit Hostel</a>
    
    
</div>
@endsection


