<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li>
          <a href="/home" class="nav-link px-2 text-secondary">
            <img src="{{ asset('/img/blogsote.png') }}" class="img-fluid navbar-logo" alt="Logo">
          </a>
        </li>

        @auth
        <li>
          <a href="/user/posts" class="nav-link px-2 text-white link-primary-hover">
            <i class="bi bi-journal-text"></i> Mis Publicaciones
          </a>
        </li>
        <li>
          <a href="/add-post" class="nav-link px-2 text-white link-primary-hover">
            <i class="bi bi-plus-square"></i> Nueva Publicación
          </a>
        </li>
        @endauth
        <li>
          <span class="nav-link px-2 text-primary">
          </span>
        </li>
      </ul>

      @auth
      <span class="nav-link px-2 text-primary">
        <i class="bi bi-person"></i> {{ auth()->user()->username }}
      </span>
      <div class="text-end px-2">
        <a href="{{ route('logout') }}" class="btn btn-outline-light me-2">
          <i class="bi bi-box-arrow-right"></i> Cerrar sesión
        </a>
      </div>
      @endauth

      @guest
      <div class="text-end">
        <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">
          <i class="bi bi-door-open-fill"></i> Iniciar sesión
        </a>
        <a href="{{ route('register.perform') }}" class="btn btn-primary">
          <i class="bi bi-person-plus-fill"></i> Registrarse
        </a>
      </div>
      @endguest
    </div>
  </div>
</header>