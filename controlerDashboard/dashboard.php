<?php
    
    require '../config/db.php';

    $db = new db();
    $con =$db->conexion();

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    


// Consulta para obtener la información de la empresa
$sql = "SELECT nombre_empresa, direccion, telefono, email, FROM empresas WHERE id = 1"; // Cambia el id según sea necesario
$resultado = $con->query($sql);

// Verificar si se encontró información
if ($resultado->num_rows > 0) {
    $empresa = $resultado->fetch_assoc();
} else {
    echo "No se encontró la información de la empresa.";
}




    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    

    <style>
        :root {
            --primario: #fbeadf;
            --primarioOscuro: #e2c4b6;
            --primarioFuerte: #d9b29f;
            --secundario: #687483;
            --secundarioOscuro: #5a6770;
            --blanco: #fff;
            --negro: #000;
            --fuentePrincipal: 'Staatliches', cursive;
        }

        body {
            background-color: var(--primario);
            font-family: var(--fuentePrincipal);
            color: var(--negro);
        }

        .bg-white {
            background-color: var(--blanco);
        }

        .text-gray-600 {
            color: var(--secundario);
        }

        .text-gray-900 {
            color: var(--secundarioOscuro);
        }

        #sidebar, .shadow {
            background-color: var(--blanco);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .hover\:shadow-lg:hover {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        #toggle-button, .cursor-pointer {
           
        }

        .boton {
  border: none;
  border-radius: 5px;
  padding: auto;

  cursor: pointer;
  background-color: var(--secundario);
  color: var(--blanco);
  font-family: var(--fuentePrincipal);
  font-size: 1.4rem;
}

.boton:hover {
  background-color: var(--secundarioOscuro);
}


        .imgCard {
            width: 300px;
            padding: 0;
            height: 200px;
            border-radius: 5px;
            margin-top: 1rem;
        }

        #sidebar.hidden {
            transform: translateX(-100%);
        }

        #toggle-button {
            position: absolute;
            top: 1rem;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background-color: var(--primarioOscuro); /* Usar el color oscuro como fondo */
            color: var(--blanco);
            font-family: var(--fuentePrincipal);
        }
        .navbar-logo {
            display: flex;
            align-items: center;
        }
        .navbar-logo img {
            position: absolute;
            height: 70px; /* Ajusta esto según el tamaño de tu logo */
        }
        .navbar-links {
            display: flex;
            align-items: center;
            gap: 20px; /* Espacio entre los elementos */
        }
        .navbar-item {
            cursor: pointer;
            transition: color 0.3s;
        }
        .navbar-item:hover {
            color: var(--primario); /* Color cuando el mouse pasa por encima */
        }
        .logout-button {
            padding: 10px 15px;
            background-color: var(--secundario); /* Color del botón de cerrar sesión */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .logout-button:hover {
            background-color: var(--secundarioOscuro); /* Color al pasar el mouse */
        }

        .tabla-docentes {
  border-collapse: collapse;
  margin: auto;
  background-color: var(--blanco);
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
}

.tabla-docentes th,
.tabla-docentes td {
  border: 1px solid #e2c4b6;
  padding: 8px;
  text-align: center;
}

.tabla-docentes th {
  background-color: var(--secundario);
  color: black;
}

.tabla-docentes tr:nth-child(even) {
  background-color: var(--primario);
}

.tabla-docentes tr:hover {
  background-color: var(--primarioOscuro);
}
    </style>
  

    </style>
</head>
<div class="navbar" style="padding: 1rem; background-color:#e2c4b6">
        <div class="navbar-logo">
            <img src="../src/img/Logo-removebg-preview.png" style="margin-left:50px " alt="SimulaScore Logo"> <!-- Cambia path_to_your_logo.png por la ruta de tu logo -->

            <a class="navbar-brand" href="#" style="font-family: Arial, Helvetica, sans-serif;  color:#000;font-size:2rem;  margin-left: 15rem;">
      <b style="font-family: Arial, Helvetica, sans-serif;">Alimienta</b>Hoy
    </a>
        </div>
        <div class="navbar-links">
           
        <a href="logoutDirectivo.php" class="boton" style="padding:0.5rem; background-color:#687483; text-decoration: none; ">
        Cerrar sesión
      </a>
        </div>
    </div>

<body class=" ">
    <div  class="flex h-screen">

    <button id="toggle-button" onclick="toggleSidebar()" class="p-4 mb-10 ">
            <i class="fas fa-bars"></i>
        </button>
<!-- Sidebar -->
<div id="sidebar" style="background-color:#e2c4b6;" class="w-64 p-4 shadow-lg">
    <h2 class="text-xl mb-6"></h2>
    <ul class="space-y-4 mt-5">
        <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer mt-10">
            <a href="/perfil" class="flex items-center w-full">
               
            </a>
        </li>
        <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer mt-10">
            <a href="./functionDirectivo/perfilDirectivo.php" class="flex items-center w-full">
                <i class="fas fa-user-circle mr-2"></i>
                Ver Perfil
            </a>
        </li>
        <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
            
                <i class="fas fa-file-alt mr-2"></i>
                Examenes
            </a>
        </li>
        <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
            
                <i class="fas fa-graduation-cap mr-2"></i>
                Examenes Mejoredu
            </a>
        </li>
        <!-- Nested items for Mejoredu -->
        <ul class="ml-6 space-y-2">
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/administrarDocentes.php" class="flex items-center w-full">
                    <i class="fas fa-users mr-2"></i>
                    Administrar Progreso por Grupo
                </a>
            </li>
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/verAlumnos.php" class="flex items-center w-full">
                    <i class="fas fa-user mr-2"></i>
                    Ver Progreso por Alumno
                </a>
            </li>
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/verExamenesProgesoDirectivo.php" class="flex items-center w-full">
                    <i class="fas fa-check-circle mr-2"></i>
                    Ver Examenes Activos
                </a>
            </li>
        </ul>
        <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
            <a href="#" class="flex items-center w-full">
                <i class="fas fa-trophy mr-2"></i>
                Olimpiadas
            </a>
        </li>
        <!-- Nested items for Olimpiadas -->
        <ul class="ml-6 space-y-2">
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/resultadosOlimpiada/administrarDocentesOlimpiada.php" class="flex items-center w-full">
                    <i class="fas fa-users mr-2"></i>
                    Administrar Progreso por Grupo
                </a>
            </li>
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/resultadosOlimpiada/verAlumnosOlimpiada.php" class="flex items-center w-full">
                    <i class="fas fa-user mr-2"></i>
                    Ver Progreso por Alumno
                </a>
            </li>
            <li class="flex items-center text-gray-600 hover:text-gray-900 cursor-pointer">
                <a href="functionDirectivo/resultadosOlimpiada/verExamenesProgresoDirectivoOlimpiada.php" class="flex items-center w-full">
                    <i class="fas fa-check-circle mr-2"></i>
                    Ver Examenes Activos
                </a>
            </li>
        </ul>
    </ul>
</div>


        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Upcoming Exams -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl ml-4">Simulascore</h2>
               
            </div>



            <div class="p-4 rounded-lg shadow flex flex-col items-center">
    <h2 class="text-2xl">Información de la Empresa</h2>
    <div class="p-4 rounded-lg flex flex-col items-center">
        <div class="contenedorPerfil w-full">
            <div class="card user-info w-full">
                <h3 class="text-xl font-bold"><?php echo $empresa['nombre']; ?></h3>
                <p><strong>Dirección:</strong> <?php echo $empresa['direccion']; ?></p>
                <p><strong>Teléfono:</strong> <?php echo $empresa['telefono']; ?></p>
                <p><strong>Email:</strong> <?php echo $empresa['email']; ?></p>
                <?php if (!empty($empresa['logo'])): ?>
                    <img src="<?php echo $empresa['logo']; ?>" alt="Logo de la empresa" class="imgCard">
                <?php endif; ?>
            </div>
        </div>
    </div>



                   <a href=" functionDirectivo/asignarGrupo.php">
                    <div style="background-color:#e2c4b6;" class=" p-4 rounded-lg shadow flex flex-col items-center">
                    <p class="text-3xl "><i class="fas fa-chalkboard-teacher mr-2"></i> Asignar grupos a maestros</p>
                    <img class="imgCard" src="../src/img/examen olimpiada del conocimiento.jpeg" alt="Logo" >
                </div>
                </a>
                </a>
                <a href="">
                    <div style="background-color:#e2c4b6;" class=" p-4 rounded-lg shadow flex flex-col items-center">
                    


                    </div>
                    </a>

                </div>
            </div>


   






            <!-- Exam Metrics -->

        </div>
    </div>
</body>
<script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>
</html>
