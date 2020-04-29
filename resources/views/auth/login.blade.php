@extends('page_login')
@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-8" >
            <div class="card" id="style-log">
            <div class="card-header" style="display: inline-block">
                <div class="float-left" >
                    {{ __('S\'IDENTIFIER') }}
                           </div>

                    <div  class="float-right" >
                        <a href="{{route('enregistrer_user')}}" target="_self" class="style-register" >
                    {{ ('S\'INSCRIRE') }}
                        </a>
                </div>
             </div>
                <div class="card-body">

                      {{--          Message pour bannir un user--}}

                        @if (session('message'))
                            <div class="alert alert-danger">{{ session('message') }}</div>
                        @endif


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col-12 text-center">
                        <p id="style-text">Connectez-vous avec votre adresse e-mail pour continuer</p>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Connexion') }}
                                </button>

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link-dark" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Mot de passe oublié ?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
