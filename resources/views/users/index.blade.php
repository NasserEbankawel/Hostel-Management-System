

@extends('layout.master')

@section('content')


<a class="btn btn-outline-primary" href="{{route('users.create')}}">Add New User</a>
<table class="table table-Secondary table-striped">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">Email</th>
      <!-- <th scope="col">Password</th> -->
      <th scope="col">Role</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id}} </th>
      <td> {{ $user->fullname}} </td>
      <td> {{ $user->email}} </td>
   <!--    <td> {{ $user->password}} </td> -->
      <td> {{ $user->role}} </td>
      <td>
        <a class="btn btn-outline-primary" href="{{route('users.show', $user->id)}}">View</a>
        <a class="btn btn-outline-warning" href="{{route('users.edit',$user->id)}}">edit</a>
        <x-deletebutton :action="route('users.destroy', $user->id)" /> 
 <!--        <a class="btn btn-outline-danger" href="{{route('users.destroy', $user->id)}}">delete</a> -->
        
      </td>
    </tr>

    @endforeach
   
  </tbody>
</table>

@endsection

@section('title', 'list of Users')
