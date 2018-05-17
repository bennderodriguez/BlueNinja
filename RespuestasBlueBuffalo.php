<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $name = $_SESSION["name"];
} else {
    header('Location: index.html');

    exit;
}

$now = time();
if ($now > $_SESSION['expire']) {
    session_destroy();
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Encuesta | Blue Buffalo</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="favicon.ico" rel="icon">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- JQuery Export datatable csv,excel pdf -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <style>
            .navbar-default {
                background-color: #042b4e;
                border-color: #042b4e;

            }
            .navbar-default .navbar-brand {
                color: #fff;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Datos de la encuesta de preferencia Blue Buffalo</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="logout.php">Salir</a></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <table class="table table-striped" id="example" >
                <thead>
                    <tr>
                        <th>Encuestador</th>
                        <th>Mascota</th>
                        <th>Nombre de la Mascota</th>
                        <th>Tamaño</th>
                        <th>Edad</th>
                        <th>Meses / Años</th>
                        <th>Nombre del padre</th>
                        <th>Email</th>
                        <th>Latitud</th>
                        <th>longitud</th>
                        <th>Alimento que come la mascota</th>
                        <th>Eleccion del dueño</th>
                        <th>Fecha de la encuesta</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Encuestador</th>
                        <th>Mascota</th>
                        <th>Nombre de la Mascota</th>
                        <th>Tamaño</th>
                        <th>Edad</th>
                        <th>Meses / Años</th>
                        <th>Nombre del padre</th>
                        <th>Email</th>
                        <th>Latitud</th>
                        <th>longitud</th>
                        <th>Alimento que come la mascota</th>
                        <th>Eleccion del dueño</th>
                        <th>Fecha de la encuesta</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- JQuery Export datatable csv,excel pdf -->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#example').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'excelHtml5'
                    ],
                    "ajax": "data.json",
                    "columns": [
                        {"data": "Encuestador"},
                        {"data": "Mascota"},
                        {"data": "nombre_mascota"},
                        {"data": "tamano"},
                        {"data": "edad_numero"},
                        {"data": "edad_mm_yy"},
                        {"data": "nombre_padre"},
                        {"data": "email"},
                        {"data": "lat"},
                        {"data": "lon"},
                        {"data": "marca"},
                        {"data": "clienteSelecciono"},
                        {"data": "date"}
                    ]
                });
            });
        </script>
    </body>
</html>