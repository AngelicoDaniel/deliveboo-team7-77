@extends('layouts.dashboard')

@section('content')
    <h1>ristoranti</h1>
    {{$userId}} | {{$user->name}}

    <ul>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.pages.dishes.index')}}">Lista Piatti</a>
        </li>
    </ul>
@endsection
