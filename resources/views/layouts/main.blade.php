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
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
              <!-- Primary Navigation Menu -->
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                  <div class="flex justify-between h-16">
                      <div class="flex">
                          <!-- Logo -->
                          <div class="shrink-0 flex items-center">
                              <a href="{{ route('dashboard') }}">
                                  <x-application-mark class="block h-9 w-auto" />
                              </a>
                          </div>
          
                          <!-- Navigation Links -->
                          <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                              <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                                  {{ __('Dashboard') }}
                              </x-nav-link>
                          </div>
                      </div>
          
                      <div class="hidden sm:flex sm:items-center sm:ms-6">
                          <!-- Teams Dropdown -->
                          @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                              <div class="ms-3 relative">
                                  <x-dropdown align="right" width="60">
                                      <x-slot name="trigger">
                                          <span class="inline-flex rounded-md">
                                              <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                  {{ Auth::user()->currentTeam->name }}
          
                                                  <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                  </svg>
                                              </button>
                                          </span>
                                      </x-slot>
          
                                      <x-slot name="content">
                                          <div class="w-60">
                                              <!-- Team Management -->
                                              <div class="block px-4 py-2 text-xs text-gray-400">
                                                  {{ __('Manage Team') }}
                                              </div>
          
                                              <!-- Team Settings -->
                                              <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                                  {{ __('Team Settings') }}
                                              </x-dropdown-link>
          
                                              @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                                  <x-dropdown-link href="{{ route('teams.create') }}">
                                                      {{ __('Create New Team') }}
                                                  </x-dropdown-link>
                                              @endcan
          
                                              <!-- Team Switcher -->
                                              @if (Auth::user()->allTeams()->count() > 1)
                                                  <div class="border-t border-gray-200"></div>
          
                                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                                      {{ __('Switch Teams') }}
                                                  </div>
          
                                                  @foreach (Auth::user()->allTeams() as $team)
                                                      <x-switchable-team :team="$team" />
                                                  @endforeach
                                              @endif
                                          </div>
                                      </x-slot>
                                  </x-dropdown>
                              </div>
                          @endif
          
                          <!-- Settings Dropdown -->
                          <div class="ms-3 relative">
                              <x-dropdown align="right" width="48">
                                  <x-slot name="trigger">
                                      @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                          <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                              <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                          </button>
                                      @else
                                          <span class="inline-flex rounded-md">
                                              <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                  {{ Auth::user()->name }}
          
                                                  <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                  </svg>
                                              </button>
                                          </span>
                                      @endif
                                  </x-slot>
          
                                  <x-slot name="content">
                                      <!-- Account Management -->
                                      <div class="block px-4 py-2 text-xs text-gray-400">
                                          {{ __('Manage Account') }}
                                      </div>
          
                                      <x-dropdown-link href="{{ route('profile.show') }}">
                                          {{ __('Profile') }}
                                      </x-dropdown-link>
          
                                      @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                          <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                              {{ __('API Tokens') }}
                                          </x-dropdown-link>
                                      @endif
          
                                      <div class="border-t border-gray-200"></div>
          
                                      <!-- Authentication -->
                                      <form method="POST" action="{{ route('logout') }}" x-data>
                                          @csrf
          
                                          <x-dropdown-link href="{{ route('logout') }}"
                                                   @click.prevent="$root.submit();">
                                              {{ __('Log Out') }}
                                          </x-dropdown-link>
                                      </form>
                                  </x-slot>
                              </x-dropdown>
                          </div>
                      </div>
          
                      <!-- Hamburger -->
                      <div class="-me-2 flex items-center sm:hidden">
                          <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                  <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                  <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                              </svg>
                          </button>
                      </div>
                  </div>
              </div>
          
              <!-- Responsive Navigation Menu -->
              <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                  <div class="pt-2 pb-3 space-y-1">
                      <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                          {{ __('Dashboard') }}
                      </x-responsive-nav-link>
                  </div>
          
                  <!-- Responsive Settings Options -->
                  <div class="pt-4 pb-1 border-t border-gray-200">
                      <div class="flex items-center px-4">
                          @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                              <div class="shrink-0 me-3">
                                  <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                              </div>
                          @endif
          
                          <div>
                              <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                              <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                          </div>
                      </div>
          
                      <div class="mt-3 space-y-1">
                          <!-- Account Management -->
                          <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                              {{ __('Profile') }}
                          </x-responsive-nav-link>
          
                          @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                              <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                  {{ __('API Tokens') }}
                              </x-responsive-nav-link>
                          @endif
          
                          <!-- Authentication -->
                          <form method="POST" action="{{ route('logout') }}" x-data>
                              @csrf
          
                              <x-responsive-nav-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                  {{ __('Log Out') }}
                              </x-responsive-nav-link>
                          </form>
          
                          <!-- Team Management -->
                          @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                              <div class="border-t border-gray-200"></div>
          
                              <div class="block px-4 py-2 text-xs text-gray-400">
                                  {{ __('Manage Team') }}
                              </div>
          
                              <!-- Team Settings -->
                              <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                  {{ __('Team Settings') }}
                              </x-responsive-nav-link>
          
                              @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                  <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                      {{ __('Create New Team') }}
                                  </x-responsive-nav-link>
                              @endcan
          
                              <!-- Team Switcher -->
                              @if (Auth::user()->allTeams()->count() > 1)
                                  <div class="border-t border-gray-200"></div>
          
                                  <div class="block px-4 py-2 text-xs text-gray-400">
                                      {{ __('Switch Teams') }}
                                  </div>
          
                                  @foreach (Auth::user()->allTeams() as $team)
                                      <x-switchable-team :team="$team" component="responsive-nav-link" />
                                  @endforeach
                              @endif
                          @endif
                      </div>
                  </div>
              </div>
          </nav>
          </div>
        <main class="container-xxl bd-gutter mt-3 my-md-4 bd-layout">
          @yield('content')
        </main>
        <footer class="bd-footer py-4 py-md-5 mt-5 bg-body-tertiary">
            <h2>5Tech &copy; 2024 </h2>
        </footer>
    </body>
</html>
