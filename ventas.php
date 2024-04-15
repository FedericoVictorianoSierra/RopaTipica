<?php

include 'conexion.php';

$sql = "SELECT idusuario, idcarrito, fecha, impuesto, total FROM venta";
$result = mysqli_query($conexion, $sql);
?>


<?php include_once "encabezado.php" ?>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-4 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">VENTAS</h1>

    </div>
</div>
</div>
<!-- Ventas (Administrador)-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <?php echo "<td><a class='btn btn-info' href='imprimirVentas.php?'><i class='fa fa-print'></i></a></td>"; ?>
            <table class="table tabla1">
                <thead>
                    <tr>
                        <th>Fecha de compra</th>
                        <th>Usuario</th>
                        <th>Imagen</th> 
                        <th>Código</th>
                        <th>Artículos</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $fecha = $row['fecha'];
                        $impuesto = $row['impuesto']; 
                        $total = $row['total'];

                        // Realizar consulta para obtener el usuario asociada al idusuario
                        $query_usuario = "SELECT nombre FROM usuario WHERE idusuario= " . $row['idusuario'];
                        $result_usuario = mysqli_query($conexion, $query_usuario);
                        $row_usuario = mysqli_fetch_assoc($result_usuario);

                        $usuarionombre = $row_usuario['nombre'];

                        $idcarrito = $row['idcarrito'];
                        $sqlcarrito = "SELECT * FROM carrito WHERE idcarrito = $idcarrito";
                        $resultadocarrito = mysqli_query($conexion, $sqlcarrito);
                        $rowcarrito = mysqli_fetch_assoc($resultadocarrito);

                        $idarticulo = $rowcarrito['idarticulo'];
                        $sqlarticulo = "SELECT * FROM articulo WHERE idarticulo = $idarticulo";
                        $resultadoarticulo = mysqli_query($conexion, $sqlarticulo);
                        $rowarticulo = mysqli_fetch_assoc($resultadoarticulo);

                        // Obtener imagen de la base de datos
                        $query_imagen = "SELECT imagen FROM img WHERE id_imagen = " . $rowarticulo['id_imagen'];
                        $result_imagen = mysqli_query($conexion, $query_imagen);
                        $row_imagen = mysqli_fetch_assoc($result_imagen);
                    ?>
                        <?php
                        ?>
                        <tr>

                            <td><?php echo $fecha; ?></td>
                            <td><?php echo $usuarionombre; ?></td>
                            <td><img src='data:<?php echo $row_imagen['Tipo']; ?>;base64,<?php echo base64_encode($row_imagen['imagen']); ?>' alt='imagen' width='100'></td>
                            <td><?php echo $rowarticulo['codigo']; ?></td>
                            <td><?php echo $rowarticulo['nombre']; ?></td>
                            <td><?php echo $rowarticulo['descripcion']; ?></td>
                            <td><?php echo $rowcarrito['cantidad']; ?></td>
                            <td><?php echo "$" . $total; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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
<?php include_once "pie.php" ?>