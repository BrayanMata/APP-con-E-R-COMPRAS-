<?php
    include("conexion.php");

    if (!isset($_GET['codigo'])) {
        echo "<p>Producto no especificado.</p>";
        exit;
    }

    $codigo = intval($_GET['codigo']);

    $query = "SELECT c.dni, c.nombre, c.tfno, c.fecha_na
            FROM compras co
            JOIN cliente c ON co.dni_cliente = c.dni
            WHERE co.codigo_producto = $codigo
            ORDER BY c.nombre ASC";

    $resultado = $conn->query($query);

    if ($resultado && $resultado->num_rows > 0) {
        echo "<table class='tabla-clientes' style='width:100%; border-collapse: collapse;'>
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Fecha de nacimiento</th>
                    </tr>
                </thead>
                <tbody>";
        while ($fila = $resultado->fetch_assoc()) {
            $dni   = htmlspecialchars($fila['dni']);
            $nombre= htmlspecialchars($fila['nombre']);
            $tfno  = htmlspecialchars($fila['tfno']);
            $fecha = htmlspecialchars($fila['fecha_na']);
            echo "<tr>
                    <td>{$dni}</td>
                    <td>{$nombre}</td>
                    <td>{$tfno}</td>
                    <td>{$fecha}</td>
                </tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p style='text-align:center;'>No hay clientes que hayan comprado este producto.</p>";
    }

    $conn->close();
?>