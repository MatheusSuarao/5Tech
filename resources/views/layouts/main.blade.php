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
        <!-- Css e JS interno -->
        <link rel="stylesheet" href=".\css\styles.css">
        <script src=".\js\js.js"></script>

    </head>
    <body class="bg-light">


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

              
          <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
              <div class="col-md-3 mb-2 mb-md-0">
                <span class="fs-3">5Tech</span>
              </div>
        
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 fs-5">
                <li><a href="#" class="nav-link px-2 text-secondary">Quem Somos</a></li>
                <li><a href="#" class="nav-link px-2 text-secondary">Restaurantes e Mercados</a></li>
              </ul>
        

              <div class="col-md-3 text-end">
                @guest
                  <a type="button" class="btn btn-outline-primary me-2" href="/login">Entrar</a>
                  <a type="button" class="btn btn-primary" href="/register">Criar conta</a> 
                @endguest
                @auth
                  <div class="dropdown text-start">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      Ola {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu text-small" style="">
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
