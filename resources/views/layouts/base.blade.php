<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">

    <title>@yield('title')</title>
    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link link-dark px-2 active"
                        aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('ingredients.index') }}"
                        class="nav-link link-dark px-2">Ingredientes</a></li>
                <li class="nav-item"><a href="{{ route('recipes.index') }}" class="nav-link link-dark px-2">Recetas</a>
                </li>
                <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link link-dark px-2">Ordenes</a>
                </li>
                <li class="nav-item"><a href="{{ route('inventories.index') }}" class="nav-link link-dark px-2">Compra
                        de Insumos</a></li>
            </ul>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Sign up</a></li>
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Ceres</span>
            </a>

        </div>
    </header>

</head>

<body>
    <div class="row justify-content-md-center">
        @yield('content')
    </div>
    <script src="{{ asset('resources/js/bootstrap.bundle.js') }}"></script>
</body>

</html>
