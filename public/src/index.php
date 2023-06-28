<?php

// include('lib/conexao.php');
// include('lib/protect.php');
// protect(0);

// if(!isset($_SESSION))
//     session_start();

$pagina = "inicial.php";
if (isset($_GET['p'])) {
    $titulo = $_GET['p'];
    $pagina = $titulo . ".php";
}

// $id_usuario = $_SESSION['usuario'];
// $sql_query_admin = $mysqli->query("SELECT * FROM usuarios WHERE id = '$id_usuario'") or die($mysqli->error);
// $dados_usuario = $sql_query_admin->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <?php
    if (!isset($_GET['p'])) {
        $titulo = 'inicial';
    } else {
        $titulo = $_GET['p'];
    }
    ?>
    <title>Prevent Flame | <?php echo strtoupper($titulo) ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="favicon.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
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
                <ol class="breadcrumb justify-content-end mb-0">
                    <li class="breadcrumb-item">
                        <a class="text-white-50 small" href="index.php?p=inicial">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-white-50 small" href="index.php?p=cursos">Cursos</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-white-50 small" href="index.php?p=loja">Loja</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="text-white-50 small" href="index.php?p=contato">Contato</a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="/" class="navbar-brand d-flex align-items-center">
            <h1 class="m-0">
                <img class="img-fluid me-3" src="logo.png" alt="" width="150px" />
            </h1>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light pe-4 py-3 py-lg-0">
                <a href="index.php?p=inicial" class="nav-item nav-link active">Home</a>
                <a href="index.php?p=sobre" class="nav-item nav-link">Sobre Nós</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cursos</a>
                    <div class="dropdown-menu bg-light border-0 m-0">
                        <a href="index.php?p=capacitacao_continuada" class="dropdown-item">Capacitação Continuada</a>
                        <a href="index.php?p=cursos" class="dropdown-item">Todos os Cursos</a>
                    </div>
                </div>
                <a href="index.php?p=contato" class="nav-item nav-link">Contato</a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <?php include('pages/' . $pagina); ?>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-white mb-4">
                        <img class="img-fluid me-3" src="logo-white.png" alt="" width="200px" />

                    </h1>
                    <span>Temos o compromisso de oferecer formação de
                        excelência, para que alunos nossos brigadistas
                        estejam aptos para atender todas as demandas que
                        encontrarem.</span>
                </div>
                <div class="col-md-6">
                    <h5 class="text-light mb-4">Informações</h5>
                    <p>Cadastre seu e-mail para receber novidades.</p>
                    <div class="position-relative">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Seu e-mail" />
                        <button type="button" class="btn btn-primary py-2 px-3 position-absolute top-0 end-0 mt-2 me-2">
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
                        <i class="fa fa-envelope me-3"></i>contato@preventflame.com.br
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
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
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
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

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
</body>

</html>