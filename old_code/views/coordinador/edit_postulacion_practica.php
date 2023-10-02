<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Editar información de práctica | Administración Pública UV</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>
  <!-- APU CSS-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">
</head>
<!--/head-->

<body>
  <?php require_once("menu_coordpracticas.php"); ?>
  <?php require_once("control.php"); ?>

  <div class="container my-5">
    <div class="row">
      <div>
        <h1 class="h1">Editar información sobre práctica profesional</h1>
      </div>
    </div>
    <hr>
    <!-- <form name="practica-form" id="practica-form" method="POST" action="../logica/editar_formulario_practica.php" onsubmit="return validar()"> -->
    <?php echo form_open('practicas/Formulario_Controller/actualizar_formulario/' . $id_practica . '/' . $row_practicas_post['alumnoId'] . '/' . $row_practicas_post['supervisorId'] . '/' . $row_practicas_post['organismoId'], 'onsubmit="return validar()"'); ?>
    <!--<input type="hidden" id="sexo" name="sexo" value="<?php //echo utf8_encode($row['sexo']) 
                                                          ?>">-->

    <p class="h3">Datos del alumno</p>

    <div class="row">
      <div class="col-lg-6">
        <div class="md-form ">
          <input type="text" class="form-control " name="primer_nombre" id="primer_nombre" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" oninput="validarPrimerNombre(this)" value="<?php echo $row['primer_nombre'] ?>" required>
          <label for="primer_nombre" data-success="¡Bien!">Primer nombre</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" oninput="validarSegundoNombre(this)" value="<?php echo $row['segundo_nombre'] ?>">
          <label for="segundo_nombre" data-success="¡Bien!">Segundo nombre (Opcional)</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" oninput="validarApellidoPaterno(this)" value="<?php echo $row['apellido_paterno'] ?>" required>
          <label for="apellido_paterno" data-success="¡Bien!">Apellido paterno</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" oninput="validarApellidoMaterno(this)" value="<?php echo $row['apellido_materno'] ?>" required>
          <label for="apellido_materno" data-success="¡Bien!">Apellido materno</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="run" id="run" class="form-control" placeholder="Ingrese su run sin puntos ni guión" aria-describedby="basic-addon1" oninput="validarRut(this)" value="<?php echo $row['run'] ?>" required>
          <label class="run" data-success="¡Bien!">RUN</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-4">
        Sexo
        <div class="custom-control custom-radio">

          <input type="radio" class="custom-control-input" name="sexo" id="sexoM" value="masculino" <?php if ($row['sexo'] == utf8_decode('masculino')) { ?> checked="checked" <?php } ?>>
          <label class="custom-control-label" for="sexoM"> Masculino</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" name="sexo" id="sexoF" value="femenino" <?php if ($row['sexo'] == utf8_decode('femenino')) { ?> checked="checked" <?php } ?>>
          <label class="custom-control-label" for="sexoF"> Femenino </label>
        </div>
        <span class="help-block"></span>
      </div>
      <div class="col-lg-12">
        <div class="md-form">
          <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa celular (9 dígitos)" aria-describedby="basic-addon1" oninput="validarTelefono(this)" value="<?php echo $row['telefono'] ?>">
          <label for="telefono" data-success="¡Bien!">Teléfono (Opcional)</label><!-- pattern="\d*" maxlength="9" -->
          <span class="help-block"></span>
        </div><!-- /.col-lg-6 -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <span>
          <i title="" class="fa fa-info-circle" aria-hidden="true"></i> El campo de "Correo personal" no se habilitará hasta ingresar un correo institucional válido.
        </span> <br />
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="email" name="correo-institucional" id="correo-institucional" class="form-control" placeholder="Ingresa tu correo institucional" aria-describedby="basic-addon1" oninput="validarCorreoInstitucional(this)" value="<?php echo $row['correo_institucional'] ?>" required>
          <label for="institucional" data-success="¡Bien!">Correo institucional</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="md-form">
          <input type="email" name="correo-personal" id="correo-personal" class="form-control" placeholder="Ingresa tu correo personal" aria-describedby="basic-addon1" oninput="validarCorreoPersonal(this)" value="<?php echo $row['correo_personal'] ?>">
          <label for="correo-personal" data-success="¡Bien!">Correo personal (Opcional)</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4">
        Sede
        <select name="sede" id="sede" class="browser-default custom-select" oninput="validarSede()" required>
          <option value=""> - Seleccione sede - </option>
          <?php if ($row['sede'] == "Valparaíso") { ?>
            <option value="Valparaíso" selected>Valparaíso</option>
          <?php } else { ?> <option value="Valparaíso">Valparaíso</option> <?php } ?>
          <?php if ($row['sede'] == "Santiago") { ?>
            <option value="Santiago" selected>Santiago</option>
          <?php } else { ?> <option value="Santiago">Santiago</option> <?php } ?>
        </select>
        <span class="help-block"></span>
      </div>
      <div class="col-lg-4">
        Año de ingreso
        <select name="anio_ingreso" id="anio_ingreso" class="browser-default custom-select" oninput="validarAnhoIngreso()" required>
          <option value=""> - Seleccione año - </option>
          <?php if ($row['anio_ingreso'] == "2011") { ?>
            <option value="2011" selected>2011</option>
          <?php } else { ?> <option value="2011">2011</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2012") { ?>
            <option value="2012" selected>2012</option>
          <?php } else { ?> <option value="2012">2012</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2013") { ?>
            <option value="2013" selected>2013</option>
          <?php } else { ?> <option value="2013">2013</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2014") { ?>
            <option value="2014" selected>2014</option>
          <?php } else { ?> <option value="2014">2014</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2015") { ?>
            <option value="2015" selected>2015</option>
          <?php } else { ?> <option value="2015">2015</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2016") { ?>
            <option value="2016" selected>2016</option>
          <?php } else { ?> <option value="2016">2016</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2017") { ?>
            <option value="2017" selected>2017</option>
          <?php } else { ?> <option value="2017">2017</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2018") { ?>
            <option value="2018" selected>2018</option>
          <?php } else { ?> <option value="2018">2018</option> <?php } ?>

          <?php if ($row['anio_ingreso'] == "2019") { ?>
            <option value="2019" selected>2019</option>
          <?php } else { ?> <option value="2019">2019</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2020") { ?>
            <option value="2020" selected>2020</option>
          <?php } else { ?> <option value="2020">2020</option> <?php } ?>
          <?php if ($row['anio_ingreso'] == "2021") { ?>
            <option value="2021" selected>2021</option>
          <?php } else { ?> <option value="2021">2021</option> <?php } ?>
        </select>
        <span class="help-block"></span>
      </div>
      <div class="col-lg-4">
        Último semestre aprobado
        <select name="ultimo_sem_aprobado" id="ultimo_sem_aprobado" class="browser-default custom-select" oninput="validarUltimoSemestre()" required>
          <option value=""> - Seleccione semestre - </option>
          <?php if ($row['ultimo_sem_aprobado'] == "Primer semestre") { ?>
            <option value="Primer semestre" selected>Primer semestre</option>
          <?php } else { ?> <option value="Primer semestre">Primer semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Segundo semestre") { ?>
            <option value="Segundo semestre" selected>Segundo semestre</option>
          <?php } else { ?> <option value="Segundo semestre">Segundo semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Tercer semestre") { ?>
            <option value="Tercer semestre" selected>Tercer semestre</option>
          <?php } else { ?> <option value="Tercer semestre">Tercer semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Cuarto semestre") { ?>
            <option value="Cuarto semestre" selected>Cuarto semestre</option>
          <?php } else { ?> <option value="Cuarto semestre">Cuarto semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Quinto semestre") { ?>
            <option value="Quinto semestre" selected>Quinto semestre</option>
          <?php } else { ?> <option value="Quinto semestre">Quinto semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Sexto semestre") { ?>
            <option value="Sexto semestre" selected>Sexto semestre</option>
          <?php } else { ?> <option value="Sexto semestre">Sexto semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Séptimo semestre") { ?>
            <option value="Séptimo semestre" selected>Séptimo semestre</option>
          <?php } else { ?> <option value="Séptimo semestre">Séptimo semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Octavo semestre") { ?>
            <option value="Octavo semestre" selected>Octavo semestre</option>
          <?php } else { ?> <option value="Octavo semestre">Octavo semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Noveno semestre") { ?>
            <option value="Noveno semestre" selected>Noveno semestre</option>
          <?php } else { ?> <option value="Noveno semestre">Noveno semestre</option> <?php } ?>
          <?php if ($row['ultimo_sem_aprobado'] == "Décimo semestre") { ?>
            <option value="Décimo semestre" selected>Décimo semestre</option>
          <?php } else { ?> <option value="Décimo semestre">Décimo semestre</option> <?php } ?>
        </select>
        <span class="help-block"></span>
      </div>
    </div>
    <div class="row my-3">
      <div class="col-lg-4">
        Práctica profesional
        <span>
          <i title="No se puede seleccionar sólo homologación" class="fa fa-info-circle" aria-hidden="true"></i>
        </span>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" name="ocasion_practica" id="practica_primera" value="Primera" oninput="validarPractica()" <?php if ($row_practicas_post['ocasion'] == "Primera") { ?> checked="checked" <?php } ?> <?php if ($cantidad_practicas > 0 && $row_practicas_post['ocasion'] == "Segunda") { ?> disabled <?php } ?>>
          <label class="custom-control-label" for="practica_primera">
            Primera
          </label>
        </div>
        <div class="custom-control custom-radio">
          <input class="custom-control-input" type="radio" name="ocasion_practica" id="practica_segunda" value="Segunda" oninput="validarPractica()" <?php if ($row_practicas_post['ocasion'] == "Segunda") { ?> checked="checked" <?php } ?> <?php if ($cantidad_practicas > 0 && $row_practicas_post['ocasion'] == "Primera") { ?> disabled <?php } ?>>
          <label class="custom-control-label" for="practica_segunda">
            Segunda
          </label>
        </div>
        <div class="form-group">
          <!--<label><input type="checkbox" name="practica_primera" id="practica_primera" value="Primera" oninput="validarPractica()"> Primera</label>-->
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <!--<label><input type="checkbox" name="practica_segunda" id="practica_segunda" value="Segunda" oninput="validarPractica()"> Segunda</label>-->
        </div>
      </div>
      <div class="col-lg-4">
      </div>
      <span class="help-block"></span>
      <small id="mensaje_practica" class="form-text text-muted"></small>
    </div>
    <div class="row my-3">
      <div class="col-lg-4">
        Homologación
        <span>
          <i title="No se puede seleccionar sólo homologación" class="fa fa-info-circle" aria-hidden="true"></i>
        </span>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" name="practica_homologacion" id="practica_homologacion" value="1" <?php if ($row_practicas_post['homologacion'] == '1') { ?> checked <?php } ?>>
          <label class="custom-control-label" for="practica_homologacion"> Homologación</label>
        </div>
      </div>
      <span class="help-block"></span>
    </div>
    <legend>Datos del organismo</legend>
    <div class="row">
      <div class="col-lg-12">
        <div class="md-form">
          <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" placeholder="Ingrese nombre del organismo" aria-describedby="basic-addon1" oninput="validarNombreOrganismo(this)" value="<?php echo $row_organismo['nombre_organismo'] ?>" required>
          <label for="nombre_organismo" data-success="¡Bien!">Organismo</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="md-form">
          <input type="text" name="nombre_supervisor" id="nombre_supervisor" class="form-control" placeholder="Ingrese nombre del supervisor" aria-describedby="basic-addon1" oninput="validarNombreSupervisor(this)" value="<?php echo $row_supervisor['nombre'] ?>" required>
          <label for="nombre_supervisor" data-success="¡Bien!">Nombre supervisor</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="cargo_supervisor" id="cargo_supervisor" class="form-control" placeholder="Ingrese cargo del supervisor" aria-describedby="basic-addon1" oninput="validarCargoSupervisor(this)" value="<?php echo $row_supervisor['cargo'] ?>" required>
          <label for="cargo_supervisor" data-success="¡Bien!">Cargo supervisor</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="md-form">
          <input type="email" name="correo_supervisor" id="correo_supervisor" class="form-control" placeholder="Ingrese correo del supervisor" aria-describedby="basic-addon1" oninput="validarCorreoSupervisor(this)" value="<?php echo $row_supervisor['correo'] ?>" required>
          <label for="correo_supervisor" data-success="¡Bien!">Correo</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="division_departamento" id="division_departamento" class="form-control" placeholder="Ingrese divisón o departamento" aria-describedby="basic-addon1" oninput="validarDivisionDepartamento(this)" value="<?php echo $row_organismo['division_departamento'] ?>" required>
          <label for="division_departamento" data-success="¡Bien!">División/departamento</label>
          <span class="help-block"></span>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="seccion_unidad" id="seccion_unidad" class="form-control" placeholder="Ingrese la sección o unidad" aria-describedby="basic-addon1" oninput="validarSeccionUnidad(this)" value="<?php echo $row_organismo['seccion_unidad'] ?>" required>
          <label for="" data-success="¡Bien!">Sección/unidad</label>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="direccion_organismo" id="direccion_organismo" class="form-control" placeholder="Calle #111" aria-describedby="basic-addon1" oninput="validarDireccionOrganismo(this)" value="<?php echo $row_organismo['direccion'] ?>" required>
          <label for="direccion_organismo" data-success="¡Bien!">Dirección</label>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="md-form">
          <input type="text" name="telefono_organismo" id="telefono_organismo" class="form-control" placeholder="Escríbalo de la forma 322507191 (Prefijo y luego teléfono)" aria-describedby="basic-addon1" oninput="validarTelefonoFijo(this)" value="<?php echo $row_organismo['telefono'] ?>" required>
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
          <?php foreach ($row_region_comuna as $region) {
            if ($region_practica['nombre'] == $region['nombre']) { ?>
              <option value="<?php echo $region['id']; ?>" selected><?php echo $region['nombre']; ?></option>
            <?php   } else { ?>
              <option value="<?php echo $region['id']; ?>"><?php echo $region['nombre']; ?></option>
          <?php   }
          } ?>
        </select>
        <span class="help-block"></span>
        <!-- 
                        <input type="checkbox" name="otra-region-check" id="otra-region-check"> Otra: <input type="text" name="otra-region-text" id="otra-region-text" style="padding: 0px 0px 0px 0px;" disabled><span> 
                        <i title="Seleccionar 'Otra' en caso de que la región que desea buscar no esté en la lista (Si ingresa la región por esta opción, deberá ingresar también la comuna)."class="fa fa-info-circle fa-lg" aria-hidden="true"></i></span>
                         -->
      </div>
      <div class="col-lg-6">
        Comuna
        <select name="comuna" id="comuna" class="browser-default custom-select" oninput="validarComuna()">
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
    <legend>Jornada de práctica profesional</legend>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" aria-describedby="basic-addon1" oninput="validarFechas()" value="<?php echo $row_practicas_post['fecha_inicio'] ?>" required>
          <label for="fecha_inicio" data-success="¡Bien!">Fecha de inicio</label>
        </div>
        <span class="help-block"></span>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" aria-describedby="basic-addon1" oninput="validarFechas()" value="<?php echo $row_practicas_post['fecha_termino'] ?>" required>
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
    <div class="row">
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
            <input type="time" name="hora_lunes_manana_entrada" id="hora_lunes_manana_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_lunes['hora_manana_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_lunes_manana_salida" id="hora_lunes_manana_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_lunes['hora_manana_salida'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_lunes_tarde_entrada" id="hora_lunes_tarde_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_lunes['hora_tarde_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_lunes_tarde_salida" id="hora_lunes_tarde_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_lunes['hora_tarde_salida'], 0, 5) ?>">
          </td>
          <td>
            <span id="total_horas_lunes"></span>
          </td>
        </tr>
        <tr>
          <td>Martes</td>
          <td>
            <input type="time" name="hora_martes_manana_entrada" id="hora_martes_manana_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_martes['hora_manana_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_martes_manana_salida" id="hora_martes_manana_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_martes['hora_manana_salida'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_martes_tarde_entrada" id="hora_martes_tarde_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_martes['hora_tarde_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_martes_tarde_salida" id="hora_martes_tarde_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_martes['hora_tarde_salida'], 0, 5) ?>">
          </td>
          <td>
            <span id="total_horas_martes"></span>
          </td>
        </tr>
        <tr>
          <td>Miércoles</td>
          <td>
            <input type="time" name="hora_miercoles_manana_entrada" id="hora_miercoles_manana_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_miercoles['hora_manana_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_miercoles_manana_salida" id="hora_miercoles_manana_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_miercoles['hora_manana_salida'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_miercoles_tarde_entrada" id="hora_miercoles_tarde_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_miercoles['hora_tarde_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_miercoles_tarde_salida" id="hora_miercoles_tarde_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_miercoles['hora_tarde_salida'], 0, 5) ?>">
          </td>
          <td>
            <span id="total_horas_miercoles"></span>
          </td>
        </tr>
        <tr>
          <td>Jueves</td>
          <td>
            <input type="time" name="hora_jueves_manana_entrada" id="hora_jueves_manana_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_jueves['hora_manana_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_jueves_manana_salida" id="hora_jueves_manana_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_jueves['hora_manana_salida'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_jueves_tarde_entrada" id="hora_jueves_tarde_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_jueves['hora_tarde_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_jueves_tarde_salida" id="hora_jueves_tarde_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_jueves['hora_tarde_salida'], 0, 5) ?>">
          </td>
          <td>
            <span id="total_horas_jueves"></span>
          </td>
        </tr>
        <tr>
          <td>Viernes</td>
          <td>
            <input type="time" name="hora_viernes_manana_entrada" id="hora_viernes_manana_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_viernes['hora_manana_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_viernes_manana_salida" id="hora_viernes_manana_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_viernes['hora_manana_salida'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_viernes_tarde_entrada" id="hora_viernes_tarde_entrada" oninput="totalHorasDiarias();" value="<?php echo substr($row_viernes['hora_tarde_entrada'], 0, 5) ?>">
          </td>
          <td>
            <input type="time" name="hora_viernes_tarde_salida" id="hora_viernes_tarde_salida" oninput="totalHorasDiarias();" value="<?php echo substr($row_viernes['hora_tarde_salida'], 0, 5) ?>">
          </td>
          <td>
            <span id="total_horas_viernes"></span>
          </td>
        </tr>
        <tr>
          <td><b>Total horas semanales</b></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>
            <!--<span id="total_horas_semanales"></span>-->

            <input type="text" name="total_horas_semanales" id="total_horas_semanales" readonly>
          </td>
        </tr>
      </table>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción de las labores que realizará</label>
      <textarea class="form-control" name="descripcion" id="descripcion" rows="8" maxlength="1000" placeholder="Escriba una breve descripción sobre lo que realizará en su futura práctica... (1000 caracteres como máximo)"><?php echo $row_practicas_post['descripcion'] ?></textarea>
    </div>
    <div class="form-group ">
      <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" required="required"><span class="fa fa-envelope"></span> Enviar postulación </button>
      <a href="javascript:history.back(1)" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
    </div>
    </form>

    <!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/comboRegionComuna.js"></script> -->


    <!-- <script src="../../js/comboRegionComuna.js"></script> -->
    <script type="text/javascript">
      /* $("#region").change(function () {

id_regions = $("#region option:selected" ).val();
$.post("cargarComunas", { id_region : id_regions}, function(data){
    $("#comuna").html(data);
});
}); */


      $(document).ready(function() {
        id_region = $('#region option:selected').val();
        id_nombre_organismo = $('#nombre_organismo option:selected').val();
        run = $('#run').attr('value');
        practica_primera = $('input:checkbox[name=practica_primera]:checked').val();
        practica_segunda = $('input:checkbox[name=practica_segunda]:checked').val();
        practica_homologacion = $('input:checkbox[name=practica_homologacion]:checked').val();

        nombre_comuna = "<?php echo $comuna_practica['nombre']; ?>";
        //practica = '<?php //echo $practica; 
                      ?>';

        $.post("<?= base_url() ?>practicas/Formulario_Controller/cargarComunas", {
          id_region: id_region
        }, function(data) {
          //$("#comuna").html(data);
          $("#comuna").html("<option value='0'> - Seleccione Comuna - </option>");
          JSON.parse(data).forEach(function(comuna) {
            if (comuna.nombre === nombre_comuna) {
              $("#comuna").append("<option value='" + comuna.id + "' selected>" + comuna.nombre + "</option>");
            } else {
              $("#comuna").append("<option value='" + comuna.id + "'>" + comuna.nombre + "</option>");
            }
          });
        });

        $("#region").change(function() {
          $("#region option:selected").each(function() {
            id_region = $(this).val();
            $.post("<?= base_url() ?>practicas/Formulario_Controller/cargarComunas", {
              id_region: id_region
            }, function(data) {
              //$("#comuna").html(data);
              $("#comuna").html("<option value='0'> - Seleccione Comuna - </option>");
              JSON.parse(data).forEach(function(comuna) {
                if (comuna.nombre === nombre_comuna) {
                  $("#comuna").append("<option value='" + comuna.id + "' selected>" + comuna.nombre + "</option>");
                } else {
                  $("#comuna").append("<option value='" + comuna.id + "'>" + comuna.nombre + "</option>");
                }
              });
            });
          });
        });





      });
    </script>


    <!-- Validador propio -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_formulario_practica.js"></script>
</body>

</html>