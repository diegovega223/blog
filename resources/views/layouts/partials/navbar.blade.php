<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
          <use xlink:href="#bootstrap" />
        </svg>
      </a>

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">

        <li><a href="/home" class="nav-link px-2 text-secondary"><img src="{{ asset('/img/blogsote.png') }}" class="img-fluid navbar-logo"></a></li>
        <li><a href="#" class="nav-link px-2 text-white">Mis Publicaciones</a></li>
        <li><a href="/add-post" class="nav-link px-2 text-white">Nueva Publicación</a></li>
        <li>
          <span class="nav-link px-2 text-primary">
          </span>
        </li>
      </ul>

      @auth
      <span class="nav-link px-2 text-primary">
        {{ auth()->user()->username }}
      </span>
      <div class="text-end px-2">
        <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">Cerrar sesión</a>
      </div>
      @endauth

      @guest
      <div class="text-end">
        <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">Inciar sesión</a>
        <a href="{{ route('register.perform') }}" class="btn btn-primary">Registrarse</a>
      </div>
      @endguest
    </div>
  </div>
</header>