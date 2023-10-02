<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Postulaciones a prácticas profesionales | Administración Pública UV</title>

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

  <div class="container">
    <div class="row my-5">
      <h1 class="h1">Postulaciones a Prácticas Profesionales</h1>

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



    <h2>Postulaciones <strong>Sin Acción</strong></h2>
    <a class="btn btn-light-green" href="<?php echo site_url('coord/ver_postulaciones') ?>">Sin Acción</a>
    <a class="btn btn-danger" href="<?php echo site_url('coord/ver_postulaciones/rechazadas') ?>">Rechazadas</a>

    <hr class="my-5">
    <div class="table-responsive">
      <table class="table table-hover align-middle table-bordered" id="tabla_solicitudes">
        <thead class="apu-backg white-text">
          <tr>
            <th scope="col">RUN</th>
            <th scope="col">Nombre</th>
            <th scope="col">A.Paterno</th>
            <th scope="col">A.Materno</th>
            <th scope="col">Práctica</th>
            <th scope="col">Estado</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>


    <hr class="my-5">
    <div class="row my-5">
      <div class="form-group">
        <a href="<?= base_url() ?>coord/practicas" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
      </div>
    </div>


    <div class="modal fade" id="comentario_rechazo" tabindex="-1" role="dialog" aria-labelledby="comentario_rechazo_label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-notify modal-danger" role="document">
        <div class="modal-content">

          <?php echo form_open('coordinador/Practica_Controller/rechazar_practica', 'onsubmit="return validar(this)"'); ?>
          <div class="modal-header">
            <h5 class="heading lead" id="comentario_rechazo_label">Rechazar Practica</h5>
            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="hidden_practica_id" name="hidden_practica_id" value="as">
            <div class="form-group shadow-textarea">
              <label for="descripcion_rechazo">Describa la razón del rechazo de práctica profesional:</label>
              <textarea class="form-control z-depth-1" id="descripcion_rechazo" name="descripcion_rechazo" rows="3" placeholder="Descripción"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Rechazar Práctica</button>
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>

          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="comentario_aceptada" tabindex="-1" role="dialog" aria-labelledby="comentario_aceptada_label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-notify modal-success" role="document">
        <div class="modal-content">

          <?php echo form_open('coordinador/Practica_Controller/aceptar_practica', 'onsubmit="return validar(this)"'); ?>
          <div class="modal-header">
            <h5 class="heading lead" id="comentario_aceptada_label">Aceptar Practica</h5>
            <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="hidden_practica_id_aceptada" name="hidden_practica_id_aceptada" value="as">
            <div class="form-group shadow-textarea">
              <label for="descripcion_aceptada">Describa la razón de la aceptación de práctica profesional:</label>
              <textarea class="form-control z-depth-1" id="descripcion_aceptada" name="descripcion_aceptada" rows="3" placeholder="Descripción"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Aceptar Práctica</button>
            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Cancelar</button>

          </div>
          </form>
        </div>
      </div>
    </div>







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
        var table = $('#tabla_solicitudes').DataTable({
          "ajax": {
            "method": "POST",
            "dataSrc": "",
            "url": "<?php echo base_url('coordinador/Formulario_Controller/ver_postulaciones_ajax') ?>"
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
              "data": "estado"
            },
            {
              "defaultContent": "<a class='descargarDoc' title='Descargar documento de postulación en formato WORD.'><i class='far fa-file-word fa-2x mr-3 indigo-text'></i></a><a class='aceptar-solicitud mr-1'  title='Aceptar la práctica'><span class='badge badge-success mr-2'><i class='fas fa-check fa-2x mx-1 my-1'></i></span></a><a class='rechazar-solicitud' title='Rechazar la práctica'><span class='badge badge-danger'><i class='fas fa-times fa-2x mx-2 my-1' aria-hidden='true'></i></span> </a>"
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

        $('#tabla_solicitudes tbody').on("click", "a.descargarDoc", function(e) {
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

        $('#tabla_solicitudes tbody').on("click", "a.aceptar-solicitud", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var practica_id = data.practicaId;
          e.preventDefault();
          if (confirm("¿Está seguro de aceptar ésta práctica?")) {
            //window.location.href = '<?php echo site_url('coord/ver_postulaciones/ver_estado/aceptar') ?>/' + practica_id;
            $("#comentario_aceptada").modal()
            document.getElementById("hidden_practica_id_aceptada").value = practica_id;
          }
        });

        $('#tabla_solicitudes tbody').on("click", "a.rechazar-solicitud", function(e) {
          var data = table.row($(this).parents("tr")).data();
          var practica_id = data.practicaId;
          e.preventDefault();
          if (confirm("¿Está seguro de rechazar ésta práctica?")) {
            //window.location.href = '<?php echo site_url('coord/ver_postulaciones/ver_estado/rechazar') ?>/' + practica_id;
            $("#comentario_rechazo").modal()
            document.getElementById("hidden_practica_id").value = practica_id;
          }
        });


      });
    </script>

</body>

</html>