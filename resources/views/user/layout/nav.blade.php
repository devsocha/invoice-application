<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('user.home')}}">DevSocha</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('user.home')}}">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('invoice')}}">Faktury</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('reports')}}">Raporty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('company')}}">Firmy</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ustawienia
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('accountSettings')}}">Opcje konta</a></li>
                        @if(\Illuminate\Support\Facades\Auth::user()->rola == 2)
                            <li><a class="dropdown-item" href="{{route('usersSettings')}}">Opcje kont użytkowników</a></li>
                            <li><a class="dropdown-item" href="{{route('companySettings')}}">Opcje firmy</a></li>
                            <li><a class="dropdown-item" href="#">Opcje konta do przelewu</a></li>
                        @endif
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('logout')}}">wyloguj</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
