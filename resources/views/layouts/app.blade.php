<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} | {{$titulo}} ">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>{{ config('app.name', 'Prevent Flame') }} | {{$titulo}}</title>
    <!-- Favicon -->
    <link href="favicon.png" rel="icon" />
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
        rel="stylesheet"/>
    <!-- Libraries Stylesheet -->
    <link href="{{asset('src')}}/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="{{asset('src')}}/lib/owlcarousel/assets/owl.carousel.min.css"
        rel="stylesheet"/>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('src')}}/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template Stylesheet -->
    <link href="{{asset('src')}}/css/style.css" rel="stylesheet" />
    <!-- Scripts 'resources/sass/app.scss', -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Topbar Start -->
        <div class="container-fluid bg-dark text-white-50 py-2 px-0 d-none d-lg-block">
            <div class="row gx-0 align-items-center">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="fa fa-phone-alt me-2"></small>
                        <small>(61) 98476-7967</small>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <small class="far fa-envelope-open me-2"></small>
                        <small>contato@preventflame.com.br</small>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <ul class="breadcrumb justify-content-end mb-0">
                    </ul>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
            <a href="{{url('/')}}" class="navbar-brand d-flex align-items-center">
                <h1 class="m-0">
                    <img
                        class="img-fluid me-3"
                        src="{{asset('logo.png')}}"
                        alt=""
                        width="150px"
                    />
                </h1>
            </a>
            <button
                type="button"
                class="navbar-toggler"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto bg-light pe-4 py-3 py-lg-0">
                    <a href="{{url('/')}}" class="nav-item nav-link active"
                        ><i class="fas fa-home"></i> Home</a
                    >
                    <a href="{{url('/sobre')}}" class="nav-item nav-link">
                        <img src="{{asset('favicon.png')}}" width="20px" alt=""> Sobre Nós
                    </a>
                    <div class="nav-item dropdown">
                        <a href="{{url('/cursos')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-medkit"></i> Cursos
                        </a>
                        <div class="dropdown-menu bg-light border-0 m-0">
                            <a href="{{url('/curso_detalhes')}}" class="dropdown-item">
                                <i class="fas fa-book-reader"></i> Capacitação Continuada
                            </a>
                            <hr>
                            <a href="{{url('/curso')}}" class="dropdown-item">
                                <i class="fas fa-book-reader"></i> Todos os Cursos
                            </a>
                        </div>
                    </div>
                    <a href="{{url('/contato')}}" class="nav-item nav-link">
                        <i class="fas fa-comment-dots"></i> Contato
                    </a>
                </div>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                    <a class="btn btn-warning btn-sm text-white"
                    href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> {{ __('Logar') }}
                    </a>
                    @endif
                    <a class="text-white" href="#"> | </a>
                    @if (Route::has('register'))
                    <a class="btn btn-warning btn-sm text-white"
                    href="{{ route('register') }}">
                    <i class="fas fa-save"></i> {{ __('Cadastrar') }}
                    </a>
                    @endif
                @else
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        @php
                                $grupo = Auth::user()->group;
                                $admin = route('admin');
                                $aluno = route('aluno');
                            @endphp
                        <div class="dropdown-menu bg-light border-0 m-0">
                            <a href="{{ ($grupo == 'admin' ? $admin : $aluno) }}" class="dropdown-item">
                                <i class="fas fa-tv"></i> Meu Painel
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-id-card"></i> Meu Perfil
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    {{-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/admin"><i class="fas fa-tv"></i> Meu Painel</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-id-card"></i> Meu Perfil</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                        </ul>
                    </div> --}}
                @endguest
            </div>
        </nav>
        <!-- Navbar End -->

        <main class="py-4">
            @include('components.flash-message')
            @yield('content')
        </main>

        <!-- Footer Start -->
        <div
            class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn"
            data-wow-delay="0.1s"
        >
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-md-6">
                        <h1 class="text-white mb-4">
                            <img
                                class="img-fluid me-3"
                                src="{{asset('logo-white.png')}}"
                                alt=""
                                width="200px"
                            />
                            {{-- Prevent Flame --}}
                        </h1>
                        <span
                            >Temos o compromisso de oferecer formação de
                            excelência, para que alunos nossos brigadistas
                            estejam aptos para atender todas as demandas que
                            encontrarem.</span
                        >
                    </div>
                    <div class="col-md-6">
                        <h5 class="text-light mb-4">Informações</h5>
                        <p>Cadastre seu e-mail para receber novidades.</p>
                        <div class="position-relative">
                            <input
                                class="form-control bg-transparent w-100 py-3 ps-4 pe-5"
                                type="text"
                                placeholder="Seu e-mail"
                            />
                            <button
                                type="button"
                                class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2"
                            >
                                Cadastrar
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-light mb-4">Entre em Contato</h5>
                        <p>
                            <i class="fa fa-map-marker-alt me-3"></i>
                            "Endereço de referência aqui"
                        </p>
                        <p>
                            <i class="fa fa-phone-alt me-3"></i>(61) 98476-7967
                        </p>
                        <p>
                            <i class="fa fa-envelope me-3"></i
                            >contato@preventflame.com.br
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-light mb-4">Nossos Serviços</h5>
                        <a class="btn btn-link" href="">Nossos Cursos</a>
                        <a class="btn btn-link" href="">Loja</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-light mb-4">Links</h5>
                        <a class="btn btn-link" href="">Sobre Nós</a>
                        <a class="btn btn-link" href="">Contato</a>
                        <a class="btn btn-link" href="">Termos & Condições</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-light mb-4">Siga-nos</h5>
                        <div class="d-flex">
                            <a
                                class="btn btn-square rounded-circle me-1"
                                href=""
                                ><i class="fab fa-twitter"></i
                            ></a>
                            <a
                                class="btn btn-square rounded-circle me-1"
                                href=""
                                ><i class="fab fa-facebook-f"></i
                            ></a>
                            <a
                                class="btn btn-square rounded-circle me-1"
                                href=""
                                ><i class="fab fa-youtube"></i
                            ></a>
                            <a
                                class="btn btn-square rounded-circle me-1"
                                href=""
                                ><i class="fab fa-linkedin-in"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid copyright">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-md-6 text-center text-md-start mb-3 mb-md-0"
                        >
                            &copy; <a href="#">Prevent Flame</a>, Todos os
                            direitos reservados.
                        </div>
                        <div class="col-md-6 text-center text-md-end"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to Top -->
        <a
            href="#"
            class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"
            ><i class="bi bi-arrow-up"></i
        ></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/parallax/parallax.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script>
            var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
            var dropdownList = dropdownElementList.map(function (dropdownToggleEl) {
                return new bootstrap.Dropdown(dropdownToggleEl)
            })
        </script>
        @yield('scripts')
    </div>
</body>
</html>
