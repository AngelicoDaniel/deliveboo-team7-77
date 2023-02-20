@extends('layouts.dashboard')
@section('content')
<h1>Lista piatti</h1>
<button><a class="nav-link" href="{{route('admin.dishes.create')}}">Crea piatto</a></button>
@foreach ($dish as $elem)

    <div class="d-flex">
        <h3>
            <a href="{{ route('admin.dishes.show', $elem->id) }}">{{$elem->name}}</a>
            @csrf
        </h3>

        <h3>
            Il prezzo: {{$elem->price}}

        <form action="{{ route('admin.dishes.destroy', $elem->id)}}" method="POST">
            @csrf
            @method('DELETE')
                <Button type="submit" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                </Button>
            </form>
            <form>
                <a href="{{ route('admin.dishes.edit', $elem->id)}}"><i class="fa-solid fa-pencil"></i></a>
            </form>

    </div>
    {{-- <p>{{$elem->ingredients}}</p>
   <p>{{$elem->price}}</p> --}}
@endforeach

@endsection


