@extends('layouts.app')

@section('content')
    <div class="spacer">
        <img class="img_spacer" src="{{ asset('storage/lightgreen_wave.png') }}" alt="">
    </div>
    <div id="backend_container"class="">
        <div class="backend_wrap">

            <div id="main_container" class="main_container_home">
                <h1 class="text-center" > <strong>{{ $user->name }}</strong> benvenuto nella tua dashboard</h1>
                <div class="card m-3 shadow">

                    <div class="card-body row">
                        <div class="col-md-8">
                            <h4>Il tuo ristorante {{ $user->name }}</h4>
                            <hr>
                            <p class="card-title">Il tuo Indirizzo: {{ $user->address }}</p>
                            <p class="card-title">P.Iva: {{ $user->PIVA }}</p>
                        </div>
                        <div class="col-md-4">
                            <h4>Immagine</h4>
                            <hr>
                            <img class="w-25" src="{{ asset("storage/$user->image_logo") }}" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
