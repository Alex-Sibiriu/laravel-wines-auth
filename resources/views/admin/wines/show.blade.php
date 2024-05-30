@extends('layouts.main')

@section('content')
  <div class="container pt-4 text-white">

    <h1 class=" text-center py-3">{{ $wine->wine }}</h1>

    <div class="d-flex justify-content-center pt-5">
      <div class=" pe-5">
        <img src="{{ $wine->image }}" alt="{{ $wine->wine }}">
      </div>

      <div class="ps-5 pt-5 ">
        <p class="pt-3"><strong>Vigna: </strong>{{ $wine->winery }}</p>
        <p class="pt-3"><strong>Voto Medio: </strong>{{ $wine->rating_average }}</p>
        <p class="pt-3"><strong>Numero di Recensioni: </strong>{{ $wine->rating_reviews }}</p>
        <p class="pt-3"><strong>Origine: </strong>{{ $wine->location }}</p>
      </div>
    </div>

  </div>
@endsection
