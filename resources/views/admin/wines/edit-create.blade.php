@extends('layouts.main')

@section('content')

  <h1 class="text-center mt-4 fw-bold text-white">{{ $title }}</h1>

  <div class="container">

    <div class="row">

      @if ($errors->any())
        <div class="alert alert-danger" role="alert">
          <ul class="m-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <div class="col-6">
        <form action="{{ $route }}" method="POST" class=" fw-bold text-white">
          @csrf
          @method($method)
          <div class="mb-3">
            <label for="vineyard" class="form-label">Vigna</label>
            <input type="text" class="form-control" name="vineyard" id="vineyard"
              placeholder="Example input placeholder" value="{{ old('vineyard', $wine?->vineyard) }}">
          </div>
          <div class="mb-3">
            <label for="wine" class="form-label">Vino</label>
            <input type="text" class="form-control" name="wine" id="wine"
              placeholder="Another input placeholder" value="{{ old('wine', $wine?->wine) }}">
          </div>
          <div class="mb-3">
            <label for="rating_average" class="form-label">Voto Medio</label>
            <input type="text" class="form-control" name="rating_average" id="rating_average"
              placeholder="Example input placeholder" value="{{ old('rating_average', $wine?->rating_average) }}">
          </div>
          <div class="mb-3">
            <label for="rating_reviews" class="form-label">Numero di Recensioni</label>
            <input type="text" class="form-control" name="rating_reviews" id="rating_reviews"
              placeholder="Another input placeholder" value="{{ old('rating_reviews', $wine?->rating_reviews) }}">
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Luogo d'Origine</label>
            <input type="text" class="form-control" name="location" id="location"
              placeholder="Example input placeholder" value="{{ old('location', $wine?->location) }}">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Immagina</label>
            <input type="text" class="form-control" name="image" id="image"
              placeholder="Another input placeholder" value="{{ old('image', $wine?->image) }}">
          </div>

          <div>
            <label for="winery_id" class="form-label">Cantina</label>
            <select class="form-select" aria-label="Default select example" name="winery_id" id="winery_id">
              <option selected>Open this select menu</option>
              @foreach ($wineries as $winery)
                <option value="{{ $winery->id }}" @if (old('winery_id', $wine?->winery?->id) == $winery->id) selected @endif>{{ $winery->name }}
                </option>
              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-success mt-4">invio</button>
      </div>

      <div class="col-6">
        <div class="btn-group d-flex flex-wrap my-4" role="group" aria-label="Basic checkbox toggle button group">
          <div>
            <div class="row row-cols-4">

              @foreach ($flavours as $flavour)
                <div class="col my-3">

                  <input name="flavours[]" type="checkbox" class="btn-check" id="flavour-{{ $flavour->id }}"
                    autocomplete="off" value="{{ $flavour->id }}" @if (
                        ($errors->any() && in_array($flavour->id, old('flavours', []))) ||
                            (!$errors->any() && $wine?->flavours->contains($flavour))) checked @endif>
                  <label
                    class="btn btn-light fw-bold btn-outline-primary align-content-center border-1 w-100 h-100 border-black rounded-3"
                    for="flavour-{{ $flavour->id }}">{{ $flavour->name }}</label>
                </div>
              @endforeach
            </div>

          </div>
        </div>

      </div>

      </form>

    </div>

  </div>

@endsection
