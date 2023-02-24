@extends('layouts.app')
@section('content')
    <h1>Lista piatti:</h1>
    <ol>
        @foreach ($dishes as $dish)
            <li> <a href="{{ route('admin.dishes.show', ['dish' => $dish]) }}">{{ $dish->name }}</a>
                <ul>
                    <li>{{ $dish->price }} €</li>
                    <li><img src="{{ $dish->image }}" alt=""></li>
                    <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <Button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </Button>
                    </form>
                    <form>

                        <button class="btn btn-success"><a class="text-white"
                                href="{{ route('admin.dishes.edit', $dish->id) }}">EDIT</button>
                    </form>
                </ul>
            </li>
        @endforeach
    </ol>
@endsection
