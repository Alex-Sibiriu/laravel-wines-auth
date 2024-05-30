<aside>
    <nav>
        <ul>
            <li>
                <i class="fa-solid fa-house"></i>
                <a class="text-white" aria-current="page" href="{{ route('admin.home') }}">Home</a>
            </li>
            <li>
                <i class="fa-solid fa-wine-bottle"></i>
                <a class=" text-white " aria-current="page" href="{{ route('admin.wines.index') }}">Lista
                    vini</a>
            </li>
            <li>
                <i class="fa-solid fa-plus"></i>
                <a class="text-white " aria-current="page" href="{{ route('admin.wines.create') }}">Crea
                    nuovo vino</a>
            </li>
            <li>
                <i class="fa-solid fa-boxes-stacked"></i>
                <a class=" text-white " aria-current="page" href="{{ route('admin.wineries.index') }}">Gestisci
                    Cantine</a>
            </li>
            <li>
                <i class="fa-solid fa-leaf"></i>
                <a class=" text-white " aria-current="page" href="{{ route('admin.flavours.index') }}">Gestisci
                    Aromi</a>
            </li>
        </ul>
    </nav>

</aside>
