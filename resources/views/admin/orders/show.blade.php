@extends('layouts.app')
@section('content')
    <div>
        <div id="user_index" class="row flex-column justify-content-center mb-5">
            <h1 class="col-12 text-center p-3 mb-5 shadow">
                PIATTI ORDINATI
            </h1>
                    <div class="card m-3 shadow">

                        <div class="card-body row">
                            <div class="col-md-12">
                                <h4>Ordine n. {{ $order->order_number  }}</h4>
                                 <hr>
                                <p>Nigiri di salmone</p>
                                <p>Prezzo: 5.00€</p>
                                <hr>
                                <p>Nigiri di tonno</p>
                                <p>Prezzo: 5.00€</p>
                                <hr>
                                <p>Uramaki</p>
                                <p>Prezzo: 7.00€</p>



                            </div>
                        </div>
                    </div>

        <div class="col-4 d-flex ">
            <form action="{{ route('admin.orders.destroy', ['order' => $order]) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-outline-danger">Elimina</button>
            </form>
            <div >
                <a  class="btn btn-outline-danger" href="{{ route('admin.orders.index') }}" >Indietro</a>
            </div>

        </div>
    </div>
@endsection
