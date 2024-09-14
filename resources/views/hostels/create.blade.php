@extends('layout.master')
@section('title', 'Add New Hostel')
  
@section('content')
   
   <!--  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        @include('hostels.form', ['action' => route('hostels.store')])
@endsection
