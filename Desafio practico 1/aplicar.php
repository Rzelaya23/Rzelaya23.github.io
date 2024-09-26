<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar datos
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $carnet = htmlspecialchars($_POST['carnet']);
    $departamento = htmlspecialchars($_POST['departamento']);
    $edad = htmlspecialchars($_POST['edad']);
    $genero = htmlspecialchars($_POST['genero']);
    $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimiento']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $carrera = htmlspecialchars($_POST['carrera']);
    $pretension_salarial = htmlspecialchars($_POST['pretension_salarial']);

    // Crear una cadena con los datos
    $data = "Nombre: $nombre\nApellidos: $apellidos\nCarnet: $carnet\nDepartamento: $departamento\nEdad: $edad\nGénero: $genero\nFecha de Nacimiento: $fecha_nacimiento\nNúmero de Teléfono: $telefono\nCarrera: $carrera\nPretensión Salarial: $pretension_salarial\n\n";

    // Guardar en un archivo de texto
    $file = 'aplicaciones.txt'; // Nombre del archivo donde se guardarán los datos
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX); // Agregar los datos al archivo

    // Mostrar un mensaje de éxito
    echo "<h2>Aplicación Enviada</h2>";
    echo "<p>Gracias, $nombre $apellidos. Su aplicación ha sido enviada exitosamente.</p>";
} else {
    /* Redirigir si no es un método POST*/
    header("Location: aplicar.html");
    exit();

}

// Debug: Verificar si se reciben los datos
echo "<pre>";
print_r($_POST);
echo "</pre>";

?>
