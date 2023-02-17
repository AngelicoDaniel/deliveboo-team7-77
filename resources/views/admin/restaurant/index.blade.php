@extends('layouts.dashboard')

@section('content')
    <h1>ristoranti</h1>
    {{$userId}} | {{$user->name}}

    <ul>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dishes.index')}}">Lista Ristoranti</a>
        </li>
    </ul>
@endsection
