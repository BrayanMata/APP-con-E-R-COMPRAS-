<?php
    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nif = $_POST["nif"];
        $nombre = $_POST["nombre_proveedor"];
        $direccion = $_POST["direccion"];

        $sql = "INSERT INTO proveedor (nif, nombre, direccion) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $nif, $nombre, $direccion);
        $stmt->execute();

        echo "<script>alert('Proveedor registrado correctamente'); window.location.href='../index.php';</script>";
    }
?>