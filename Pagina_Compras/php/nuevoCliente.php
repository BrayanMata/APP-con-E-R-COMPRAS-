<?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre_cliente"];
        $fecha = $_POST["fecha"];
        $telefono = $_POST["telefono"];
        $producto = $_POST["producto"];

        $sql = "INSERT INTO cliente (dni, nombre, fecha_na, tfno) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $dni, $nombre, $fecha, $telefono);
        $stmt->execute();

        if (!empty($producto)) {
            $sqlCompra = "INSERT INTO compras (dni_cliente, codigo_producto) VALUES (?, ?)";
            $stmt2 = $conn->prepare($sqlCompra);
            $stmt2->bind_param("ii", $dni, $producto);
            $stmt2->execute();
        }

        echo "<script>alert('Cliente registrado correctamente'); window.location.href='../index.php';</script>";
    }

    $sqlProductos = "SELECT codigo, nombre FROM producto";
    $resultProductos = $conn->query($sqlProductos);
    $productos = [];
    while ($row = $resultProductos->fetch_assoc()) {
        $productos[] = $row;
    }
?>