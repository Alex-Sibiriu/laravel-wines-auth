<header>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('home') }}">Home Pubblica</a>
          </li>

          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('admin.home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('admin.wines.index') }}">Lista
              vini</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('admin.wines.create') }}">Crea
              nuovo vino</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('admin.wineries.index') }}">Gestisci
              Cantine</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white " aria-current="page" href="{{ route('admin.flavours.index') }}">Gestisci
              Aromi</a>
          </li>
          <li class="nav-item ps-5">
            <form class="d-flex" role="search" action="{{route('admin.wines.index')}}" method="GET">
              @csrf
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="toSearch" value="{{$toSearch}}">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
