<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Evaluaciones Aprobadas - Postulaciones a prácticas profesionales | Administración Pública UV</title>

  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />



  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>
  <!-- APU CSS-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />



</head>
<!--/head-->

<body>
  <?php require_once("menu_coordpracticas.php"); ?>

  <div class="container-xl">
    <div class="row my-5">
      <h1 class="h1">Evaluación Postulaciones a Prácticas Profesionales</h1>

    </div>
    <?php
    if ($this->session->flashdata('mensaje')) {
    ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php
        echo $this->session->flashdata('mensaje');
        //echo '<div class="col-lg-12 col-sm-12 col-xs-12 status alert alert-'.$_POST['operacion'].'"><p class="center">'.$_POST['mensaje'].'</p></div>';
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    }
    ?>

    <h2>Evaluación Postulaciones Aprobadas</h2>
    <a class="btn btn-light-green" href="<?php echo site_url('coord/ver_postulaciones/evaluaciones') ?>">No Evaluadas</a>
    <a class="btn btn-success" href="<?php echo site_url('coord/ver_postulaciones/evaluaciones/aprobadas') ?>">Aprobadas</a>
    <a class="btn btn-danger" href="<?php echo site_url('coord/ver_postulaciones/evaluaciones/reprobadas') ?>">Reprobadas</a>



    <hr class="my-5">
    <div class="table-responsive">
      <table class="table table-hover table-bordered align-middle" id="tablacu">
        <thead class="apu-backg white-text">
          <tr>
            <th>RUN</th>
            <th scope="col">Nombre</th>
            <th scope="col">A.Paterno</th>
            <th scope="col">A.Materno</th>
            <th scope="col">Práctica</th>
            <th scope="col">Estado</th>
            <th scope="col">Evaluación</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>

    <hr class="my-5">
    <div class="row">
      <div class="form-group">
        <a href="<?php echo site_url('coordinador/Formulario_Controller/exportar_a_excel') ?>" class="btn btn-success"><span class="fa fa-file-excel-o"></span>&nbsp;Exportar postulaciones en formato EXCEL</a>
        <a href="<?= base_url() ?>coord/practicas" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
      </div>
    </div>


    <form id="form-evp" action="<?php echo site_url('coord/ver_postulaciones/evaluaciones/editar_evaluacion') ?> " method="POST">
      <input type="hidden" id="practica-id" name="practica-id" value="">
    </form>


    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/modules/wow.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        new WOW().init();
      });
    </script>


    <script>
      $(document).ready(function() {
        var table = $('#tablacu').DataTable({
          "ajax": {
            "method": "POST",
            "dataSrc": "",
            "url": "<?php echo base_url('coordinador/Formulario_Controller/ver_postulaciones_aceptadas_evaluacion_aprobadas_ajax') ?>"
          },
          "columns": [{
              "data": "run"
            },
            {
              "data": "primer_nombre"
            },
            {
              "data": "apellido_paterno"
            },
            {
              "data": "apellido_materno"
            },
            {
              "data": "ocasion"
            },
            {
              "data": "estado",
              render: function(data, type, row) {
                return "<p class='text-success font-weight-bold'>" + data + "</p>";
              }
            },
            {
              "data": "evaluacion",
              render: function(data, type, row) {
                return "<p class='text-success font-weight-bold'>" + data + "</p>";
              }
            },
            {
              "defaultContent": "<a class='descargarDoc mr-1' title='Descargar documento de postulación en formato WORD.'><i class='far fa-file-word fa-2x indigo-text'></i></a><a class='estadoAlumno mr-1' title='Ver el estado del alumno'><i class='fas fa-eye fa-2x indigo-text'></i></span></a><a class='EditarEvaluacionAlumno' title='Modificar Evaluación alumno.'><i class='fas fa-redo fa-2x indigo-text'></i></a>"
            }
          ],
          "order": [
            [1, "desc"]
          ],
          "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst": "Primero",
              "sLast": "Último",
              "sNext": "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
        
        /*
        $('#tablacu tbody').on("click", "a.descargarDoc", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var nombre_archivo = data.nombre_archivo;
          var run = data.run;
          var nombre = data.primer_nombre;
          var apellido = data.apellido_paterno;
          var apellido_materno = data.apellido_materno;
          var ocasion = data.ocasion;
          e.preventDefault();
          var customFilename = run + "-" + nombre + "." + apellido + "." + apellido_materno + "-postulacion(" + ocasion + ")"+ ".docx";
          var downloadURL = '<?php echo base_url() ?>DocumentosPracticasApu/' + run + '/' + nombre_archivo + '?x=' + Date.now();
          var downloadLink = document.createElement('a');
          downloadLink.href = downloadURL;
          downloadLink.download = customFilename; 
          downloadLink.click();
      });
        */

        $('#tablacu tbody').on("click", "a.descargarDoc", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var nombre_archivo = data.nombre_archivo;
          var run = data.run;
          var nombre = data.primer_nombre;
          var apellido = data.apellido_paterno;
          var apellido_materno = data.apellido_materno;
          var ocasion = data.ocasion;
          e.preventDefault();
          var customFilename = run + "-" + nombre + "." + apellido + "." + apellido_materno + "-postulacion(" + ocasion + ")"+ ".docx";
          var downloadURL = '<?php echo base_url() ?>DocumentosPracticasApu/' + run + '/' + nombre_archivo + '?x=' + Date.now();
          var downloadLink = document.createElement('a');
          downloadLink.href = downloadURL;
          downloadLink.download = customFilename; 
          downloadLink.click();
        });
        $('#tablacu tbody').on("click", "a.estadoAlumno", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var practica_id = data.practicaId;
          e.preventDefault();
          window.location.href = '<?php echo site_url('coord/ver_postulaciones/ver_estado') ?>/' + practica_id;
        });

        $('#tablacu tbody').on("click", "a.EditarEvaluacionAlumno", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var practica_id = data.practicaId;
          e.preventDefault();
          $('#practica-id').val(practica_id);
          $( "#form-evp" ).submit();
          //window.location.href = '<?php echo site_url('coord/ver_postulaciones/evaluaciones/editar_evaluacion') ?>/' + practica_id;
        });


      });
    </script>
</body>

</html>