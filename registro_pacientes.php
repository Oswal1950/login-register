<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php"); 
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Pacientes</title>
</head>
<body>
  <h2>Registrar Paciente</h2>
  <form action="guardar_pacientes.php" method="POST">

    <label>Folio:</label><br>
    <input type="text" name="folio" required><br><br>

    <label>Nombre del Paciente:</label><br>
    <input type="text" name="nombre_paciente" required><br><br>

    <label>Sexo:</label><br>
    <select name="sexo" required>
      <option value="Masculino">Masculino</option>
      <option value="Femenino">Femenino</option>
      <option value="Otro">Otro</option>
    </select><br><br>

    <label>Edad:</label><br>
    <input type="number" name="edad" required><br><br>

    <label>Fecha de Nacimiento:</label><br>
    <input type="date" name="fecha_nac" required><br><br>

    <label>Estudio:</label><br>
    <input type="text" name="estudio" required><br><br>

    <label>Fecha:</label><br>
    <input type="date" name="fecha" required><br><br>

    <label>Hora:</label><br>
    <input type="time" name="hora" required><br><br>

    <button type="submit">Guardar</button>

  </form>
  
</body>
</html>