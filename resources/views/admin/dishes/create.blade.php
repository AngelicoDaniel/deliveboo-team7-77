@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="text-center">
        <h1>Create a Dish</h1>

    </div>

    <form action="{{ route('admin.dishes.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
            {{-- @error('title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea class="form-control" name="ingredients"></textarea>
            {{-- @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input class="form-control" name="price">
            {{-- @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>

        <div class="mb-3">
            <label for="visible" class="form-label">Visible</label>
            <input class="form-control" name="visible">
            {{-- @error('body')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror --}}
        </div>

        <div class="form-group row">
            <label for="image"
                class="col-md-4 col-form-label text-md-right">{{ __('image') }}
                <span class="text-warning">*</span>
            </label>
            <div class="col-md-6">
                <input type="file" class="form-control-file" name="image" required>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
@endsection


