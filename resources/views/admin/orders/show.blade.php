@extends('layouts.app')
@section('content')
    <div>
        <ul>

            <li>
               Prezzo Totale: {{ $order->ship_cost }} €
            </li>
            <li>
                Indirizzo di consegna: {{ $order->customer_address }}
            </li>
            <li>
                Nome cliente: {{ $order->customer_name }}
            </li>
            <li>
                Cognome cliente: {{ $order->customer_surname }}
            </li>
            <li>
               Mail cliente {{ $order->customer_email }}
            </li>
            <li>
               Telefono cliente {{ $order->customer_phone}}
            </li>
        </ul>
        <div class="col-4 d-flex ">
            <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-outline-danger">Elimina</button>
            </form>
        </div>
    </div>
@endsection
