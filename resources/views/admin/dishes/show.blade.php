@extends('layouts.app')
@section('content')
<div class="text-center my-5">
    <h2>{{ $single_dish->name }}</h2>
    <p>Descrizione:  {{ $single_dish->description }}</p>
    <p>Prezzo: {{ $single_dish->price }}€</p>
    <img src="{{$single_dish->image}}" alt="">
    <img class="w-25" src="{{ asset("storage/$single_dish->image") }}" alt="">
</div>
@endsection
