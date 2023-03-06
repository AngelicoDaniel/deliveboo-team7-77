@extends('layouts.app')

@section('content')

    <div id="user_index" class="row flex-column justify-content-center mb-5">
        <h1 class="col-12 text-center p-3 mb-5 shadow">
            I TUOI ORDINI
        </h1>

        @if ($orders->count() > 0)
            @foreach ($orders as $order)
                <div class="card m-3 shadow">

                    <div class="card-body row">
                        <div class="col-md-12">
                            <h4>Ordine n. {{ $order->order_number  }}</h4>
                            <hr>
                            <p class="card-title">Nome e cognome cliente: {{ $order->customer_name }}
                                {{ $order->customer_surname }}</p>
                            <p class="card-title">Indirizzo: {{ $order->customer_address }}</p>

                            <p class="card-title">Telefono: {{ $order->customer_phone }}</p>
                            <p class="card-title">Email: {{ $order->customer_email }}</p>
                            <p class="card-title">Totale: €{{ $order->ship_cost }}</p>
                        </div>
                        {{-- <div class="col-md-6">
                            <h4 class="mt-md-0 mt-3">Piatti ordinati</h4>
                            <hr>

                            <div>
                                @foreach ($order->plate as $plate)
                                    <p class="card-title">{{ $plate->pivot->quantity }}x {{ $plate->name }} -
                                        €{{ $plate->pivot->quantity * $plate->price }}</p>
                                    <div class="md-0">
                                    </div>
                                @endforeach
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach
        @else
            <h4 class="text-center">Non hai ancora nessun ordine.</h4>
        @endif
    </div>
@endsection
