@extends('layouts.main')

@section('content')
  <div class="container pt-4 text-white">

    <h1 class=" text-center py-3">{{ $wine->wine }}</h1>

    <div class="d-flex justify-content-center pt-5">
      <div class=" pe-5">
        <img src="{{ $wine->image }}" alt="{{ $wine->wine }}">
      </div>

      <div class="ps-5 pt-5 ">
        <p><strong>Aromi:</strong>
          @forelse ($wine->flavours as $flavour)
          <a href="{{ route('admin.getFlavourWines', $flavour->id) }}">
            <span class="badge text-bg-success">{{ $flavour->name }}</span>
          </a>
          @empty
              -
          @endforelse

        </p>
        <p class="pt-3"><strong>Cantina: </strong>{{ $wine->winery->name }}</p>
        <p class="pt-3"><strong>Vigna: </strong>{{ $wine->vineyard }}</p>
        <p class="pt-3"><strong>Voto Medio: </strong>{{ $wine->rating_average }}</p>
        <p class="pt-3"><strong>Numero di Recensioni: </strong>{{ $wine->rating_reviews }}</p>
        <p class="pt-3"><strong>Origine: </strong>{{ $wine->location }}</p>
        <div class="d-flex align-items-center justify-content-center">

          <a href="{{ route('admin.wines.edit', $wine) }}" class="btn btn-warning me-2">
              <i class="fa-solid fa-pencil"></i></a>
          <form action="{{ route('admin.wines.destroy', $wine) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit"class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
      </div>
      </div>
    </div>
  </div>
@endsection
