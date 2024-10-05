<?php
// Iniciar la sesión
session_start();

// Destruir todas las sesiones activas
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir al usuario a la página de login (o cualquier otra página)
header("Location: ../index.php"); // Cambia esta ruta según tu estructura de directorios
exit();
?>
