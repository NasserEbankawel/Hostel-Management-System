@extends('layout.master')


@section('content')
<div class="container">
    <h1>{{ $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <!-- <p><strong>Hostel:</strong> {{ $user->hostel ? $user->hostel->name : 'N/A' }}</p> -->
    <p><strong>Role:</strong> {{ $user->role }}</p>
    
    <a href="{{ route('users.index', ['user' => $user->id]) }}" class="btn btn-primary">Back to User List</a>
    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-secondary">Edit User</a>
    
    
</div>
@endsection
