<header>
    <nav class="navbar navbar-expand-lg bg-dark h-100">
        <div class="container">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link  text-white " aria-current="page" href="{{ route('home') }}">Home Pubblica</a>
                    </li>
                    <li class="nav-item ps-5">
                        <form class="d-flex" role="search" action="{{ route('admin.wines.index') }}" method="GET">
                            @csrf
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                name="toSearch" value="{{ $toSearch ?? '' }}">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>

                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn-custom-logout" type="submit"><i
                                    class="fa-solid fa-right-from-bracket"></i></button>

                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
