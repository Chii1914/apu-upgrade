<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Formulario | Administración Pública UV</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- APU-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>

</head>

<body>

  <?php require_once("menu_usuario.php"); ?>

  <div class="container my-5 wow fadeIn">
    <h1 class="h1">Formulario para postulación a práctica profesional</h1>
    <p class="lead">
      Este formulario se puede enviar una sola vez. En el caso de cometer un error en los datos o querer revisarlo, se debe dirigir a la oficina del coordinador de prácticas.
    </p>
    <hr>
  </div>


  <div class="container my-5 wow fadeIn">
    <!--<form name="practica-form" id="practica-form" method="POST" action="../../logica/enviar_formulario_practica.php" onsubmit="return validar(this)">-->
    <?php echo form_open('practicas/Formulario_Controller/crear', 'onsubmit="return validar(this)"  '); ?>

    <section id="datos_del_alumno" class="  wow fadeIn ">
      <p class="h3">Homologación</p>
      <input type="hidden" id="ocasion_practica" name="ocasion_practica" value="<?= $ocasion ?>">
      <div class="row my-3">

        <div class="col-lg-12">
          Seleccione la opción de Homologación, si se encuentra en este momento solicitando una homologación de su práctica profesional.
          <div class="custom-control custom-checkbox mt-3">
            <input type="checkbox" class="custom-control-input" name="practica_homologacion" id="practica_homologacion" value="1">
            <label class="custom-control-label" for="practica_homologacion"> Homologación</label>
          </div>
        </div>
        <span class="help-block"></span>
      </div>
    </section>
    <hr class="my-4">
    <section id="datos_del_organismo" class="  wow fadeIn ">
      <p class="h3">Datos del organismo</p>
      <div class="row">
        <div class="col-lg-12">
          <div class="md-form">
            <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" maxlength="100" placeholder="Ingrese nombre del organismo" aria-describedby="basic-addon1" oninput="validarNombreOrganismo(this)" required>
            <label for="nombre_organismo" data-success="¡Bien!">Organismo</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="md-form">
            <input type="text" name="nombre_supervisor" id="nombre_supervisor" class="form-control" maxlength="100" placeholder="Ingrese nombre del supervisor" aria-describedby="basic-addon1" oninput="validarNombreSupervisor(this)" required>
            <label for="nombre_supervisor" data-success="¡Bien!">Nombre supervisor</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="cargo_supervisor" id="cargo_supervisor" class="form-control" maxlength="100" placeholder="Ingrese cargo del supervisor" aria-describedby="basic-addon1" oninput="validarCargoSupervisor(this)" required>
            <label for="cargo_supervisor" data-success="¡Bien!">Cargo supervisor</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="correo_supervisor" id="correo_supervisor" class="form-control" maxlength="100" placeholder="Ingrese correo del supervisor" aria-describedby="basic-addon1" oninput="validarCorreoSupervisor(this)" required>
            <label for="correo_supervisor" data-success="¡Bien!">Correo</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="division_departamento" id="division_departamento" class="form-control" maxlength="100" placeholder="Ingrese divisón o departamento" aria-describedby="basic-addon1" oninput="validarDivisionDepartamento(this)" required>
            <label for="division_departamento" data-success="¡Bien!">División/departamento</label>
            <span class="help-block"></span>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="seccion_unidad" id="seccion_unidad" class="form-control" maxlength="100" placeholder="Ingrese la sección o unidad" aria-describedby="basic-addon1" oninput="validarSeccionUnidad(this)" required>
            <label for="" data-success="¡Bien!">Sección/unidad</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="direccion_organismo" id="direccion_organismo" class="form-control" maxlength="100" placeholder="Calle #111" aria-describedby="basic-addon1" oninput="validarDireccionOrganismo(this)" required>
            <label for="direccion_organismo" data-success="¡Bien!">Dirección</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="telefono_organismo" id="telefono_organismo" class="form-control" maxlength="20" placeholder="Escríbalo de la forma 322507191 (Prefijo y luego teléfono)" aria-describedby="basic-addon1" oninput="validarTelefonoFijo(this)" required>
            <label for="telefono_organismo" data-success="¡Bien!">Teléfono</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          Región
          <select name="region" id="region" class="browser-default custom-select" oninput="validarRegion()" required>
            <option value="0"> - Seleccione región - </option>
            <?php foreach ($regiones as $region) { ?>
              <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre']; ?></option>
            <?php } ?>
          </select>
          <span class="help-block"></span>
          <!-- 
                        <input type="checkbox" name="otra-region-check" id="otra-region-check"> Otra: <input type="text" name="otra-region-text" id="otra-region-text" style="padding: 0px 0px 0px 0px;" disabled><span> 
                        <i title="Seleccionar 'Otra' en caso de que la región que desea buscar no esté en la lista (Si ingresa la región por esta opción, deberá ingresar también la comuna)."class="fa fa-info-circle fa-lg" aria-hidden="true"></i></span>
                        -->
        </div>
        <div class="col-lg-6">
          Comuna
          <select name="comuna" id="comuna" class="browser-default custom-select" oninput="validarComuna()" required>
            <option value='0'> - Seleccione Comuna - </option>
          </select>
          <span class="help-block"></span>
          <!-- <input type="checkbox" name="otra-comuna-check" id="otra-comuna-check">  -->
          <!-- 
                        Otra: <input type="text" name="otra-comuna-text" id="otra-comuna-text" style="padding: 0px 0px 0px 0px;" disabled><span> 
                        <i title="Seleccionar 'Otra' en caso de que la comuna que desea buscar no esté en la lista (Si ingresa la comuna por esta opción, deberá ingresar también la región)."class="fa fa-info-circle fa-lg" aria-hidden="true"></i></span>
                        -->
        </div>
      </div>
    </section>
    <hr class="my-5">
    <section id="jornada_de_practica" class="  wow fadeIn ">
      <p class="h3">Jornada de práctica profesional</p>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" aria-describedby="basic-addon1" oninput="validarFechas()" required>
            <label for="fecha_inicio" data-success="¡Bien!">Fecha de inicio</label>
          </div>
          <span class="help-block"></span>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" aria-describedby="basic-addon1" oninput="validarFechas()" required>
            <label for="fecha_termino" data-success="¡Bien!">Fecha de término</label>
          </div>
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-lg-12">
          <span>
            <i title="" class="fa fa-info-circle" aria-hidden="true"></i> El ingreso del horario debe tener un formato de 24 horas. Por ejemplo, las doce del día se ingresa como 12:00 y las doce de la noche se ingresa como 00:00.
          </span>
        </div>
      </div>
      <div class="row table-responsive text-nowrap">
        <table class="table">
          <tr>
            <th rowspan="2">Jornada</th>
            <th colspan="2">Mañana</th>
            <th colspan="2">Tarde</th>
            <th rowspan="2">Total horas diarias</th>
          </tr>
          <tr>
            <td>Entrada</td>
            <td>Salida</td>
            <td>Entrada</td>
            <td>Salida</td>
          </tr>
          <tr>
            <td>Lunes</td>
            <td>
              <input type="time" name="hora_lunes_manana_entrada" id="hora_lunes_manana_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_lunes_manana_salida" id="hora_lunes_manana_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_lunes_tarde_entrada" id="hora_lunes_tarde_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_lunes_tarde_salida" id="hora_lunes_tarde_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <span id="total_horas_lunes"></span>
            </td>
          </tr>
          <tr>
            <td>Martes</td>
            <td>
              <input type="time" name="hora_martes_manana_entrada" id="hora_martes_manana_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_martes_manana_salida" id="hora_martes_manana_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_martes_tarde_entrada" id="hora_martes_tarde_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_martes_tarde_salida" id="hora_martes_tarde_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <span id="total_horas_martes"></span>
            </td>
          </tr>
          <tr>
            <td>Miércoles</td>
            <td>
              <input type="time" name="hora_miercoles_manana_entrada" id="hora_miercoles_manana_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_miercoles_manana_salida" id="hora_miercoles_manana_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_miercoles_tarde_entrada" id="hora_miercoles_tarde_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_miercoles_tarde_salida" id="hora_miercoles_tarde_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <span id="total_horas_miercoles"></span>
            </td>
          </tr>
          <tr>
            <td>Jueves</td>
            <td>
              <input type="time" name="hora_jueves_manana_entrada" id="hora_jueves_manana_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_jueves_manana_salida" id="hora_jueves_manana_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_jueves_tarde_entrada" id="hora_jueves_tarde_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_jueves_tarde_salida" id="hora_jueves_tarde_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <span id="total_horas_jueves"></span>
            </td>
          </tr>
          <tr>
            <td>Viernes</td>
            <td>
              <input type="time" name="hora_viernes_manana_entrada" id="hora_viernes_manana_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_viernes_manana_salida" id="hora_viernes_manana_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_viernes_tarde_entrada" id="hora_viernes_tarde_entrada" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <input type="time" name="hora_viernes_tarde_salida" id="hora_viernes_tarde_salida" oninput="totalHorasDiarias();" value="00:00">
            </td>
            <td>
              <span id="total_horas_viernes"></span>
            </td>
          </tr>
          <tr>
            <td>Total horas semanales</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <!--<span id="total_horas_semanales"></span>-->
              <input type="text" id="total_horas_semanales" name="total_horas_semanales" readonly>
            </td>
          </tr>
        </table>
      </div>
    </section>
    <div class="form-group">
      <label for="descripcion">Descripción de las labores que realizará</label> <span id="charNum" class="badge badge-pill badge-default">0 caracteres de 900</span>
      <textarea class="form-control" name="descripcion" id="descripcion" rows="8" maxlength="900" onkeyup="countChars(this);" oninput="validarDescripcion(this);" placeholder="Escriba una breve descripción sobre lo que realizará en su futura práctica... (900 caracteres como máximo)" required></textarea>
      <span class="help-block"></span>
    </div>
    <div class="form-group mt-5 pt-5 ">
      <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" required="required"><span class="fa fa-envelope"></span> Enviar postulación </button>
      <a href="<?= base_url('practicas/principal') ?>" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
    </div>
    </form>
  </div>
  <!--/#formulario-->


  <?php require_once("footer.php"); ?>

  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/modules/wow.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      new WOW().init();
    });
  </script>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/moment.js"></script>

  <!-- Validador propio -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_formulario_practica.js"></script>


  <script type="text/javascript">
    function countChars(obj) {
      var maxLength = 900;
      var strLength = obj.value.length;

      if (strLength > maxLength) {
        document.getElementById("charNum").innerHTML = strLength + ' de ' + maxLength + ' caracteres';
      } else {
        document.getElementById("charNum").innerHTML = strLength + ' de ' + maxLength + ' caracteres';
      }
    }

    $(document).ready(function() {
      $("#region").change(function() {
        $("#region option:selected").each(function() {
          id_region = $(this).val();
          $.post("<?= base_url() ?>practicas/Formulario_Controller/cargarComunas", {
            id_region: id_region
          }, function(data) {
            //$("#comuna").html(data);
            $("#comuna").html("<option value='0'> - Seleccione Comuna - </option>");
            JSON.parse(data).forEach(function(comuna) {
              $("#comuna").append("<option value='" + comuna.id + "'>" + comuna.nombre + "</option>");

            });
          });
        });
      });

      $("#region option:selected").each(function() {
        if ($(this).val() != 0) {
          id_region = $(this).val();
          $.post("<?= base_url() ?>practicas/Formulario_Controller/cargarComunas", {
            id_region: id_region
          }, function(data) {
            //$("#comuna").html(data);
            $("#comuna").html("<option value='0'> - Seleccione Comuna - </option>");
            JSON.parse(data).forEach(function(comuna) {
              $("#comuna").append("<option value='" + comuna.id + "'>" + comuna.nombre + "</option>");

            });
          });

        }

      });


      $("input").keydown(function(e) {
        // Capturamos qué telca ha sido
        var keyCode = e.which;
        // Si la tecla es el Intro/Enter
        if (keyCode == 13) {
          // Evitamos que se ejecute eventos
          event.preventDefault();
          // Devolvemos falso
          return false;
        }
      });

      /*$("#btnFetch").click(function() {
        // disable button
        $(this).prop("disabled", true);
        // add spinner to button
        $(this).html(
          `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`
        );
      });*/





    });
  </script>


</body>

</html>