@extends('layout')

@section('contenido')

<section class="py-5" style="background-color: #FCF9F4; min-height: 80vh;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">

        <div class="card shadow-sm" style="border-radius: 15px; border: 1px solid rgba(98, 43, 22, 0.1); background-color: #fff;">
          <div class="card-body p-4 p-md-5">

            <!-- Logo centrado -->
            <div class="text-center mb-4">
              <img src="{{ asset('images/logo/LOGO_MAIE_navbar.png') }}" alt="Maie Logo" style="height: 60px;">
            </div>

            <!-- Pills navs -->
            <ul class="nav nav-pills maie-auth-nav nav-justified mb-4" id="authTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-login" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab"
                  aria-controls="pills-login" aria-selected="true">Iniciar Sesión</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-register" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab"
                  aria-controls="pills-register" aria-selected="false">Registrarse</button>
              </li>
            </ul>
            <!-- Pills navs -->

            <!-- Pills content -->
            <div class="tab-content">

              <!-- Pestaña Login -->
              <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form action="javascript:void(0);">

                  <!-- Email input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="loginName">Correo electronico</label>
                    <input type="text" id="loginName" class="maie-input" />
                  </div>

                  <!-- Password input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="loginPassword">Contraseña</label>
                    <input type="password" id="loginPassword" class="maie-input" />
                  </div>

                  <!-- 2 column grid layout -->
                  <div class="row mb-4">
                    <div class="col-md-6 d-flex justify-content-start mb-3 mb-md-0">
                      <!-- Checkbox -->
                      <div class="d-flex align-items-center">
                        <input class="maie-checkbox" type="checkbox" id="loginCheck" />
                        <label class="ms-2 text-muted" for="loginCheck" style="cursor: pointer;"> Recordarme </label>
                      </div>
                    </div>

                  </div>

                  <!-- Submit button -->
                  <div class="text-center">
                    <button type="submit" class="btn-custom w-100 border-0 rounded py-2">Ingresar</button>
                  </div>

                </form>
              </div>

              <!-- Pestaña Registro -->
              <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <form action="javascript:void(0);">

                  <!-- Name input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="registerName">Nombre completo</label>
                    <input type="text" id="registerName" class="maie-input" />
                  </div>

                  <!-- Email input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="registerEmail">Correo electrónico</label>
                    <input type="email" id="registerEmail" class="maie-input" />
                  </div>

                  <!-- Password input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="registerPassword">Contraseña</label>
                    <input type="password" id="registerPassword" class="maie-input" />
                  </div>

                  <!-- Repeat Password input -->
                  <div class="mb-4">
                    <label class="form-label text-maie fw-medium" for="registerRepeatPassword">Repetir contraseña</label>
                    <input type="password" id="registerRepeatPassword" class="maie-input" />
                  </div>

                  <!-- Checkbox -->
                  <div class="d-flex justify-content-start align-items-center mb-4">
                    <input class="maie-checkbox" type="checkbox" id="registerCheck" />
                    <label class="ms-2 text-muted" for="registerCheck" style="cursor: pointer;">
                      He leído y acepto los <a href="{{ url('/terminos-de-uso') }}" class="text-maie fw-medium">Términos de servicio</a>
                    </label>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn-custom w-100 border-0 rounded py-2">Registrarse</button>
                  </div>
                </form>
              </div>

            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection
