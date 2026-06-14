{{-- Navbar principal: logo, links de navegación pública e íconos de sesión según rol del usuario --}}
<div class="navbar-wrapper">
  <nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('images/logo/LOGO_MAIE_navbar.png') }}" alt="Logo" width="120" height="60" class="d-inline-block">
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav ms-auto nav-links align-items-center">
          {{-- Links visibles para todos los visitantes --}}
          <a href="/catalogo" class="nav-link fw-bold">Catálogo</a>
          <a href="/comercializacion" class="nav-link fw-bold">Comercialización</a>
          <a href="/quienes-somos" class="nav-link fw-bold">Quiénes Somos</a>
          <a href="/consultas" class="nav-link fw-bold">Consultas</a>

          {{-- Si el usuario está autenticado, mostrar íconos según su rol --}}
          @auth
            {{-- Admin: ícono de panel de administración --}}
            @if(Auth::user()->rol->nombre === 'admin')
              <a href="/admin" class="nav-link d-flex align-items-center" title="Panel Admin" aria-label="Panel Admin">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M4 13h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zm0 8h6c.55 0 1-.45 1-1v-4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v4c0 .55.45 1 1 1zm10 0h6c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1zM13 4v4c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1z"/>
                </svg>
              </a>
            {{-- Cliente: íconos de carrito y de mi cuenta --}}
            @elseif(Auth::user()->rol->nombre === 'cliente')
              <a href="/carrito" class="nav-link d-flex align-items-center" title="Carrito de Compras" aria-label="Carrito de Compras">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
                </svg>
              </a>
              <a href="/cliente" class="nav-link d-flex align-items-center" title="Mi Cuenta" aria-label="Mi Cuenta">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
              </a>
            @endif

            {{-- Botón de logout disponible para cualquier usuario autenticado --}}
            <form action="{{ route('usuarios.logout') }}" method="POST">
              @csrf
              <button type="submit" class="nav-link d-flex align-items-center" title="Cerrar Sesión" aria-label="Cerrar Sesión">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                </svg>
              </button>
            </form>
          @endauth

          {{-- Si no está autenticado, mostrar ícono de login --}}
          @guest
            <a href="/usuarios/login-register" class="nav-link">
              <img src="{{ asset('images/svg/login-svgrepo-com.svg') }}" alt="Iniciar Sesión" width="30" height="30">
            </a>
          @endguest
        </div>
      </div>
    </div>
  </nav>
  {{-- SVG decorativo que forma una ola debajo del navbar --}}
  <div class="navbar-wave">
    <svg viewBox="0 0 1440 30" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,18 C360,36 1080,0 1440,18 L1440,0 L0,0 Z" fill="#622b16"/>
    </svg>
  </div>
</div>
