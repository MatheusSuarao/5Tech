<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonte Google -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&display=swap" rel="stylesheet">

        <!-- Bootstrap 5 -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <!-- Css e JS interno -->
        <link rel="stylesheet" href=".\css\styles.css">
        <script src=".\js\js.js"></script>

    </head>
    <body class="bg-light">
        <header>
            <nav class="navbar bg-dark fixed-top" data-bs-theme="dark" >
                <div class="container-fluid">
                  <a class="navbar-brand fs-4" href="#">Sistema</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Sistema Soares</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 fs-4">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Pedidos</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Clientes</a></li>
                            <li><a class="dropdown-item" href="#">Fornecedores</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Estoque</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                    <div class="mx-3 my-4 fs-5">
                      @auth
                      <div style="display: flex;">
                        <a class="nav-link px-2" >Olá {{Auth::user()->name}}</a>
                        <form action="/logout" method="post">
                          @csrf
                          <a class="nav-link px-4" href="/logout" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            Sair
                          </a>
                        </form>
                        
                      </div>
                      @endauth 
                      @guest
                        <div style="display: flex;">
                          <a class="nav-link px-2" href="/login">Login</a>
                          <a class="nav-link px-4" href="/register">Cadastrar</a>
                        </div> 
                      @endguest
                    </div> 
                  </div>
                </div>
              </nav>
        </header>
        <main class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
          @yield('content')
        </main>
        <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
            <h2>Soares Mangueiras &copy; 2024 </h2>
        </footer>
    </body>
</html>
