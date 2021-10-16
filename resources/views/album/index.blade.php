@extends('layouts.app')
@section('search')
    <input type="text" class="searchInput" placeholder="Szukaj..." name="phrase">
    <i class="fas fa-search"></i>
@endsection
@section('main')
<h2 class="mt-lg-2 mt-5 mb-5">Nasza Muzyka</h2>
<div class="items row">
    @foreach($albums as $album)
        <div class="item col-2 mb-2">
            <a
                href="{{ route('get.album', ['id' => $album->id]) }}"><img
                    src="{{ asset($album->photo) }}"></a>
            <p class="mt-2 albumTitle">{{ $album->title }}</p>
        </div>
    @endforeach
</div>
@endsection
@section('customjavascripts')
<script src="{{ mix('js/albums.js') }}"></script>
<script src="{{ mix('js/searchAlbums.js') }}"></script>
@endsection
