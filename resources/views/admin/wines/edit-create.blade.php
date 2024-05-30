@extends('layouts.main')

@section('content')

<h1 class="text-center">form</h1>

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
                <form action="{{ $route }}" method="POST">
                    @csrf
                    @method($method)
                    <div class="mb-3">
                        <label for="winery" class="form-label">winery</label>
                        <input type="text" class="form-control" name="winery" id="winery"
                            placeholder="Example input placeholder" value="{{ old('winery', $wine?->winery) }}">
                    </div>
                    <div class="mb-3">
                        <label for="wine" class="form-label">wine</label>
                        <input type="text" class="form-control" name="wine" id="wine"
                            placeholder="Another input placeholder" value="{{ old('wine', $wine?->wine) }}">
                    </div>
                    <div class="mb-3">
                        <label for="rating_average" class="form-label">rating_average</label>
                        <input type="text" class="form-control" name="rating_average" id="rating_average"
                            placeholder="Example input placeholder"
                            value="{{ old('rating_average', $wine?->rating_average) }}">
                    </div>
                    <div class="mb-3">
                        <label for="rating_reviews" class="form-label">rating_reviews</label>
                        <input type="text" class="form-control" name="rating_reviews" id="rating_reviews"
                            placeholder="Another input placeholder"
                            value="{{ old('rating_reviews', $wine?->rating_reviews) }}">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">location</label>
                        <input type="text" class="form-control" name="location" id="location"
                            placeholder="Example input placeholder" value="{{ old('location', $wine?->location) }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">image</label>
                        <input type="text" class="form-control" name="image" id="image"
                            placeholder="Another input placeholder" value="{{ old('image', $wine?->image) }}">
                    </div>

                    <button type="submit" class="btn btn-success">invio</button>
            </div>

            <div class="col-6">
                <div class="btn-group d-flex flex-wrap my-4" role="group" aria-label="Basic checkbox toggle button group">
                    @foreach ($flavours as $flavour)
                        <input
                          name="flavours[]"
                          type="checkbox"
                          class="btn-check"
                          id="flavour-{{$flavour->id}}"
                          autocomplete="off"
                          value="{{$flavour->id}}"
                          @if (
                          ($errors->any() && in_array($flavour->id, old('flavours', []))) ||
                              (!$errors->any() && $wine?->flavours->contains($flavour)))
                              checked
                          @endif
                        >
                        <label class="btn btn-light border-1 border-black rounded-0" for="flavour-{{$flavour->id}}">{{$flavour->name}}</label>
                    @endforeach
                </div>
            </div>

        </form>

    </div>

</div>

@endsection
