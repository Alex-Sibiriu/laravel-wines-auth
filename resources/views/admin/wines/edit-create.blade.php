@extends('layouts.main')

@section('content')

  <h1 class="text-center">form</h1>

  <div class="container">

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul class="m-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ $route }}" method="POST">
      @csrf
      @method($method)
      <div class="mb-3">
        <label for="winery" class="form-label">winery</label>
        <input type="text" class="form-control" name="winery" id="winery" placeholder="Example input placeholder"
          value="{{ old('winery', $wine?->winery) }}">
      </div>
      <div class="mb-3">
        <label for="wine" class="form-label">wine</label>
        <input type="text" class="form-control" name="wine" id="wine" placeholder="Another input placeholder"
          value="{{ old('wine', $wine?->wine) }}">
      </div>
      <div class="mb-3">
        <label for="rating_average" class="form-label">rating_average</label>
        <input type="text" class="form-control" name="rating_average" id="rating_average"
          placeholder="Example input placeholder" value="{{ old('rating_average', $wine?->rating_average) }}">
      </div>
      <div class="mb-3">
        <label for="rating_reviews" class="form-label">rating_reviews</label>
        <input type="text" class="form-control" name="rating_reviews" id="rating_reviews"
          placeholder="Another input placeholder" value="{{ old('rating_reviews', $wine?->rating_reviews) }}">
      </div>
      <div class="mb-3">
        <label for="location" class="form-label">location</label>
        <input type="text" class="form-control" name="location" id="location" placeholder="Example input placeholder"
          value="{{ old('location', $wine?->location) }}">
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">image</label>
        <input type="text" class="form-control" name="image" id="image" placeholder="Another input placeholder"
          value="{{ old('image', $wine?->image) }}">
      </div>

      <button type="submit" class="btn btn-success">invio</button>
    </form>
  </div>

@endsection
