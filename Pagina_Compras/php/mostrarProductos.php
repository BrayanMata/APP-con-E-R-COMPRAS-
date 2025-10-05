<?php
    include("conexion.php");

    $query = "SELECT p.codigo, p.nombre AS nombre_producto, p.precio, 
                    pr.nombre AS proveedor, pr.direccion
            FROM producto p
            LEFT JOIN proveedor pr ON p.nif_proveedor = pr.nif
            ORDER BY p.nombre ASC";

    $resultado = $conn->query($query);

    if ($resultado && $resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            $codigo    = htmlspecialchars($fila['codigo']);
            $nombre    = htmlspecialchars($fila['nombre_producto']);
            $precio    = $fila['precio'] !== null ? '$' . number_format((float)$fila['precio'], 2, '.', ',') : '';
            $proveedor = htmlspecialchars($fila['proveedor']);
            $direccion = htmlspecialchars($fila['direccion']);
            
            echo "
            <div class='fila_producto'>
                <p>{$codigo}</p>
                <p>{$nombre}</p>
                <p>{$precio}</p>
                <p class='proveedor-info' data-nombre='{$proveedor}' data-direccion='{$direccion}'>{$proveedor}</p>
                <p><button>Ventas</button></p>
            </div>";
        }
    } else {
        echo "<p style='text-align:center;'>No hay productos registrados.</p>";
    }

    $conn->close();
?>