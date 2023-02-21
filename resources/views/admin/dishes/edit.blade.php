@extends('layouts.app');
@section('content')
<form action="{{route('admin.dishes.update', $dish->id)}}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
      <label for="name" class="form-label">nome piatto</label>
      <input type="text" class="form-control" id="name" name="name" value='{{$dish->name}}'>

    </div>

    <div class="mb-3">
      <label for="price" class="form-label">prezzo</label>
      <input type="number" class="form-control" id="price" name="price" value='{{$dish->price}}'>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">url immagine</label>
        <input type="url" class="form-control" id="image" name="image" value='{{$dish->image}}'>
      </div>

    <div class="mb-3">
        <label for="description" class="form-label">decrizione</label>
        <input type="text" class="form-control" id="description" name="description" value='{{$dish->description}}'>

    </div>

    <div class="mb-3 form-check">
      <input value="1" type="checkbox" class="form-check-input" id="visibility" name="visibility" value='{{$dish->visibility}}'>
      <label class="form-check-label" for="visibility">visibilità</label>
    </div>

    <button type="submit" class="btn btn-primary">aggiungi piatto</button>


</form>

@endsection

