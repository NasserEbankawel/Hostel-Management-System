@extends('layout.master')
@section('title', 'Add New Room')
  
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
        @include('rooms.form', ['action' => route('rooms.store')])
@endsection
