@extends('layouts.app')
@section('search')
    <div class="searchInput"></div>
@endsection
@section('main')
<section class="profile">
    <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        Wyloguj się
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST"
          class="d-none">
        @csrf
    </form>
    <h1 class="text-white-50 text-capitalize profile__h1">Witaj
        <span class="font-weight-bold text-white">
            {{ $user->username }}</span> na Spuutifly!
        </h1>
    @empty($user->avatar)
        <img src="{{ asset('storage/images/profile-pics/default-avatar.jpg') }}"
             alt="avatar" class="avatar mt-3">
    @else
        <img src="{{ asset('storage/' . $user->avatar) }}"
             alt="avatar" class="avatar mt-3">
    @endempty
    <h2 class="text-white-50 mt-5 profile__h2">Twój adres e-mail: <span class="text-white">{{ $user->email }}</span></h2>
    <h2 class="text-white-50 mt-3 profile__h2">Twój numer telefonu: <span class="text-white">
            @empty($user->phone) nieznany @else {{$user->phone}} @endempty
        </span></h2>
    <a href="{{ route('edit.profile') }}" class="btn btn-light mt-5 profile__btn">Zmień dane</a>
</section>
@endsection
@section('customjavascripts')
    <script src="{{ mix('js/albums.js') }}"></script>
@endsection
