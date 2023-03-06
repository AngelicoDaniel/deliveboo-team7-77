@extends('layouts.app')
@section('content')
    <div>
        <ul>
            <li>
                {{ $order->order_number }}
            </li>
            <li>
                {{ $order->ship_cost }} €
            </li>
            <li>
                {{ $order->customer_address }}
            </li>
            <li>
                {{ $order->customer_name }}
            </li>
            <li>
                {{ $order->customer_email }}
            </li>
            <li>
                {{ $order->customer_phone}}
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
