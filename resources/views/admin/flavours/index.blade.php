@extends('layouts.main')

@section('content')
  <div class="container text-white ">
    <h1 class=" text-center py-4">Gestisci Aromi</h1>

    <div class="w-100">
      <form action="{{ route('admin.flavours.store') }}" method="post">
        @csrf
        <input type="text" name="name">
        <button class="button-14" role="button" type="submit">
          <div class="button-14-top text">Invia</div>
          <div class="button-14-bottom"></div>
          <div class="button-14-base"></div>
        </button>

      </form>

    </div>

    <table class="table">
      <thead>
        <tr class="text-center">
          <th scope="col">ID</th>
          <th scope="col">Aroma</th>
          <th scope="col">Azioni</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($flavours as $flavour)
          <tr class="text-center">
            <td>{{ $flavour->id }}</td>
            <td>
              <form action="{{ route('admin.flavours.update', $flavour) }}" method="POST"
                id="form-edit-{{ $flavour->id }}">
                @csrf
                @method('PUT')
                <input type="text" value="{{ $flavour->name }}" class=" border-0" name="name">
              </form>
            </td>
            <td>
              <div class="d-flex justify-content-center ">
                <button class="btn btn-warning me-2" onclick="submitForm({{ $flavour->id }})"><i
                    class="fa-solid fa-pen"></i></button>
                <form action="{{ route('admin.flavours.destroy', $flavour) }}" method="POST">
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

  </div>
@endsection

<script>
  function submitForm(id) {
    const form = document.getElementById(`form-edit-${id}`);
    form.submit();
  }
</script>
