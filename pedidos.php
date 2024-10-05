<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="styles/stylesPedidos.css">
</head>
<body>
    <header class="header-container">
        <div class="back-btn" onclick="window.history.back()"><- Regresar</div>
        <div class="logo-container" >
            <img src="logo.png" alt="Logo de la empresa" class="logo">
            <h1>Alimenta Hoy</h1>
        </div>
    </header>

    <main>

    <section>
        
        <h2>Pedidos</h2>

        <form action="" method="post">
            
        <!- imputs ->
        <label>Nombre:</label>
        <input type="text" id=input placeholder="Ingrese su nombre" onfocus="this.placeholder= ''"  onblur="this.placeholder ='Ingrese su nombre'" >

        <!-- Primera lista desplegable -->
        <label for="localidad">Seleccionar Localidad:</label>
            <select id="localidad" name="Localidad">
                <option value="">Cargando Localidades...</option>
            </select>


        <label>Fecha de expedicion:</label>
        <input type="date" id="fechaInput">

        <label>Fecha de entrega:</label>
        <input type="date" id="fechaInput">
        <br>
        <br>

        <button type="submit" id="enviarBtn">Enviar</button>
        
        </form>

    </section>



    </main>
    

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Mi Empresa. Todos los derechos reservados.</p>
    </footer>
</body>
</html>