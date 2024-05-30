@extends('layouts.main')

@section('content')
  <div class="container text-white ">
    <h1 class=" text-center py-4">I Nostri Vini</h1>

    <div class="row row-cols-3">
      @foreach ($wines as $wine)
        <div class="col mb-4">
          <div class="card h-100 text-center p-3 ">
            <img src="{{ $wine->image }}" class="card-img-top" alt="{{ $wine->wine }}">
            <div class="card-body">
              <h5 class="card-title">{{ $wine->wine }}</h5>
              <a href="{{ route('admin.wines.show', $wine) }}" class="btn btn-primary">Info</a>
              <a href="{{ route('admin.wines.edit', $wine) }}" class="btn btn-warning">Modifica</a>
              <form action="{{ route('admin.wines.destroy', $wine) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"class="btn btn-danger">Elimina</button>
              </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    {{ $wines->links() }}

  </div>
@endsection
