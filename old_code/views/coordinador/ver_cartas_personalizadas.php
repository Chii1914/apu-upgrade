<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cartas Personalizadas | Administración Pública UV</title>

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
      <h1 class="h1">Cartas Personalizadas</h1>
    </div>
  <hr>



    <ul class="nav nav-tabs mb-5" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="cartas-personalizadas-no-vistos-tab" data-toggle="tab" href="#cartas-personalizadas-no-vistos-panel" role="tab" aria-controls="cartas-personalizadas-no-vistos-panel" aria-selected="false">Cartas No Revisadas</a>
      </li>

      <li class="nav-item">
        <a class="nav-link " id="cartas-personalizadas-tab" data-toggle="tab" href="#cartas-personalizadas-panel" role="tab" aria-controls="cartas-personalizadas-panel" aria-selected="true">Cartas Revisadas</a>
      </li>

    </ul>
    <div class="tab-content" id="">
      <div class="tab-pane fade" id="cartas-personalizadas-panel" role="tabpanel" aria-labelledby="cartas-personalizadas-tab">
        <div class="table-responsive">
          <table class="table table-hover table-bordered w-100" id="tabla_cartas_personalizadas">
            <thead class="apu-backg white-text">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">RUN</th>
                <th scope="col">Nombre</th>
                <th scope="col">A.Paterno</th>
                <th scope="col">A.Materno</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Actualización</th>
                <th scope="col">Revisado</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade show active" id="cartas-personalizadas-no-vistos-panel" role="tabpanel" aria-labelledby="cartas-personalizadas-no-vistos-tab">
        <div class="table-responsive">
          <table class="table table-hover table-bordered w-100" id="tabla_cartas_personalizadas-no-vistos">
            <thead class="apu-backg white-text">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">RUN</th>
                <th scope="col">Nombre</th>
                <th scope="col">A.Paterno</th>
                <th scope="col">A.Materno</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col">Fecha Actualización</th>
                <th scope="col">Revisado</th>
                <th scope="col">Acción</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

    </div>


    <hr class="my-5">
    <div class="form-group center">
      <a href="<?= base_url() ?>coord/practicas" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
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

  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/moment.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>

  <script>
    $(document).ready(function() {
      var table = $('#tabla_cartas_personalizadas').DataTable({
        "ajax": {
          "method": "POST",
          "dataSrc": "",
          "url": "<?php echo base_url('coordinador/CartaPersonalizada_Controller/ver_cartasPersonalizadas_ajax') ?>"
        },
        "searchCols": [
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          {
            "search": "Revisado",
            "caseInsensitive": false,
          },
          null
        ],
        "columns": [{
            "data": "id"
          },
          {
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
            "data": "fecha_creado",
            render: function(data, type, row) {
              return "Día:" + moment(data).format('YYYY/MM/DD') + "<br>Hora: " + moment(data).format('HH:mm');
            }
          },
          {
            "data": "fecha_actualizacion",
            render: function(data, type, row) {
              return "Día:" + moment(data).format('YYYY/MM/DD') + "<br>Hora: " + moment(data).format('HH:mm');
            }
          },
          {
            "data": "revisado",
            render: function(data, type, row) {
              if (data == 0) {
                return "<p class='text-danger font-weight-bold'>No revisado</p>";
              } else {
                return " <p class='text-success font-weight-bold'>Revisado</p>";
              }
            }
          },
          {
            "defaultContent": "<a class='descargarDoc mr-1' title='Descargar documento de postulación en formato WORD.'><i class='far fa-file-word fa-2x'></i></a> <a class='cambiarASinAccion' title='Volver a sin revisar'><i class='fas fa-undo fa-2x indigo-text'></i>"
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

      var table_no_vistos = $('#tabla_cartas_personalizadas-no-vistos').DataTable({
        "ajax": {
          "method": "POST",
          "dataSrc": "",
          "url": "<?php echo base_url('coordinador/CartaPersonalizada_Controller/ver_cartasPersonalizadas_ajax') ?>"
        },
        "searchCols": [
          null,
          null,
          null,
          null,
          null,
          null,
          null,
          {
            "search": "No revisado",
            "caseInsensitive": false,
          },
          null
        ],
        "columns": [{
            "data": "id"
          },
          {
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
            "data": "fecha_creado",
            render: function(data, type, row) {
              return "Día:" + moment(data).format('YYYY/MM/DD') + "<br>Hora: " + moment(data).format('HH:mm');
            }
          },
          {
            "data": "fecha_actualizacion",
            render: function(data, type, row) {
              return "Día:" + moment(data).format('YYYY/MM/DD') + "<br>Hora: " + moment(data).format('HH:mm');
            }
          },
          {
            "data": "revisado",
            render: function(data, type, row) {
              if (data == 0) {
                return "<p class='text-danger font-weight-bold'>No revisado</p>";
              } else {
                return " <p class='text-success font-weight-bold'>Revisado</p>";
              }
            }
          },
          {
            "defaultContent": "<a class='descargarDoc mr-1' title='Descargar documento de postulación en formato WORD.'><i class='far fa-file-word fa-2x'></i></a> <a class='eliminarCarta mr-1' title='Eliminar carta.'><i class='fas fa-trash fa-2x'></i></a> <a class='btn_cambiar_visto' title='Cambiar a revisado.'><i class='fas fa-check-circle fa-2x'></i></a>"
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



      $('#tabla_cartas_personalizadas tbody').on("click", "a.descargarDoc", function(e) {
        var data = table.row($(this).parents("tr")).data();
        var nombre_archivo = data.nombre_archivo;
        var run = data.run;
        var nombre = data.primer_nombre;
        var apellido = data.apellido_paterno;
        var apellido_materno = data.apellido_materno;
        e.preventDefault();
        var customFilename = run + "-" + nombre + "." + apellido + "." + apellido_materno + "-carta_personalizada.docx";
        var downloadURL = '<?php echo base_url() ?>DocumentosPracticasApu/' + run + '/' + nombre_archivo + '?x=' + Date.now();
        var downloadLink = document.createElement('a');
        downloadLink.href = downloadURL;
        downloadLink.download = customFilename; 
        downloadLink.click();
        });
     
      $('#tabla_cartas_personalizadas-no-vistos tbody').on("click", "a.descargarDoc", function(e) {
        var data = table_no_vistos.row($(this).parents("tr")).data();
        var nombre_archivo = data.nombre_archivo;
        var run = data.run;
        var nombre = data.primer_nombre;
        var apellido = data.apellido_paterno;
        var apellido_materno = data.apellido_materno;
        e.preventDefault();
        var customFilename = run + "-" + nombre + "." + apellido + "." + apellido_materno + "-carta_personalizada.docx";
        var downloadURL = '<?php echo base_url() ?>DocumentosPracticasApu/' + run + '/' + nombre_archivo + '?x=' + Date.now();
        var downloadLink = document.createElement('a');
        downloadLink.href = downloadURL;
        downloadLink.download = customFilename; 
        downloadLink.click();
        });
     
      
       var fila;
      $('#tabla_cartas_personalizadas tbody').on("click", "a.cambiarASinAccion", function(e) {
        e.preventDefault();
        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        if(confirm("Desea confirmar el revertimiento para: " + fila.find('td:eq(1)').text())){ 
            $.ajax({
            url: "<?php echo site_url('coord/ver_cartas/personalizadas/actualizar') ?>",
            method: "POST",
            data: {
              id: id,
              revisado: 0
            },
            success: function(data) {
              if (data === "1") {
                
                table.ajax.reload();
                table_no_vistos.ajax.reload();
              } else {
                console.log("Error al cambiar el revisado");
                
              }
            }

          });
            
        }
       });

      var fila;
      $(document).on("click", ".btn_cambiar_visto", function(e) {
        e.preventDefault();

        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        if (confirm("Desea confirmar la revisión para: " + fila.find('td:eq(1)').text())) {
          $.ajax({
            url: "<?php echo site_url('coord/ver_cartas/personalizadas/actualizar') ?>",
            method: "POST",
            data: {
              id: id,
              revisado: 1
            },
            success: function(data) {
              if (data === "1") {
                table.ajax.reload();
                table_no_vistos.ajax.reload();
              } else {
                console.log("nofunciono");
              }
            }

          });
        }

      });

      $(document).on("click", ".eliminarCarta", function(e) {
        e.preventDefault();

        fila = $(this).closest("tr");
        id = parseInt(fila.find('td:eq(0)').text());
        if (confirm("Desea confirmar la eliminación para: " + fila.find('td:eq(1)').text())) {
          $.ajax({
            url: "<?php echo site_url('coord/ver_cartas/personalizadas/eliminar') ?>",
            method: "POST",
            data: {
              id: id,
              revisado: 1
            },
            success: function(data) {
              if (data === "1") {
                
                table.ajax.reload();
                table_no_vistos.ajax.reload();
              } else {
                console.log("Error al eliminar");
              }
            }

          });
        }

      });


    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      new WOW().init();
    });
  </script>

</body>

</html>