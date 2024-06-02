<nav class="navbar navbar-expand-lg bg-primary-subtle fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="">PT. XYZ-1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a @if ($data['title'] === 'Home') class="nav-link active" @else class="nav-link" @endif
                        aria-current="page" href="/xyz-1/home">Home</a>
                </li>
                @if (Auth::user()->role == 2)
                    <li class="nav-item">
                        <a @if ($data['title'] === 'Register User') class="nav-link active" @else class="nav-link" @endif
                            aria-current="page" href="/xyz-1/admin/registerUser">Register User</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a @if ($data['title'] === 'Data User') class="nav-link active" @else class="nav-link" @endif
                        class="nav-link" aria-current="page" href="/xyz-1/dataUser">Data User</a>
                </li>
            </ul>
            <a class="nav-link text-danger fw-bold" aria-current="page" href="/logout">Logout</a>
        </div>
    </div>
</nav>
