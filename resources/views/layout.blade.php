<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/3c26004a01.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <title>Boutique Laravel</title>
</head>

<body>

    <header class="d-flex justify-content-between align-items-center p-3 text-white bg-dark">

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark" aria-label="Third navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home.index') }}">Boutique Laravel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarsExample03">
                    <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/products') }}">Produits</a>
                        </li>
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown03">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                                <li><a class="dropdown-item" method="POST" href="{{ url('logout') }}">Se déconnecter</a></li>
                            </ul>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        @if (Route::has('login'))
        <div class="hidden fixed">

            @auth
            @if (Auth::user()->is_admin === 1)
            <a href="{{ url('/admin/index') }}" class="text-sm text-white text-decoration-none">Dashboard</a>
            @endif
            @endauth

            @auth
            <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
            @else
            <a href="{{ route('login') }}" class="text-sm text-white text-decoration-none">Connexion</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-white text-decoration-none">S'inscrire</a>
            @endif
            @endauth
        </div>
        @endif
        </div>


        <nav class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="#" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
    <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
  </nav>


    </header>

    <div class="mb-3">
        @yield('content')
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </script>
    <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>