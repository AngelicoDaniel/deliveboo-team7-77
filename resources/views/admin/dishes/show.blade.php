@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1>Nome piatto: {{ $single_dish->name }}</h1>
    <p>Ingredienti: {{ $single_dish->ingredients }}</p>
    <p>prezzo:{{ $single_dish->price }} euro</p>
    <img src="{{$single_dish->image}}" alt="">
    <img src="{{ asset("storage/$single_dish->image") }}" alt="">
</div>
@endsection
