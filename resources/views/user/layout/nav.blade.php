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
                    <a class="nav-link active" aria-current="page" href="#">Faktury</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Raporty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Firmy</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Ustawienia
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Opcje użytkownika</a></li>
                        <li><a class="dropdown-item" href="#">Opcje kont użytkowników</a></li>
                        <li><a class="dropdown-item" href="#">Opcje fakturowni</a></li>
                        <li><a class="dropdown-item" href="#">Opcje layoutu faktur</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{route('logout')}}">wyloguj</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
