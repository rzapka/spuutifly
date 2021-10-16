@extends('layouts.app')
@section('search')
    <div class="searchInput"></div>
@endsection
@section('main')
<section class="profile-edit">
    <a href="{{route('get.profile')}}" class="back">Wróć do profilu</a>
    <form class="userData" method="post" action="{{ route('update.profile') }}"
          enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="avatarWrapper">
            @empty($user->avatar)
                <img src="{{ asset('storage/images/profile-pics/default-avatar.jpg') }}"
                     alt="avatar" class="avatar mt-3">
                @else
                <img src="{{ asset('storage/' . $user->avatar) }}"
                     alt="avatar" class="avatar mt-3">
                @endempty
            <input type="file" class="ml-3" name="avatar" id="avatar">
        </div>
        @error('avatar')
        <div class="invalid-feedback d-block"> {{ $message }} </div>
        @enderror
        <div class="form-group mt-3">
            <label for="email" class="editLabel">Nowy adres e-mail </label>
            <input type="email" class="form-control" id="email" name="email"
                   value="{{ old('email', $user->email) }}">
            @error('email')
            <div class="invalid-feedback d-block"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone" class="editLabel">Numer telefonu </label>
            <input  class="form-control" id="phone"
                    value="{{ old('phone', $user->phone) }}" name="phone">
            @error('phone')
            <div class="invalid-feedback d-block"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="editLabel" for="password">Nowe hasło </label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <div class="invalid-feedback d-block"> {{ $message }} </div>
            @enderror
        </div>
        <div class="form-group">
            <label class="editLabel" for="password-confirm">Potwierdź nowe hasło </label>
            <input type="password" class="form-control" id="password-confirm"
               name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary editLabel">Zapisz zmiany</button>
    </form>
</section>
@endsection
@section('customjavascripts')
    <script src="{{ mix('js/albums.js') }}"></script>
@endsection
