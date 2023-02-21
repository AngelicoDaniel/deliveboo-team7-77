@extends('layouts.app')
@section('content')
<form action="{{route('admin.dishes.update', $dish->id)}}" method="POST">

    @csrf
    @method('PUT')

    {{-- <div class="mb-3">
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

    <button type="submit" class="btn btn-primary">aggiungi piatto</button> --}}

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome piatto') }}
            <span class="text-warning">*</span></label>
        <div class="col-md-6">
            <input id="name" type="text"
                class="form-control @error('name') is-invalid @enderror" name="name"
                value='{{$dish->name}}' required autocomplete="name"
                placeholder="Inserisci il nome del piatto" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row mt-3">
        <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Prezzo') }}
            <span class="text-warning">*</span></label>
        <div class="col-md-6">
            <input id="price" type="number" min="0.1" step=".01"
                class="form-control @error('price') is-invalid @enderror" name="price"
                value='{{$dish->price}}' required autocomplete="price" placeholder="10.00">
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="image"
            class="col-md-4 col-form-label text-md-right">{{ __('Immagine ristorante') }}
            <span class="text-warning">*</span>
        </label>
        <div class="col-md-6">
            <input type="file" class="form-control-file" name="image" required>
        </div>
    </div>

      <div class="form-group row">
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}
            <span class="text-warning">*</span></label>
        <div class="col-md-6">
            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                rows="3" name="description" required autocomplete="description" minlength="10"
                placeholder="Inserisci la descrizione del piatto">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="visibility" class="col-md-4 col-form-label text-md-right">{{ __('Visibile') }}
            <span class="text-warning">*</span></label>
        <div class="col-md-6">
            <select class="form-control" name="visibility"
                required autocomplete="visibility">
                <option value="1">Si</option>
                <option value="0">No</option>
                @error('visibility')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">modifica piatto</button>



</form>

@endsection

