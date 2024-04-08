<?php

ini_set('log_errors', 1);
ini_set('error_log', 'php_errors.log');
date_default_timezone_set('America/Guayaquil');

// Función para manejar los errores de PHP
function errorHandler($errno, $errstr, $errfile, $errline) {
    // Formatea el mensaje de error
    $errorMessage = "PHP Error [$errno]: $errstr in $errfile on line $errline";
    
    // Registra el mensaje de error en el archivo de registro
    error_log($errorMessage);
    
    // Opcional: puedes mostrar un mensaje de error personalizado al usuario
    $mensaje = "Lo sentimos, se ha producido un error. Por favor, inténtelo de nuevo más tarde.";
    echo json_encode($mensaje." - ". $errorMessage);
    // include_once 'views/errores/errores.php';
    
    // Detiene la ejecución del script para evitar que el error se propague
    exit(1);
}

// Registra la función errorHandler() como manejador de errores de PHP
set_error_handler("errorHandler");
require_once "libs/database.php";
require_once "libs/controller.php";
require_once "libs/view.php";
require_once "libs/model.php";
require_once "libs/app.php";
require_once "config/config.php";
include_once 'includes/user.php';
include_once 'includes/user_session.php';

// require_once('../boardcomputronsa2.php');


$userSession = new User_Session();
$user = new User();
// // echo $_SESSION["usuario"];
// $data = new Database();

// if ($data->connect_dobra()) {
    //echo "true";
    $app = new App();
// } else {
//     //include_once 'views/errores/500.php';
// }
