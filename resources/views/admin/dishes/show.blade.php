@extends('layouts.dashboard')

@section('content')
<div class="text-center">
    <h1>{{ $single_dish->name }}</h1>
    <p>{{ $single_dish->ingredients }}</p>
</div>

@endsection
