@extends('layouts.main')

@section('content')
    <h4 class="btn btn-info">Assalomu alaykum {{ 'bollar' }}</h4>
    <p>Ismi : {{$array['name']??''}}</p>
    <p>Familya : {{$array['fullname']??''}}</p>

    <img src="{{ asset('upload/images/panda.jpg') }}" width="300px" alt="">

@endsection
