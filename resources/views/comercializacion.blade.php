@extends('layout')

{{-- Página de comercialización con ubicaciones, métodos de pago y certificados --}}
@section('contenido')

{{-- Sección hero: Título y descripción general de la página --}}
<section class="section-hero-comercio">
<div class="container">
<div class="row align-items-center g-5 py-5">
    <div class="col-lg-12 text-center">
        <h1 class="display-3 fw-bold lh-1 mb-3">El Arte de la <span class="fst-italic fw-bold text-maie">Presencia</span></h1>
        <p class="lead">Conoce dónde encontrarnos, nuestros métodos de pago y los certificados que respaldan nuestro compromiso con la calidad.</p>
    </div>
</div>
</div>
</section>

{{-- Sección de ubicaciones: Muestra los locales donde se venden los productos --}}
<section class="section-donde-encontrarnos py-5">
<div class="container">
    <h1 class="display-6 fw-bold lh-1 mb-4 text-center">Dónde Encontrarnos</h1>
    <p class="text-center mb-5 lead">Nuestros productos están disponibles en los mejores locales de la ciudad</p>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
        <div class="col">
            <div class="card card-transparent text-center h-100">
                <div class="card-body">
                    <img src="{{ asset('images/logos_locales/full24logo.png') }}" alt="Logo Local 1" style="height: 120px; object-fit: contain; margin-bottom: 15px;">
                    <h5 class="card-title">Full 24</h5>
                    <p class="card-text small">Junin 889</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-transparent text-center h-100">
                <div class="card-body">
                    <img src="{{ asset('images/logos_locales/godilogo.png') }}" alt="Logo Local 2" style="height: 120px; object-fit: contain; margin-bottom: 15px;">
                    <h5 class="card-title">Godi</h5>
                    <p class="card-text small">9 de Julio 1247</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-transparent text-center h-100">
                <div class="card-body">
                    <img src="{{ asset('images/logos_locales/logoshell.png') }}" alt="Logo Local 3" style="height: 120px; object-fit: contain; margin-bottom: 15px;">
                    <h5 class="card-title">Shell</h5>
                    <p class="card-text small">Av. 3 de Abril 402</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card card-transparent text-center h-100">
                <div class="card-body">
                    <img src="{{ asset('images/logos_locales/piacepiulogo.jpg') }}" alt="Logo Local 4" style="height: 120px; object-fit: contain; margin-bottom: 15px;">
                    <h5 class="card-title">Piacepiu</h5>
                    <p class="card-text small">Catamarca 1402</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

{{-- Sección de métodos de pago: Muestra los métodos de pago aceptados --}}
<section class="section-metodos-pago py-5 border-top">
<div class="container">
    <div class="row align-items-center g-5">
        <div class="col-lg-3 text-center text-lg-start">
            <h1 class="display-6 fw-bold lh-1 mb-4 mb-lg-0">Métodos de Pago</h1>
        </div>
        <div class="col-lg-9">
            <div class="row row-cols-2 row-cols-md-4 g-3 justify-content-center">
                <div class="col">
                    <div class="card card-transparent text-center">
                        <div class="card-body py-3">
                            <svg width="100" height="100" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)"><path d="M19.7714 7.19922L19.2173 5.13111C18.8956 3.93081 17.6619 3.2185 16.4616 3.54012L3.90454 6.90476C2.70425 7.22638 1.99193 8.46014 2.31355 9.66044L3.74609 15.0068V10.4492C3.74609 8.65429 5.20117 7.19922 6.99609 7.19922H19.7714Z" fill="#622b16"/><path d="M22.0736 9.58365C22.1847 9.8501 22.2461 10.1425 22.2461 10.4492C22.2461 10.4489 22.2461 10.4495 22.2461 10.4492L22.2465 11.4434H4.74609V10.4492C4.74609 9.20658 5.75345 8.19922 6.99609 8.19922H19.9961C20.0106 8.19922 20.025 8.19936 20.0395 8.19963C20.9378 8.21656 21.7075 8.76076 22.0526 9.53495C22.0598 9.55108 22.0668 9.56732 22.0736 9.58365Z" fill="#622b16"/><path d="M22.2465 14.2407H4.74609V18.5159C4.74621 18.5162 4.74598 18.5157 4.74609 18.5159L4.74645 19.1257C4.74645 19.4364 4.80941 19.7323 4.92327 20.0015C4.92845 20.0138 4.93375 20.026 4.93914 20.0382C5.28934 20.8257 6.07859 21.3749 6.99609 21.3749C6.99621 21.3749 6.99598 21.3749 6.99609 21.3749L19.9965 21.3757C21.2391 21.3757 22.2465 20.3684 22.2465 19.1257V14.2407Z" fill="#622b16"/></svg>
                            <p class="card-text small mt-2">Tarjeta</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-transparent text-center">
                        <div class="card-body py-3">
                            <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)"><path fill-rule="evenodd" clip-rule="evenodd" d="M18.4125 3.30938C17.4281 3 16.5281 3 14.7281 3H9.27187C7.47187 3 6.57187 3 5.5875 3.30938C5.06492 3.50054 4.59035 3.80342 4.19688 4.19688C3.80342 4.59035 3.50054 5.06492 3.30938 5.5875C3 6.56063 3 7.46625 3 9.27187V14.7253C3 16.5281 3 17.4281 3.30938 18.4125C3.50054 18.9351 3.80342 19.4097 4.19688 19.8031C4.59035 20.1966 5.06492 20.4995 5.5875 20.6906C6.56063 21 7.46625 21 9.27187 21H14.7281C16.5281 21 17.4281 21 18.4125 20.685C18.9351 20.4938 19.4097 20.191 19.8031 19.7975C20.1966 19.404 20.4995 18.9295 20.6906 18.4069C21 17.4337 21 16.5281 21 14.7225V9.27469C21 7.47187 21 6.57187 20.6906 5.5875C20.4995 5.06492 20.1966 4.59035 19.8031 4.19688C19.4097 3.80342 18.9351 3.50054 18.4125 3.30938ZM15.4505 9.69387C15.3183 9.83448 15.0849 9.83449 14.9443 9.69389L14.9499 9.69949C14.3564 9.16512 13.448 8.77418 12.503 8.77418C11.7605 8.77418 11.0208 9.04418 11.0208 9.7248C11.0208 10.3725 11.6992 10.6208 12.5264 10.9237C12.5936 10.9483 12.6619 10.9733 12.7308 10.9989C14.3339 11.5529 15.6558 12.2336 15.6558 13.8479C15.6558 15.6001 14.3283 16.8011 12.1492 16.9473L11.9523 17.9007C11.9354 17.9851 11.8896 18.061 11.823 18.1153C11.7563 18.1697 11.6727 18.1992 11.5867 18.1989L10.2226 18.1876C9.9892 18.1848 9.81763 17.9682 9.86545 17.7348L10.0736 16.7307C9.22082 16.4973 8.4727 16.0754 7.88207 15.4932C7.81063 15.4215 7.77051 15.3245 7.77051 15.2232C7.77051 15.122 7.81063 15.0249 7.88207 14.9532L8.64145 14.1939C8.67541 14.1599 8.71574 14.1329 8.76014 14.1145C8.80454 14.096 8.85213 14.0866 8.9002 14.0866C8.94826 14.0866 8.99586 14.096 9.04026 14.1145C9.08465 14.1329 9.12499 14.1599 9.15895 14.1939C9.8902 14.9279 10.8352 15.2289 11.7352 15.2289C12.7252 15.2289 13.3946 14.8182 13.3946 14.1179C13.3946 13.5027 12.8453 13.2965 11.8027 12.9052C11.692 12.8636 11.5757 12.82 11.4539 12.7736C10.1124 12.2926 8.84395 11.5923 8.84395 9.96105C8.84395 8.07668 10.3796 7.15699 12.1908 7.06418L12.3877 6.11355C12.4045 6.03013 12.4494 5.955 12.5149 5.90072C12.5804 5.84645 12.6626 5.81634 12.7477 5.81543H14.1089C14.3424 5.81543 14.5168 6.0348 14.4689 6.26824L14.2468 7.33699C14.9419 7.56868 15.5842 7.93574 16.1368 8.41699C16.2943 8.56887 16.3027 8.82199 16.1536 8.96262L15.4505 9.69387Z" fill="#622b16"/></svg>
                            <p class="card-text small mt-2">Transferencia</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-transparent text-center">
                        <div class="card-body py-3">
                            <svg width="100" height="100" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g>
                                    <path d="M17.6,41.9v53h102.3v-53H17.6z M37.5,87.6h-12v-12h2.4v9.6h9.6V87.6z M37.5,51.5h-9.6v9.6h-2.4v-12h12V51.5z M68.8,87.6 c-10.6,0-19.3-8.6-19.3-19.3c0-10.6,8.6-19.3,19.3-19.3s19.3,8.6,19.3,19.3C88.1,79,79.4,87.6,68.8,87.6z M113.3,87.6h-12v-2.4h9.6 v-9.6h2.4V87.6z M113.3,61.1h-2.4v-9.6h-9.6v-2.4h12V61.1z" fill="#622b16"/>
                                </g>
                                <path d="M76.7,73c0-3.2-1.9-5.4-6-6.9c-3-1.1-4.3-1.8-4.3-3.2c0-1.2,1.1-2.2,3.3-2.2 c2.3,0,3.9,0.6,4.8,1.1l1.2-4.2 c-1-0.5-2.3-0.9-4-1.1v-3.4h-5.9v4c-2.9,1.1-4.6,3.4-4.6,6.2c0,3.3,2.5,5.5,6.3,6.8c2.8,1,3.9,1.8,3.9,3.2c0,1.5-1.3,2.5-3.6,2.5 c-2.2,0-4.4-0.7-5.8-1.4l-1.1,4.3c1,0.6,2.9,1.1,4.9,1.3v3.3h5.9v-3.8C75.1,78.4,76.7,75.9,76.7,73z" fill="#622b16"/>
                                <polygon points="115.1,37 12.8,37 12.8,89.4 15.2,89.4 15.2,39.5 115.1,39.5" fill="#622b16"/>
                                <polygon points="110.3,32.2 8,32.2 8,84.6 10.4,84.6 10.4,34.6 110.3,34.6" fill="#622b16"/>
                            </svg>
                            <p class="card-text small mt-2">Efectivo</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-transparent text-center">
                        <div class="card-body py-3">
                            <svg width="100" height="100" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)"><path d="M3.25 5.5C3.25 4.25736 4.25736 3.25 5.5 3.25H16C17.2426 3.25 18.25 4.25736 18.25 5.5V6.25H3.25V5.5Z" fill="#622b16"/><path d="M3.25 7.25V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H18.5C19.7426 20.75 20.75 19.7426 20.75 18.5V9.5C20.75 8.25736 19.7426 7.25 18.5 7.25H3.25Z" fill="#622b16"/></svg>
                            <p class="card-text small mt-2">Billetera</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

{{-- Sección de certificados: Muestra garantías y certificaciones de calidad --}}
<section class="section-certificados py-5 my-5 border-top bg-light-maie">
<div class="container py-5">
    <p class="text-center mb-2 small">Nuestro compromiso</p>
    <h1 class="display-6 fw-bold lh-1 mb-5 text-center">Certificados y Garantías</h1>
    <div class="row row-cols-1 row-cols-md-3 g-5 justify-content-center">
        <div class="col">
            <div class="text-center">
                <div class="circle-svg-container">
                    <svg width="70" height="70" viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg"><rect x="6" y="16" width="6" height="2" fill="#66bb6a"/><rect x="6" y="12" width="10" height="2" fill="#66bb6a"/><rect x="6" y="8" width="10" height="2" fill="#66bb6a"/><path d="M14,26H4V6H28V16h2V6a2,2,0,0,0-2-2H4A2,2,0,0,0,2,6V26a2,2,0,0,0,2,2H14Z" fill="#66bb6a"/><polygon points="22 25.59 19.41 23 18 24.41 22 28.41 30 20.41 28.59 19 22 25.59" fill="#66bb6a"/></svg>
                </div>
                <h5 class="mt-4">Certificado de Calidad</h5>
                <p class="small">Estándares más altos</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center">
                <div class="circle-svg-container">
                    <svg width="70" height="70" viewBox="0 -0.5 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.4608 1.50732C11.2607 0.539132 12.7446 0.539132 13.5445 1.50732L14.7445 2.95979C15.1677 3.472 15.8176 3.74061 16.4789 3.67664L18.3571 3.49495C19.6102 3.37372 20.6624 4.42666 20.5402 5.67974L20.3597 7.53129C20.2949 8.1958 20.566 8.84883 21.0823 9.2721L22.5232 10.4533C23.4993 11.2534 23.4993 12.7466 22.5232 13.5467L21.0823 14.7279C20.566 15.1512 20.2949 15.8042 20.3597 16.4687L20.5402 18.3203C20.6624 19.5733 19.6102 20.6263 18.3571 20.505L16.4789 20.3234C15.8176 20.2594 15.1677 20.528 14.7445 21.0402L13.5445 22.4927C12.7446 23.4609 11.2607 23.4609 10.4608 22.4927L9.26079 21.0402C8.83761 20.528 8.18769 20.2594 7.52637 20.3234L5.64824 20.505C4.39507 20.6263 3.34293 19.5733 3.4651 18.3203L3.64562 16.4687C3.71041 15.8042 3.43933 15.1512 2.92298 14.7279L1.48208 13.5467C0.505968 12.7466 0.505968 11.2534 1.48208 10.4533L2.92298 9.2721C3.43933 8.84883 3.71041 8.1958 3.64562 7.53129L3.4651 5.67974C3.34293 4.42666 4.39507 3.37372 5.64824 3.49495L7.52637 3.67664C8.18769 3.74061 8.83761 3.472 9.26079 2.95979L10.4608 1.50732Z" stroke="#66bb6a" stroke-width="1.5"/>
                        <path d="M8.12549 12.7725L10.4136 15.0516C10.8437 15.48 11.5531 15.4296 11.9182 14.9446L15.8801 9.68274" stroke="#66bb6a" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <h5 class="mt-4">Garantía al Cliente</h5>
                <p class="small">Devolución garantizada</p>
            </div>
        </div>
        <div class="col">
            <div class="text-center">
                <div class="circle-svg-container">
                    <svg version="1.1" id="nature" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="70" height="70" viewBox="0 0 256 256" xml:space="preserve">
                        <path fill="#66bb6a" d="M210.063,197.105c-1.699-0.95-3.394-1.886-5.078-2.814c-3.817-2.105-7.424-4.096-10.979-6.204 c-2.746-1.63-5.219-3.341-7.396-5.119c0.806-1.887,1.588-3.836,2.268-5.892c4.223-12.791,4.908-26.42,2.098-41.666 c-5.129-27.817-19.514-48.297-42.752-60.871c-16.752-9.065-34.088-13.662-51.523-13.662c-17.667,0-35.712,4.725-53.641,14.048 c-1.386,0.722-2.292,1.564-2.792,2.035c-2.279,1.981-3.543,4.888-3.434,7.909c0.11,3.054,1.611,5.89,4.075,7.699 c9.941,7.3,16.296,16.617,19.428,28.484c1.125,4.26,1.773,9.349,2.524,15.241c0.312,2.448,0.641,5.029,1.029,7.77 c0.036,0.25,0.081,0.5,0.135,0.75c2.295,10.42,4.624,20.013,9.888,31.897c10.585,23.899,28.794,37.437,54.12,40.235 c1.842,0.205,3.714,0.308,5.562,0.308c8.269,0,16.688-2.063,25.029-6.137c1.521-0.742,2.806-1.847,3.761-3.19 c7.333,6.773,15.422,12.896,24.239,18.342c2.53,1.563,5.187,2.354,7.888,2.354c3.051,0,5.977-1,8.696-2.975 c5.614-4.072,9.515-9.813,11.59-17.061C216.07,204.126,214.111,199.371,210.063,197.105z"/>
                        <path fill="#ffffff" d="M188.902,196.688c-5.338-3.166-10.268-6.899-14.252-11.273c1.654-3.971,3.461-7.632,4.729-11.471 c3.978-12.051,4.038-24.356,1.759-36.719c-4.365-23.676-16.287-42.317-37.676-53.89c-31.88-17.251-63.936-16.103-95.786,0.46 c-0.28,0.146-0.497,0.41-0.853,0.714c11.962,8.784,19.549,20.242,23.178,33.991c1.789,6.776,2.413,14.464,3.785,24.161 c2.462,11.178,4.607,19.481,9.265,30c8.911,20.119,24.067,31.914,46.075,34.347c8.754,0.969,17.102-0.97,25.104-4.877 c-2.125-2.421-4.234-4.721-6.231-7.111c-9.289-11.119-16.356-22.035-21.997-35.27c-4.364-10.24-6-15-12.876-32.376 c-5.902-12.102-14.59-21.962-26.02-29.268c-0.963-0.616-1.926-1.232-2.888-1.848c0.556-0.105,1.017-0.019,1.392,0.211 c5.418,3.322,11.093,6.303,16.18,10.076c10.616,7.875,18.21,18.409,24.499,29.887c5.1,9.303,9.896,18.771,14.934,28.109 c12.045,22.33,29.092,39.906,50.648,53.216c2.074,1.28,3.693,1.077,5.459-0.203c4.085-2.964,6.505-7.028,7.85-11.721 C199.67,202.751,194.214,199.839,188.902,196.688z"/>
                    </svg>
                </div>
                <h5 class="mt-4">Ingredientes Naturales</h5>
                <p class="small">100% naturales</p>
            </div>
        </div>
    </div>
</div>
</section>

@endsection
