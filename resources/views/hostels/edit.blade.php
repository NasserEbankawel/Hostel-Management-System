
@extends('layout.master')

@section('title','Edit '.$hostel->name)

@section('content')
    @include('hostels.form',[ 
        'action' => route('hostels.update', $hostel->id), 
        'edit' => true ]
        )
@endsection





