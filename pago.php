<?php

session_start(); // Iniciar sesión

if (!isset($_SESSION['idusuario'])) {
    // Redirigir al usuario a la página de inicio de sesión si no hay una sesión iniciada
    header("Location: sesion.php");
    exit();
}

// El ID del usuario está disponible en $_SESSION['idusuario']
$idusuario = $_SESSION['idusuario'];
require("php_con/db.php"); // Incluir el archivo que contiene la función de conexión 
$conexion = conexion(); // Crear la conexión a la base de datos
?>


<?php include_once "encabezado.php" ?>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-4 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">PAGO</h1>
    </div>
</div>
</div>
<!-- Page Header End -->
<!-- Navbar End -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

        <!-- Metodos de pago -->
           
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include_once "ventana.php" ?>
<?php include_once "pie.php" ?>