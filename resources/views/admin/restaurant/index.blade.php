@extends('layouts.dashboard')

@section('content')
    <h1>Il Tuo ristorante</h1>
   <p>Nome del tuo ristorante:  {{$user->name}}</p>
   <p>Indirizzo del tuo ristorante:  {{$user->address}}</p>
   <p>P.iva del tuo ristorante:  {{$user->vat}}</p>

    <ul>
        <h3 class="nav-item">
            <a class="nav-link" href="{{route('admin.dishes.index')}}">Menu del tuo ristorante</a>
        </h3>
    </ul>
@endsection
