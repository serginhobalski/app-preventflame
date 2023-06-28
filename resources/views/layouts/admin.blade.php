<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Prevent Flame | {{$titulo}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="formação brigadistas, socorristas" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{{asset('favicon.png')}}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('admin')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{asset('admin')}}/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin')}}/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    <!-- Scripts 'resources/sass/app.scss', -->
    @vite(['resources/js/app.js'])
    @yield('styles')
</head>

<body>
    <div id="app" class="container-xxl position-relative bg-white d-flex p-0">
        @if (Auth::user()->group == 'admin')
            @include('components.menu-admin')
        @else
            @include('components.menu-usuario')
        @endif

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-dark text-white navbar-light sticky-top px-4 py-0">
                <a href="{{url('/')}}" class="navbar-brand d-flex d-lg-none me-4">
                    <img src="{{ asset('logo.png') }}" width="100px" alt="">
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Mensagem</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle"></i>
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Mensagem de exemplo...</h6>
                                        <small>22/06/2023 15:45</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-user-circle"></i>
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Mensagem de exemplo...</h6>
                                        <small>22/06/2023 15:45</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Ver todas as mensagens</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificações</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">
                                    <i class="fas fa-info-circle"></i> Contato recebido</h6>
                                <small>20/06/2023 11:45</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0"><i class="fas fa-info-circle"></i> Novo usuário adicionado</h6>
                                <small>22/06/2023 12:30</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0"><i class="fas fa-info-circle"></i> Senha alterada</h6>
                                <small>23/06/2023 15:45</small>
                            </a>
                            <hr class="dropdown-divier">
                            <a href="#" class="dropdown-item text-center">Ver todas as notificações</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if (!Auth::user()->image)
                            <i class="fas fa-user-circle fa-2x"></i>
                            @else
                                <img src="{{asset('storage/'.Auth::user()->image)}}"
                                 style="border-radius: 50%" width="30px" alt="">
                            @endif
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            @php
                                $grupo = Auth::user()->group;
                                $admin = route('admin');
                                $aluno = route('aluno');
                            @endphp
                            <a href="{{ ($grupo == 'admin' ? $admin : $aluno) }}"
                            class="dropdown-item">
                                <i class="fas fa-id-badge"></i> Meu Painel
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user-cog"></i> Atualizar perfil
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
                </div>
            </nav>
            <!-- Navbar End -->

            @include('components.flash-message')

            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <img src="{{asset('logo.png')}}" width="100px" alt="">
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <a class="border-bottom" href="https://preventflame.com.br" target="_blank">preventflame.com.br</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('admin')}}/lib/chart/chart.min.js"></script>
    <script src="{{asset('admin')}}/lib/easing/easing.min.js"></script>
    <script src="{{asset('admin')}}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{asset('admin')}}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{asset('admin')}}/lib/tempusdominus/js/moment.min.js"></script>
    <script src="{{asset('admin')}}/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="{{asset('admin')}}/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{asset('admin')}}/js/main.js"></script>
    @yield('scripts')
</body>

</html>
