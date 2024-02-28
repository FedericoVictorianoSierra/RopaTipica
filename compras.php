<?php
$idusuario = "";
include 'conexion.php';

$sql = "SELECT idventa, fecha, impuesto, total, idcarrito FROM venta WHERE idusuario = $idusuario";
$result = mysqli_query($conexion, $sql);
?>


<?php include_once "encabezado.php" ?>


<!-- Page Header Start -->
<div class="container-fluid page-header mb-4 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">COMPRAS</h1>

    </div>
</div>
</div>
<!-- Compras cliente -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <table class="table tabla1">
                <thead>
                    <tr>
                        <th>Fecha de compra</th>
                        <th>Imagen</th>
                        <th>Código</th>
                        <th>Artículos</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Ticket</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $impuesto = $row['impuesto'];

                        $idcarrito = $row['idcarrito'];
                        $sqlcarrito = "SELECT * FROM carrito WHERE idcarrito = $idcarrito";
                        $resultadocarrito = mysqli_query($conexion, $sqlcarrito);
                        while ($rowcarrito = mysqli_fetch_assoc($resultadocarrito)) {

                            $idarticulo = $rowcarrito['idarticulo'];
                            $sqlarticulo = "SELECT * FROM articulo WHERE idarticulo = $idarticulo";
                            $resultadoarticulo = mysqli_query($conexion, $sqlarticulo);
                            $rowarticulo = mysqli_fetch_assoc($resultadoarticulo);

                            // Obtener imagen de la base de datos
                            $query_imagen = "SELECT imagen FROM img WHERE id_imagen = " . $rowarticulo['id_imagen'];
                            $result_imagen = mysqli_query($conexion, $query_imagen);
                            $row_imagen = mysqli_fetch_assoc($result_imagen);
                            $idventa = $row['idventa'];

                            echo "<tr>";
                            echo "<td>{$row['fecha']}</td>";
                    ?>
                            <td><img src='data:<?php echo $row_imagen['Tipo']; ?>;base64,<?php echo base64_encode($row_imagen['imagen']); ?>' alt='imagen' width='100'></td>
                    <?php
                            echo "<td>{$rowarticulo['codigo']}</td>";
                            echo "<td>{$rowarticulo['nombre']}</td>";
                            echo "<td>{$rowarticulo['descripcion']}</td>";
                            echo "<td>{$rowcarrito['cantidad']}</td>";
                            echo "<td>{$row['total']}</td>";
                            ?>

                            <td>
                                <form method='post'>
                                <a class="btn btn-info" href="imprimirTicket.php?id=<?php echo $idventa; ?>"><i class="fa fa-print"></i></a>
                                </form>
                            </td>

                            <?php
                            echo "</tr>";
                        }
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