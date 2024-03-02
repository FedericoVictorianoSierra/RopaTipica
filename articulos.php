<?php
$idusuario = "";
include 'conexion.php';


// Comprobar si se ha enviado el formulario de agregar al carrito
if (isset($_POST['agregar_carrito'])) {
    $idarticulo = $_POST['idarticulo']; // Obtener el ID del artículo a agregar
    $cantidad = $_POST['cantidad']; // Obtener la cantidad del artículo a agregar

    // Consulta SQL para verificar si ya existe una fila en la tabla de carrito con la misma ID de artículo y carrito activo
    $sql_verificar = "SELECT * FROM carrito WHERE idarticulo = $idarticulo AND idusuario = $idusuario AND activo = 1";
    $result_verificar = mysqli_query($conexion, $sql_verificar);

    if (mysqli_num_rows($result_verificar) > 0) { // Si ya existe una fila en la tabla de carrito con la misma ID de artículo y el carrito está activo
        $fila_verificar = mysqli_fetch_assoc($result_verificar);
        // Actualizar la cantidad del producto en la fila existente

        // Obtener la cantidad actual de productos en la fila existente
        $cantidad_actual = $fila_verificar['cantidad'];
        // Calcular la nueva cantidad de productos que habrá en la fila
        $cantidad_nueva = $cantidad_actual + $cantidad;
        // Obtener el ID de la fila existente en la tabla "carrito"
        $idcarrito = $fila_verificar['idcarrito'];

        // Crear una consulta SQL para actualizar la cantidad de productos en la fila existente
        $sql_actualizar = "UPDATE carrito SET cantidad = $cantidad_nueva WHERE idcarrito = $idcarrito";
        mysqli_query($conexion, $sql_actualizar); // Ejecutar la consulta SQL
    } else { // Si no existe una fila en la tabla de carrito con la misma ID de artículo y carrito activo
        // Insertar una nueva fila en la tabla de carrito
        $sql_insertar = "INSERT INTO carrito (idarticulo, idusuario, cantidad, activo) VALUES ($idarticulo, $idusuario, $cantidad, '1')";
        mysqli_query($conexion, $sql_insertar);
    }

    // Redirigir al usuario a la página del carrito de compras
    echo "<script>location.href='carrito.php';</script>";
}

?>



<?php include_once "encabezado.php" ?>

<!-- Navbar End -->
<div class="container-fluid p-0 mb-5">
    <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="img/caro1.png" height="600" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-primary font-weight-medium m-0">Atrevete a descubrir tú idendidad</h2>
                    <h1 class="display-1 text-white m-0">ARTÍCULOS</h1>
                    <h2 class="text-white m-0">* Con la mejor calidad del país*</h2>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/caro2.jpg" height="600" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-primary font-weight-medium m-0">Di quien eres sin hablar</h2>
                    <h1 class="display-1 text-white m-0">ARTÍCULOS</h1>
                    <h2 class="text-white m-0">* Bordados a mano *</h2>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="row">

            <?php
            // Mostrar el botón "Nuevo" solo si el valor de idrol es igual a 2
            if ($idrol == 2) {
                echo '<a class="btn btn-success" href="./insertar.php">Nuevo <i class="fa fa-plus"></i></a>';
            }
            ?>

            <?php
            // Obtener todas las categorías
            $query_categorias = "SELECT * FROM categoria";
            $resultado_categorias = mysqli_query($conexion, $query_categorias);

            // Recorrer todas las categorías
            while ($fila_categorias = mysqli_fetch_assoc($resultado_categorias)) {
                // Mostrar título de la categoría con su respectivo identificador para el scroll
            ?>
                <div class='container' id='categoria-<?php echo $fila_categorias['idcategoria']; ?>'>
                    <div class='section-title'>
                        <h4 class='text-primary text-uppercase' style='letter-spacing: 5px;'>Artículos principales</h4>
                        <h1 class='display-4'><?php echo $fila_categorias['nombre']; ?></h1>
                        <?php 
                            // Mandar el ID de la categoría a imprimir para mostrar el catálogo
                            echo "<a class='btn btn-info' href='imprimirCatalogo.php?id={$fila_categorias['idcategoria']}'><i class='fa fa-print'></i> Imprimir Catálogo</a>";  
                        ?>

                    </div>
                    <?php
                    // Obtener los artículos de la categoría actual
                    $query_articulos = "SELECT * FROM articulo WHERE idcategoria = " . $fila_categorias['idcategoria'];
                    $resultado_articulos = mysqli_query($conexion, $query_articulos);

                    // Mostrar los artículos de la categoría actual
                    ?>
                    <div class='row'>
                        <?php
                        // Recorrer todos los artículos de la categoría actual
                        while ($fila_articulos = mysqli_fetch_assoc($resultado_articulos)) {
                            // Obtener la imagen del artículo actual
                            $query_imagen = "SELECT imagen FROM img WHERE id_imagen = " . $fila_articulos['id_imagen'];
                            $result_imagen = mysqli_query($conexion, $query_imagen);
                            $row_imagen = mysqli_fetch_assoc($result_imagen);

                            // Mostrar cada artículo en su respectiva columna
                        ?>
                            <div class='col-lg-6'>
                                <div class='row align-items-center mb-5'>
                                    <div class='col-4 col-sm-3'>
                                        <!-- Mostrar la imagen del artículo actual -->
                                        <img class='w-100 rounded-circle mb-3 mb-sm-0' src='data:image/jpeg;base64,<?php echo base64_encode($row_imagen['imagen']); ?>' alt='imagen'>
                                        <h5 class='menu-price'><?php echo "$" . $fila_articulos['precio_venta']; ?></h5>
                                    </div>
                                    <div class='col-8 col-sm-9'>
                                        <!-- Mostrar los datos del artículo actual -->
                                        <h4><?php echo $fila_articulos['nombre']; ?></h4>
                                        <p><?php echo $fila_articulos['descripcion']; ?></p>
                                        <p>Talla: <?php echo $fila_articulos['talla']; ?></p>
                                        <p>Modelo: <?php echo $fila_articulos['modelo']; ?></p>
                                        <p>Existencia: <?php echo $fila_articulos['existencia']; ?></p>


                                        <?php
                                        if ($idrol == 1) { ?>
                                            <!-- Formulario para agregar el artículo al carrito -->
                                            <form method='post'>
                                                <input type='hidden' name='idarticulo' value='<?php echo $fila_articulos['idarticulo']; ?>'>
                                                <input class='btn btn-primary btn-lg px-4 me-sm-3' type='number' name='cantidad' value='1' min='1' max='<?php echo $fila_articulos['existencia']; ?>'>
                                                <button class='btn btn-primary btn-lg px-4 me-sm-3' type='submit' name='agregar_carrito'>Agregar al carrito</button>
                                            </form>
                                        <?php } ?>

                                        <?php
                                        // Mostrar el botón solo si el valor de idrol es igual a 2
                                        if ($idrol == 2) { ?>
                                            <form method='post'>
                                                <?php $id = $fila_articulos['idarticulo'] ?>
                                                <input type='hidden' name='idarticulo' value='<?php echo $fila_articulos['idarticulo']; ?>'>
                                                <a class="btn btn-warning" href="actualizar.php?id=<?php echo $fila_articulos['idarticulo']; ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger" href="eliminar.php?id=<?php echo $fila_articulos['idarticulo']; ?>"><i class="fa fa-trash"></i></a>
                                            </form>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>

</div>
<!-- Menu End -->

<?php include_once "pie.php" ?>

<script>
    // función que recibe el id de la categoría y enfoca hacia ella con una animación suave
    function enfocarCategoria(idcategoria) {
        // obtiene el elemento HTML de la categoría por su id
        var el = document.getElementById("categoria-" + idcategoria);
        // aplica el efecto de animación de desplazamiento suave al elemento HTML
        el.scrollIntoView({
            behavior: 'smooth',
            block: 'start' // define la posición del elemento de referencia (el inicio del elemento enfocado) en relación con la ventana de visualización
        });
    }
</script>