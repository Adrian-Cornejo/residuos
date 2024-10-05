<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes Pedidos</title>
    <link rel="stylesheet" href="styles/stylesSolicitud.css">
</head>
<body>

<!-- Header -->
<header class="header-container">
        <button class="back-btn" onclick="window.history.back()">← Regresar</button>
        <div class="logo-container">
            <img src="logo.png" alt="Logo de la empresa" class="logo">
            <h1>Alimenta Hoy</h1>
        </div>
    </header>
    

    <!-- Tabla de Solicitudes -->
    <h2 style="text-align: center; margin-top: 20px;">Información de Solicitudes</h2>
    <p style="text-align: center;">A continuación se muestra la información de las solicitudes almacenadas en la base de datos:</p>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID Solicitud</th>
                    <th>Centro de Acopio</th>
                    <th>Producto</th>
                    <th>Cantidad Solicitada</th>
                    <th>Fecha Solicitada</th>
                    <th>Estado de Solicitud</th>
                    <th class="checkbox-column">Seleccionar</th>
                </tr>
            </thead>
            <tbody id="table-body">
                <tr>
                    <td>1</td>
                    <td>Centro Norte</td>
                    <td>Arroz</td>
                    <td>50 kg</td>
                    <td>2024-10-01</td>
                    <td>Pendiente</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Centro Sur</td>
                    <td>Frijol</td>
                    <td>30 kg</td>
                    <td>2024-10-02</td>
                    <td>Aprobada</td>
                    <td><input type="checkbox"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Centro Este</td>
                    <td>Harina</td>
                    <td>20 kg</td>
                    <td>2024-10-03</td>
                    <td>En Proceso</td>
                    <td><input type="checkbox"></td>
                </tr>
            </tbody>
        </table>
    </div>
     <!-- Botón Confirmar -->
     <button class="confirm-btn" onclick="confirmSelection()">Confirmar</button>

<script>
    function confirmSelection() {
        alert('La selección ha sido confirmada.');
        // Aquí podrías agregar la lógica adicional para enviar los datos seleccionados al servidor, etc.
    }
</script>
</body>
</html>