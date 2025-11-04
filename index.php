<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php"); 
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Inicio</title>
</head>
<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <a href="logout.php" class="btn btn-warning">Cerrar Sesion</a>
        <a href="registro_pacientes.php" class="btn btn-warning">Agregar Informacion de Paciente</a>
    </div>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>INICIO</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="table-responsive">
  <div class="container py-6">
    <h2 class="mb-4 text-center">AGENDA PARA ESTUDIOS DE PACIENTES HAQ</h2>
    <div class="card shadow-sm">
      <div class="card-body">
        <table id="miTabla" class="table table-striped table-hover" >
          <?php
          require_once "database.php";
          $sql = "SELECT * FROM pacientes ORDER BY folio DESC";
          $result = mysqli_query($conn, $sql);
          ?>
          <thead class="table-dark">
            <tr>
              <th>FOLIO</th>
              <th>NOMBRE COMPLETO DEL PACIENTE</th>
              <th>SEXO</th>
              <th>EDAD</th>
              <th>FECHA DE NACIEMIENTO</th>
              <th>ESTUDIOS A REALIZAR</th>
              <th>FECHA</th>
              <th>HORA</th>
            </tr>
          </thead>
          <tbody>
            <?php
        // 3️⃣ Mostrar los datos
        if ($result->num_rows > 0) {
            while($fila = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila["folio"] . "</td>";
                echo "<td>" . $fila["nombre_paciente"] . "</td>";
                echo "<td>" . $fila["sexo"] . "</td>";
                echo "<td>" . $fila["edad"] . "</td>";
                echo "<td>" . $fila["fecha_nac"] . "</td>";
                echo "<td>" . $fila["estudio"] . "</td>";
                echo "<td>" . $fila["fecha"] . "</td>";
                echo "<td>" . $fila["hora"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='text-align:center;'>No hay pacientes registrados.</td></tr>";
        }
        ?>
          </tbody>
          <tfoot>
            <tr>
              <th>Nombre</th>
              <th>Edad</th>
              <th>Ciudad</th>
              <th>Ocupación</th>
            </tr>
          </tfoot>
        </table>
      </div>

</div>
  </div>

  <!-- JS: jQuery + DataTables + Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.4/js/dataTables.bootstrap5.min.js"></script>

  <script>
    // Inicializar DataTable con filtros por columna
    $(document).ready(function () {
      $('#miTabla').DataTable({
        initComplete: function () {
          this.api().columns().every(function () {
            var column = this;
            var select = $('<select class="form-select form-select-sm"><option value="">Todos</option></select>')
              .appendTo($(column.footer()).empty())
              .on('change', function () {
                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                column.search(val ? '^' + val + '$' : '', true, false).draw();
              });
            column.data().unique().sort().each(function (d) {
              select.append('<option value="' + d + '">' + d + '</option>');
            });
          });
        }
        
      });
    });
  </script>

</body>
</html>





    
</body>
</html>