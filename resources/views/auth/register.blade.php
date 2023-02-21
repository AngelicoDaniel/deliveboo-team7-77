@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" address="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row mt-3">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo') }}
                                <span class="text-warning">*</span></label>
                            <div class="col-md-6">
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address"
                                    placeholder="Inserisci l'indirizzo">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="PIVA"
                                class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA') }}
                                <span class="text-warning">*</span></label>
                            <div class="col-md-6">
                                <input id="piva" type="text"
                                    class="form-control @error('PIVA') is-invalid @enderror" name="PIVA"
                                    value="{{ old('vat') }}" required minlength="11" maxlength="11"
                                    pattern="[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]"
                                    autocomplete="PIVA" placeholder="VAT Number">
                                <small>La partita IVA deve essere di 11 cifre</small>
                                @error('PIVA')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" required autocomplete="slug" autofocus>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group row">
                            <label for="image_logo"
                                class="col-md-4 col-form-label text-md-right">{{ __('image_logo') }}
                                <span class="text-warning">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="image_logo" required>
                            </div>
                        </div>
                    </div>

                    <div class="my-4">
                        <label for="">Types:</label>
                            @foreach ($types as $type)
                                <label for="">
                                    <input type="checkbox" name="types[]" value="{{ $type->id }}">
                                    {{ $type->name }}
                                </label>
                            @endforeach
                    </div>
                    {{-- <div class="form-group row">
                        <p class="col-md-4 col-form-label text-md-right">Tipologia ristorante <span
                                class="text-warning">*</span></p>
                        <div class="offset-md-8"></div>
                        @foreach ($types as $type)
                            <div class="offset-md-4 col-md-8">
                                <input
                                    class="categoryInput form-check-input @error('types') is-invalid @enderror"
                                    type="checkbox" name="types[]" value="{{ $type->id }}"
                                    {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} />
                                <label> {{ $type->name }}</label>

                            </div>
                        @endforeach
                        <small id="alert-checkbox" class="alert alert-danger m-auto"
                            style="display: none">Seleziona almeno una
                            tipologia!!</small>
                        @error('types')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
