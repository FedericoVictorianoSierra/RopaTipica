<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include 'conexion.php';

$sql = "SELECT idusuario, idcarrito, fecha, impuesto, total FROM venta WHERE idventa='$id'";
$result = mysqli_query($conexion, $sql);
$row = mysqli_fetch_assoc($result);
?>
<style>
    * {
        font-size: 12px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        border-collapse: collapse;
    }

    td.producto,
    th.producto {
        width: 75px;
        max-width: 75px;
    }

    td.cantidad,
    th.cantidad {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 50px;
        max-width: 50px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 175px;
        max-width: 175px;
    }

    img {
        max-width: inherit;
        width: inherit;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">

        <!--Agregar imagen al pdf.
            <img src="./logo.png" alt="Logotipo">-->
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $row['fecha']; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="cantidad">CANT</th>
                    <th class="producto">PRODUCTO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $idcarrito = $row['idcarrito'];
                $sqlcarrito = "SELECT * FROM carrito WHERE idcarrito = $idcarrito";
                $resultadocarrito = mysqli_query($conexion, $sqlcarrito);
                $rowcarrito = mysqli_fetch_assoc($resultadocarrito);

                $idarticulo = $rowcarrito['idarticulo'];
                $sqlarticulo = "SELECT * FROM articulo WHERE idarticulo = $idarticulo";
                $resultadoarticulo = mysqli_query($conexion, $sqlarticulo);
                $rowarticulo = mysqli_fetch_assoc($resultadoarticulo);

                ?>
                <tr>
                    <td class="cantidad"><?php echo $rowcarrito['cantidad'];  ?></td>
                    <td class="producto"><?php echo $rowarticulo['nombre'] ?> <strong></strong></td>
                    <td class="precio">$<?php echo number_format($rowarticulo['precio_venta'], 2)  ?></td>
                </tr>
                <?php  ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($row['total'], 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./compras.php";
        }, 1000);
    });
</script>