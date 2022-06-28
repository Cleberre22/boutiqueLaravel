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
        <div>Boutique Laravel</div>
        <div id="errorR" class="fw-bold text-danger"></div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="me-4">
                <a href="{{ url('/categories') }}" class="text-sm text-white text-decoration-none me-2">Catégories</a>
                <a href="{{ url('/products') }}" class="text-sm text-white text-decoration-none me-2">Produits</a>
            </div>
            @if (Route::has('login'))
                <div class="hidden fixed">
                    @auth
                       <a href="#" class="text-sm text-white text-decoration-none">Dashboard</a> 
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white text-decoration-none">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white text-decoration-none">S'inscrire</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <div class="container">
         @yield('content')
    </div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

 </script> 
</body>
</html>