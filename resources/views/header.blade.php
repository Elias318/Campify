<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>

    <!--Font-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Añadir Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- CSS  -->
    <link rel="icon" href={{ asset('images/logosinbg.png') }} type="image/png">

    <link rel="stylesheet" href={{ asset('css/style.css') }}>
    <link rel="stylesheet" href={{ asset('css/footer-style.css') }}>
    <link rel="stylesheet" href={{ asset('css/header-style.css') }}>
    <link rel="stylesheet" href={{ asset('css/sobreNosotros.css') }}>
    <link rel="stylesheet" href={{ asset('css/trabajaConNosotros.css') }}>
    <link rel="stylesheet" href={{ asset('css/inicioSesion.css') }}>
    <link rel="stylesheet" href={{ asset('css/catalogo2.css') }}>
    <link rel="stylesheet" href={{ asset('css/vistaProducto.css') }}>
    <link rel="stylesheet" href={{ asset('css/agregarProducto.css') }}>
    <link rel="stylesheet" href={{ asset('css/carrito.css') }}>
    <link rel="stylesheet" href={{ asset('css/finalizarCompra.css') }}>
    <link rel="stylesheet" href={{ asset('css/agradecimiento.css') }}>


    <!-- Fuente de Iconos -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

</head>
<body>

    <!-- /////////////////////////////////////////
        //               NAVBAR                 //
        /////////////////////////////////////////-->

        <nav class="navbar navbar-expand-md bg-body-tertiary p-ajuste-navbar">
            <div class="container-fluid">
                <a class="navbar-brand p-ajuste-logo" href="{{route('/')}}">
                    <img src={{ asset('images/logosinbg.png') }} alt="Logo" class="m-ajuste-logo logo">
                </a>
                <button class="navbar-toggler m-ajuste-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars colorhamburger"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="linksAdicionales" class="navbar-nav me-auto mb-2 mb-lg-0 border-top-ajuste">
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link" aria-current="page" href="{{ route('/') }}">inicio</a>
                        </li>
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link" href="{{ route('sobreNosotros') }}">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link" href="{{ route('trabajaConNosotros') }}">Trabaja con nosotros</a>
                        </li>
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a>
                        </li>
                        <li class="nav-item dropdown ajuste-item-nav-md">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Campamentos">Campamento</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Reposeras+y+sombrillas">Reposeras y sombrillas</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Accesorios+para+bicicletas">Accesorios para bicicletas</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Travel">Travel</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Travel">Accesorios para vehiculos</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Hogar+y+Herramientas">Hogar y herramientas</a></li>
                                
                            </ul>
                        </li>
                    </ul>

                    <ul class="navbar-nav mb-lg-0 order-md-3 d-flex border-top-ajuste m-ajuste-sesion">
                    @auth
                        @if (auth()->user()->rol === 'Cliente')
                            <li class="nav-item ajuste-item-nav-md">
                                <a class="nav-link active colorLetras" href="{{ route('carrito.index') }}">Carrito</a>
                            </li>
                            <li class="nav-item ajuste-item-nav-md">
                                <a class="nav-link active colorLetras" href="{{ route('meGustas') }}">Me gustas</a>
                            </li>
                        @elseif (auth()->user()->rol === 'Admin')
                            <li class="nav-item ajuste-item-nav-md">
                                <a class="nav-link active colorLetras" href="{{ route('agregarproducto') }}">Admin</a>
                            </li>
                        @endif
                            <li>
                                <form action="/logout" method="POST" class="nav-item ajuste-item-nav-md">
                                    @csrf
                                    <button class="nav-link active colorLetras" type="submit">Salir</button>
                                </form>
                            </li>
                    @else
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link active colorLetras" href="{{ route('crearCuenta') }}">Crear Cuenta</a>
                        </li>
                        <li class="nav-item ajuste-item-nav-md">
                            <a class="nav-link active colorLetras" href="{{ route('inicioSesion') }}">Iniciar Sesion</a>
                        </li>
                    @endauth
                    
                    </ul>
                    <form action="{{route('catalogo.busqueda')}}" method="GET" class="d-flex justify-content-center align-items-center mx-auto m-ajuste-form correccion w-ajuste" role="search">
                        <input class="form-control me-2 correccion m-correccion" name="busqueda" id="busqueda" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn" type="submit" style="border: 2px solid #a6c4f7; background-color: white; color: #a6c4f7;">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>                   
                    </form>             
                </div>
            </div>
        </nav>

            <!-- /////////////////////////////////////////
        //    ARTUCLOS CON MENU DESPLEGABLE     //
        /////////////////////////////////////////-->
    
        <div id="menuArticulos" class="d-flex flex-column align-items-center bg-nav2 nav-sm">
            <nav class="navbar navbar-expand-sm">
                <div class="container-fluid">
                    <!-- Botón de colapso para mobile -->
                    <button class="navbar-toggler w-100" type="button" data-bs-toggle="collapse" data-bs-target="#menuArticulos" aria-controls="menuArticulos" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        
                    <!-- Contenido del menú -->
                    <div class="collapse navbar-collapse" >
                        <ul class="navbar-nav d-flex align-items-center justify-content-center">
                            <li class="nav-item"><a class="nav-link" href="{{ route('/') }}">Inicio</a></li>
                            <li class="nav-item dropdown bg-nav2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Categorias
                                </a>
                                <ul class="dropdown-menu bg-nav2">
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Campamentos">Campamento</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Reposeras+y+sombrillas">Reposeras y sombrillas</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Accesorios+para+bicicletas">Accesorios para bicicletas</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Travel">Travel</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Travel">Accesorios para vehiculos</a></li>
                                    <li><a class="dropdown-item" href="http://localhost:8000/catalogo?_token=fRCoCOHqUa8f7cgufzFWgzUg6sjFfijr9UqM27zm&categorias%5B%5D=Hogar+y+Herramientas">Hogar y herramientas</a></li>
                                </ul>
                              </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('sobreNosotros') }}">Sobre nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('trabajaConNosotros') }}">Trabaja con nosotros</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('catalogo') }}">Catalogo</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        
        
