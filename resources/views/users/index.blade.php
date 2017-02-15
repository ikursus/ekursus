@extends('layouts/app')

@section('content')

@if( count($users))

@foreach($users as $user)

<li><a href="{{ url('member/' . $user->id . '/edit') }}">{{ $user->nama }}</a></li>

@endforeach

@endif


@endsection
