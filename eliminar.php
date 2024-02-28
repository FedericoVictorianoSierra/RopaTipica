<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

require("php_con/db.php"); // Incluir el archivo que contiene la función de conexión 
$conexion = conexion(); // Crear la conexión a la base de datos

$query = "DELETE FROM articulo WHERE idarticulo = '$id'";

if(mysqli_query($conexion, $query)) {
    echo "El artículo ha sido eliminado correctamente.";
    echo "<script>location.href='articulos.php';</script>";
} else {
    echo "Error al eliminar el artículo: " . mysqli_error($conexion);
}
?>
