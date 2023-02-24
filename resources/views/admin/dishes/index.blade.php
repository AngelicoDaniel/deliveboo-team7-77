@extends('layouts.app')
@section('content')
    <h1>Lista piatti:</h1>
    <ol>
        @foreach ($dishes as $dish)
            <li> <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}">{{ $dish->name }}</a>
                <ul>
                    <li>{{ $dish->price }} €</li>
                    <li><img src="{{ $dish->image }}" alt=""></li>

                </ul>
                <ul>



                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                   Sicuro di voler eliminare il piatto
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <Button type="submit" class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </Button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <ul>
                    <form>

                        <button class="btn btn-success"><a class="text-white"
                                href="{{ route('admin.dishes.edit', $dish->id) }}">EDIT</button>
                    </form>
                </ul>
            </li>
        @endforeach
    </ol>
@endsection
