<?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $codigo = $_POST["codigo"];
        $nombre = $_POST["nombre_producto"];
        $precio = $_POST["precio"];
        $proveedor = $_POST["proveedor"];

        $sql = "INSERT INTO producto (codigo, nombre, precio, nif_proveedor) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isdi", $codigo, $nombre, $precio, $proveedor);
        $stmt->execute();

        echo "<script>alert('Producto registrado correctamente'); window.location.href='../index.php';</script>";
    }

    $sqlProveedores = "SELECT nif, nombre FROM proveedor";
    $resultProveedores = $conn->query($sqlProveedores);
    $proveedores = [];
    while ($row = $resultProveedores->fetch_assoc()) {
        $proveedores[] = $row;
    }
?>