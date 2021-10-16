@extends('auth.login&register')
@section('form')
<form method="POST" action="{{ route('login') }}" class="loginForm">
    @csrf
    <h1>Zaloguj się!</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger mx-auto mt-4 w-100" role="alert" >
            <strong>{{ session()->get('error') }}</strong>
        </div>
    @endif
    <h5><label for="email">Adres e-mail </label></h5>
    <div>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <h5 class="mt-3"><label for="password">Hasło</label></h5>
    <div>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required
            autocomplete="current-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div>
        <div class="remember-me">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                Zapamiętaj mnie
            </label>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div>
            <button type="submit" class="registerBtn">
                Zaloguj się
            </button>
            @if(Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Zapomniałeś Hasła ?
                </a>
            @endif
        </div>
    </div>
    <p class="text-right mt-4 w-100 go-to-register">Nie masz jeszcze konta ? Zarejestruj się <a
            href="{{ route('register') }}" class="text-white">tutaj.</a></p>
</form>
@endsection
