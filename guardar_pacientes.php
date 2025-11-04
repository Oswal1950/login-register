<?php
// 1️⃣ Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "login_register");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2️⃣ Obtener los datos del formulario
$folio = $_POST['folio'];
$nombre_paciente = $_POST['nombre_paciente'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];
$fecha_nac = $_POST['fecha_nac'];
$estudio = $_POST['estudio'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];

// 3️⃣ Insertar datos en la tabla
$sql = "INSERT INTO pacientes (folio, nombre_paciente, sexo, edad, fecha_nac, estudio, fecha, hora)
        VALUES ('$folio','$nombre_paciente', '$sexo', '$edad', '$fecha_nac', '$estudio', '$fecha', '$hora')";

// 4️⃣ Verificar si se guardaron los datos
if ($conexion->query($sql) === TRUE) {
    echo "✅ Datos guardados correctamente.";
} else {
    echo "❌ Error al guardar los datos: " . $conexion->error;
}

// 5️⃣ Cerrar la conexión
$conexion->close();


?>

<div class="container">
        <h1>Agregar otro paciente</h1>
        <a href="registro_pacientes.php" class="btn btn-warning">Agregar nuevo</a>
        <h1>Volver a inicio</h1>
        <a href="index.php" class="btn btn-warning">Volver a Inicio</a>
    </div>