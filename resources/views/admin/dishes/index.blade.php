@extends('layouts.app')

@section('content')
    <h1>Lista piatti:</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Immagine</th>
                <th>Elimina</th>
                <th>Modifica</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dishes as $dish)
                <tr>
                    <td><a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}">{{ $dish->name }}</a></td>
                    <td>{{ $dish->price }} €</td>
                    <td>
                        @if ($dish->image)
                            <img class="w-50" src="{{ asset('storage/' . $dish->image) }}" alt="">
                            <img src="{{$dish->image}}" alt="">
                        @else
                            <p>Immagine non disponibile</p>
                        @endif
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal-{{ $dish->id }}">
                            <i class="fa-solid fa-trash"></i>
                        </button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal-{{ $dish->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $dish->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                            id="deleteModalLabel-{{ $dish->id }}">Elimina piatto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare il piatto? "{{ $dish->name }}"?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.dishes.destroy', $dish->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.dishes.edit', $dish->id) }}"
                            class="btn btn-primary">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
