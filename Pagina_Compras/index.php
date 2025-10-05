<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estiloGeneral.css">
    <link rel="stylesheet" href="css/estiloFormulario.css">
    <link rel="stylesheet" href="css/estiloTabla.css">

    <title>Tecnolandia</title>
</head>
<body>
    <header>
        <h2>Sistema de gestion: Tecnolandia</h2>
    </header>
    <main>
        <div class="formulario">
            <h2>Nuevo cliente</h2>
            <form action="php/nuevoCliente.php" method="post">

                <label for="dni">DNI:</label>
                <input type="number" name="dni" id="dni" maxlength="9" required>

                <label for="nombre_cliente">Nombre:</label>
                <input type="text" id="nombre_cliente" name="nombre_cliente" required>

                <label for="fecha">Fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha">

                <label for="telefono">Numero de Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" maxlength="10" required>

                <label for="producto">Producto:</label>
                <select name="producto" id="producto">
                    <option value="">-- Selecciona un producto --</option>
                    <?php
                        include("php/nuevoCliente.php");
                        foreach ($productos as $p) {
                            echo "<option value='{$p['codigo']}'>{$p['nombre']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Aceptar</button>

            </form>
        </div>

        <div class="formulario">
            <h2>Nuevo producto</h2>
            <form action="php/nuevoProducto.php" method="post">

                <label for="codigo">Codigo de producto:</label>
                <input type="number" name="codigo" id="codigo" maxlength="9" required>

                <label for="nombre_producto">Nombre:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" required>

                <label for="precio">Precio:</label>
                <input type="number" name="precio" id="precio">

                <label for="proveedor">Proveedor:</label>
                <select name="proveedor" id="proveedor">
                    <option value="">-- Selecciona un proveedor --</option>
                    <?php
                        include("php/nuevoProducto.php");
                        foreach ($proveedores as $pr) {
                            echo "<option value='{$pr['nif']}'>{$pr['nombre']}</option>";
                        }
                    ?>
                </select>

                <button type="submit">Aceptar</button>

            </form>
        </div>

        <div class="formulario">
            <h2>Nuevo proveedor</h2>
            <form action="php/nuevoProveedor.php" method="post">

                <label for="nif">NIF:</label>
                <input type="number" name="nif" id="nif" maxlength="9" required>

                <label for="nombre_proveedor">Nombre:</label>
                <input type="text" id="nombre_proveedor" name="nombre_proveedor" required>

                <label for="direccion">Direccion:</label>
                <input type="text" name="direccion" id="direccion">

                <button type="submit">Aceptar</button>

            </form>
        </div>

        <div class="tabla_productos">
            <div class="fila_principal">
                <p>Codigo</p>
                <p>Nombre del producto</p>
                <p>Precio</p>
                <p>Proveedor</p>
                <p></p>
            </div>
            
            <?php include("php/mostrarProductos.php"); ?>

            <div class="informacion-proveedor" id="informacion-proveedor"></div>

            <div class="info-ventas" id="info-ventas">
                <button id="cerrar-ventas" style="float:right;">X</button>
                <div class="contenido-ventas" id="contenido-ventas"></div>
            </div>
        </div>
    </main>

    <script src="js/formulario.js"></script>
    <script src="js/tabla.js"></script>
    <script src="js/tabla_ventas.js"></script>

</body>
</html>