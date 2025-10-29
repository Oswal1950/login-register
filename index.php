<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
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
        <h1>Bienvenido

        </h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabla con Filtros y Búsqueda</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/2.1.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <h2 class="mb-4 text-center">Tabla con Filtros y Búsqueda</h2>

    <div class="card shadow-sm">
      <div class="card-body">
        <table id="miTabla" class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>Nombre</th>
              <th>Edad</th>
              <th>Ciudad</th>
              <th>Ocupación</th>
            </tr>
          </thead>
          <tbody>
            <tr><td>Juan Pérez</td><td>28</td><td>Ciudad de México</td><td>Ingeniero</td></tr>
            <tr><td>María López</td><td>35</td><td>Guadalajara</td><td>Diseñadora</td></tr>
            <tr><td>Carlos Ruiz</td><td>22</td><td>Monterrey</td><td>Estudiante</td></tr>
            <tr><td>Laura Gómez</td><td>41</td><td>Puebla</td><td>Doctora</td></tr>
            <tr><td>Andrés Torres</td><td>30</td><td>Querétaro</td><td>Abogado</td></tr>
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