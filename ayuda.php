<?php
session_start(); // Iniciar sesión 
include 'php_con/db.php'; // Incluir el archivo de conexión a la base de datos
$conexion = conexion(); // Establecer la conexión a la base de datos

if (isset($_SESSION['idusuario'])) {
    // El ID del usuario está disponible en $_SESSION['idusuario']
    $idusuario = $_SESSION['idusuario'];

    // Obtener el valor de idrol del usuario actual desde la tabla usuario
    $query_usuario = "SELECT idrol FROM usuario WHERE idusuario = $idusuario";
    $resultado_usuario = mysqli_query($conexion, $query_usuario);
    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);
    $idrol = $fila_usuario['idrol'];
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>ROPA TIPICA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/Thak.png" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/cookies.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            text-align: center;
        }
        .pdf-container {
            margin: 20px 0;
            width: 100%;
            max-width: 800px;
        }
        .pdf-title {
            margin: 10px 0;
            text-align: center;
        }
        iframe {
            width: 100%;
            height: 500px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.php" class="navbar-brand px-lg-4 m-0">
                 <!--<h1 class="m-0 display-4 text-uppercase text-white">ROPA TIPICA</h1>-->
                <img class="w-25" src="img/Thak.png" alt="Image">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="index.php" class="nav-item nav-link">INICIO</a>
                    <a href="categoria.php" class="nav-item nav-link">CATEGORÍA</a>
                    <a href="articulos.php" class="nav-item nav-link">ARTÍCULOS</a>

                    <?php
                    if (isset($_SESSION['idusuario'])) {
                        if ($idrol == 1) { ?>
                            <a href="carrito.php" class="nav-item nav-link">CARRITO</a>
                            <a href="compras.php" class="nav-item nav-link">COMPRAS</a>
                        <?php } else { ?>
                            <a href="ventas.php" class="nav-item nav-link">VENDIDO</a>
                        <?php }
                    } else { ?>
                        <a href="carrito.php" class="nav-item nav-link">CARRITO</a>
                    <?php } ?>

                    <a href="perfil.php" class="nav-item nav-link">PERFIL</a>
                    <a href="ayuda.php" class="nav-item nav-link active">AYUDA</a>

                    <?php
                    if (!isset($_SESSION['idusuario'])) {
                        //iniciar sesión
                    ?>
                        <a href="cerrarsesion.php" class="nav-item nav-link">INICIAR SESIÓN</a>
                    <?php
                    } else {
                        //cerrar sesión
                    ?>
                        <a href="cerrarsesion.php" class="nav-item nav-link">CERRAR SESIÓN</a>
                    <?php
                    }
                    ?>

                    <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a> -->
                        <div class="dropdown-menu text-capitalize">
                            <a href="reservation.php" class="dropdown-item">Reservation</a>
                            <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        </div>
                    </div>
                    <!-- <a href="contact.php" class="nav-item nav-link">Contact</a> -->
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/Tlaxiaco.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h1 class="display-1 text-white m-0">AYUDA</h1>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <h1>Visualización de PDFs</h1>
    
    <div class="pdf-container">
        <div class="pdf-title">
            <h2>Manual de Usuario</h2>
        </div>
        <iframe src="pdf/manual_de_usuario.pdf" type="application/pdf"></iframe>
    </div>

    <div class="pdf-container">
        <div class="pdf-title">
            <h2>Manual de Proveedor</h2>
        </div>
        <iframe src="pdf/manual_de_proveedor.pdf" type="application/pdf"></iframe>
    </div>



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/cookies.js"></script>
</body>