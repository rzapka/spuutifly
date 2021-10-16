@extends('auth.login&register')
@section('form')
<form method="POST" class="registerForm" action="{{ route('register') }}">
    @csrf
    <h1>Zarejestruj się!</h1>
    <label for="username">Nazwa użytkownika</label>
    <div>
        <input id="username" type="text" class="@error('name') is-invalid @enderror" name="username"
            value="{{ old('username') }}" required autocomplete="username" autofocus>
        @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <label for="email">Adres e-mail</label>
    <div>
        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <label for="phone">Numer telefonu </label>
    <div>
        <input id="phone" class="@error('phone') is-invalid @enderror" name="phone"
               value="{{ old('phone') }}" required autocomplete="phone">
        @error('phone')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <label for="password">Hasło </label>
    <div>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required
            autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label for="password-confirm">Potwierdź Hasło </label>

    <div>
        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="w-100">
        <button type="submit" class="registerBtn">
            Zarejestruj się
        </button>
    </div>
    <p class="mt-4 go-to-login">Masz już konto ? Zaloguj się <a href="{{ route('login') }}"
            class="text-white">tutaj.</a></p>
</form>
@endsection
