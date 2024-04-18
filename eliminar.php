<?php
$id = $_GET["id"];

require("php_con/db.php"); 
$conexion = conexion();

// Eliminar registros relacionados en la tabla 'venta'
$query_delete_venta = "DELETE FROM venta WHERE idcarrito IN (SELECT idcarrito FROM carrito WHERE idarticulo = '$id')";
mysqli_query($conexion, $query_delete_venta);

// Eliminar registros relacionados en la tabla 'carrito'
$query_delete_carrito = "DELETE FROM carrito WHERE idarticulo = '$id'";
mysqli_query($conexion, $query_delete_carrito);

// Eliminar el artículo de la tabla 'articulo'
$query_delete_articulo = "DELETE FROM articulo WHERE idarticulo = '$id'";
if(mysqli_query($conexion, $query_delete_articulo)) {
    echo "El artículo ha sido eliminado correctamente.";
    echo "<script>location.href='articulos.php';</script>";
} else {
    echo "Error al eliminar el artículo: " . mysqli_error($conexion);
}

?>
