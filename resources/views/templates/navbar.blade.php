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
          <a href="/catalogo" class="nav-link fw-bold">Catálogo</a>
          <a href="/comercializacion" class="nav-link fw-bold">Comercialización</a>
          <a href="/quienes-somos" class="nav-link fw-bold">Quiénes Somos</a>
          <a href="/consultas" class="nav-link fw-bold">Consultas</a>

          <a href="{{ route('carrito.show') }}" class="nav-link">
            <i class="bi bi-cart3 fs-4"></i>
            <span class="d-lg-none ms-2">Carrito</span>
          </a>

          <a href="/login-register" class="nav-link">
            <img src="{{ asset('images/svg/login-svgrepo-com.svg') }}" alt="Iniciar Sesión" width="30" height="30">
          </a>
        </div>
      </div>
    </div>
  </nav>
  <div class="navbar-wave">
    <svg viewBox="0 0 1440 30" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,18 C360,36 1080,0 1440,18 L1440,0 L0,0 Z" fill="#622b16"/>
    </svg>
  </div>
</div>
