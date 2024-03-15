<?php
session_start();
// Destruir la sesión correctamente
session_destroy();
// Redirigir al formulario de inicio de sesión
header('Location: index.php');
exit();
