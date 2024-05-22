<!DOCTYPE html>
@guest
    <script>window.location = "{{ route('login') }}";</script>
@endguest

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
      
        <!-- Fonte Google -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Bootstrap 5 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      

        <!-- CND Jquey mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

        <!-- JS -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        
        @yield("scriptjs")

       


    </head>
    <body style="background-color: #e5e7eb">


              <!-- Integracao Login Facebook -->
              <script>
                window.fbAsyncInit = function() {
                  FB.init({
                    appId      : '393683216698941',
                    xfbml      : true,
                    version    : 'v19.0'
                  });
                  FB.AppEvents.logPageView();
                };
              
                (function(d, s, id){
                   var js, fjs = d.getElementsByTagName(s)[0];
                   if (d.getElementById(id)) {return;}
                   js = d.createElement(s); js.id = id;
                   js.src = "https://connect.facebook.net/en_US/sdk.js";
                   fjs.parentNode.insertBefore(js, fjs);
                 }(document, 'script', 'facebook-jssdk'));
              </script>
              
          <div class="bg-light">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <div class="col-md-3 mb-2 mb-md-0">
                <span class="fs-3">5Tech</span>
              </div>
        
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 fs-5">
                <li><a href="{{route('rota')}}" class="nav-link px-2 text-secondary">Produtos</a></li>
                <li><a href="{{route('restaurantes.loja')}}" class="nav-link px-2 text-secondary">Restaurantes e Mercados</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Quem Somos</a></li>
              </ul>
        

              <div class="d-flex gap-3 col-md-3 text-end">
                @guest
                  <a type="button" class="btn btn-outline-primary me-2" href="/login">Entrar</a>
                  <a type="button" class="btn btn-primary" href="/register">Criar conta</a> 
                @endguest
                @auth
                  <div class="dropdown text-start align-self-center">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      @php
                                              
                        $fullName = Auth::user()->name;

                        // Divide o nome completo em partes com base nos espaços em branco
                        $nameParts = explode(' ', $fullName);

                        // Obtém o primeiro nome
                        $firstName = $nameParts[0];
                          
                      @endphp
                      
                      Ola {{$firstName}}
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                      <li><a class="dropdown-item" href="{{route('hist_pedidos')}}">Meu Pedidos</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/user/profile">Minha Conta</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                          </a>
                        </form>
                      </li>
                    </ul>
                  </div>

                  <a href="{{ route('ver_carrinho') }}" class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                      <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                    </svg>
                  </a>

                  <!-- Button trigger modal -->
                  <button type="btn btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                      <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                      <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                    </svg>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer" style="background-color: #212529">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
                @endauth

              </div>
            </header>

          </div>
        <main class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
          @yield('content')
        </main>
        <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
            <h2>5Tech &copy; 2024 </h2>
        </footer>
    </body>
</html>
