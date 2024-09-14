@extends('layout.master')

@section('title','Edit '.$room->room_number)

@section('content')
    @include('rooms.form',[ 
        'action' => route('rooms.update', $room->id), 
        'edit' => true ]
        )
@endsection
