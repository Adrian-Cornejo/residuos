<?php

session_start(); // Iniciar sesión

require_once '../config/db.php'; // Incluir el archivo de la clase db

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
    $password = $_POST['password'];

    // Crear una instancia de la clase db
    $database = new db();
    $conn = $database->conexion();


    if ($conn instanceof PDO) {
        // Preparar y ejecutar la consulta
        $stmt = $conn->prepare("SELECT * FROM localidades WHERE email = :email LIMIT 1");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

        if ($user && password_verify($password, $user['contrasena'])) {
            // Las credenciales son correctas
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            header("Location: ../dashboardLocalidad/dashboardLoc.php"); // Redirigir a un dashboard o página principal
            exit();
        } else {
            // Las credenciales son incorrectas
            $_SESSION['error'] = "Correo electrónico o contraseña incorrectos.";
            header("Location: ../index.php"); // Redirigir de vuelta al login
            exit();
        }
    } else {
        $_SESSION['error'] = "Error al conectar con la base de datos: " . $conn;
        header("Location: ../index.php"); // Redirigir de vuelta al login
        exit();
    }
}
?>
