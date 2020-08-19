@extends('page_login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="style-log">
                <div class="card-header">{{ __('S\'Inscrire') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nom d'artiste">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lien_facebook" class="col-md-4 col-form-label text-md-right">Lien Facebook</label>
                            <div class="col-md-6">
                                <input id="lien_facebook" type="text" class="form-control @error('lien facebook') is-invalid @enderror"
                                       name="lien_facebook" value="{{ old('lien_facebook') }}" required autocomplete="lien_facebook" autofocus placeholder="Lien facebook">

                                @error('lien facebook')
                                <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lien_instagram" class="col-md-4 col-form-label text-md-right">Lien Instagram</label>

                            <div class="col-md-6">
                                <input id="lien_instagram" type="text" class="form-control @error('lien instagram') is-invalid @enderror"
                                       name="lien_instagram" value="{{ old('lien_instagram') }}" required autocomplete="lien_instagram" autofocus placeholder="Lien instagram">

                                @error('lien instagram')
                                <span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de passe">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> Bienvenu {{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer mot de passe">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Enregistrer') }}
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
