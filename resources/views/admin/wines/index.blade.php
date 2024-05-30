@extends('layouts.main')

@section('content')
    <h1 class=" text-center py-4">Gestisci vini</h1>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Vino</th>
                    <th scope="col">Vigna</th>
                    <th scope="col">Aromi</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wines as $wine)
                    <tr>
                        <td scope="row">{{ $wine->wine }}</td>
                        <td>{{ $wine->winery }}</td>

                        <td>
                            @forelse ($wine->flavours as $flavour)
                            <a href="{{ route('admin.getFlavourWines', $flavour->id) }}">
                              <span class="badge text-bg-success">{{ $flavour->name }}</span>

                            </a>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('admin.wines.show', $wine) }}" class="btn btn-primary me-2">
                                    <i class="fa-solid fa-info"></i>
                                </a>
                                <a href="{{ route('admin.wines.edit', $wine) }}" class="btn btn-warning me-2">
                                    <i class="fa-solid fa-pencil"></i></a>
                                <form action="{{ route('admin.wines.destroy', $wine) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($wines instanceof \Illuminate\Pagination\LengthAwarePaginator)

                    {{ $wines->links('pagination::bootstrap-5') }}

            @endif
    </div>
@endsection
