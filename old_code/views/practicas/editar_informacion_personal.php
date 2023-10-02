<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Editar información Personal | Administración Pública UV</title>

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
    <h1 class="h1">Editar información personal en el sistema de prácticas</h1>
    <p class="lead">
      En esta sección puedes modificar su información personal como estudiante, las cuales serán señaladas en las respectivas cartas o formularios.
    </p>
    <hr>
  </div>


  <div class="container my-5 wow fadeIn">
    <!--<form name="practica-form" id="practica-form" method="POST" action="../../logica/enviar_formulario_practica.php" onsubmit="return validar(this)">-->
    <?php echo form_open('practicas/Estudiante_Controller/actualizar_info_personal', 'onsubmit="return enviar_validar(this)"'); ?>

    <section id="datos_del_alumno" class="  wow fadeIn ">
      <p class="h3">Datos del alumno</p>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control"  aria-describedby="basic-addon1" value="<?= $estudiante['run'] ?> - <?= $estudiante['df'] ?>"  disabled>
            <label class="run" data-success="¡Bien!">RUN (No se puede Modificar)</label>
          </div>
        </div>
        <div class="col-lg-6">

        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form ">
            <input type="text" class="form-control " name="primer_nombre" id="primer_nombre" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" value="<?= $estudiante['primer_nombre'] ?>" oninput="validarPrimerNombre(this)" required>
            <label for="primer_nombre" data-success="¡Bien!">Primer nombre</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" value="<?= $estudiante['segundo_nombre'] ?>" oninput="validarSegundoNombre(this)" required>
            <label for="segundo_nombre" data-success="¡Bien!">Segundo nombre </label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese su primer apellido" aria-describedby="basic-addon1" value="<?= $estudiante['apellido_paterno'] ?>" oninput="validarApellidoPaterno(this)" required>
            <label for="apellido_paterno" data-success="¡Bien!">Apellido paterno</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" placeholder="Ingrese su segundo apellido" aria-describedby="basic-addon1" value="<?= $estudiante['apellido_materno'] ?>" oninput="validarApellidoMaterno(this)" required>
            <label for="apellido_materno" data-success="¡Bien!">Apellido materno</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Ingresa teléfono (9 dígitos)" aria-describedby="basic-addon1" value="<?= $estudiante['telefono'] ?>" oninput="validarTelefono(this)" required>
            <label for="telefono" data-success="¡Bien!">Teléfono </label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-4">
          Sexo
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="sexo" id="sexoM" value="masculino" <?php if ($estudiante['sexo'] == "masculino") { ?> checked="checked" <?php } ?>>
            <label class="custom-control-label" for="sexoM"> Masculino</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="sexo" id="sexoF" value="femenino" <?php if ($estudiante['sexo'] == "femenino") { ?> checked="checked" <?php } ?>>
            <label class="custom-control-label" for="sexoF"> Femenino </label>
          </div>
          <span class="help-block"></span>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="correo-institucional" id="correo-institucional" class="form-control" placeholder="Ingresa tu correo institucional" aria-describedby="basic-addon1" value="<?= $estudiante['correo_institucional'] ?>" oninput="validarCorreoInstitucional(this)" required>
            <label for="institucional" data-success="¡Bien!">Correo institucional</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="correo-personal" id="correo-personal" class="form-control" placeholder="Ingresa tu correo personal" aria-describedby="basic-addon1" value="<?= $estudiante['correo_personal'] ?>" >
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
            <option value="Valparaíso" <?php if ($estudiante['sede'] == "Valparaíso") { ?> selected <?php } ?>> Valparaíso</option>
            <option value="Santiago" <?php if ($estudiante['sede'] == "Santiago") { ?> selected <?php } ?>> Santiago</option>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="col-lg-4">
          Año de ingreso
          <select name="anio_ingreso" id="anio_ingreso" class="browser-default custom-select" oninput="validarAnhoIngreso()" required>
            <option value=""> - Seleccione año - </option>

            <?php
            for ($i = 20; $i >= 0; $i--) {
              if ($estudiante['anio_ingreso'] == (date("Y") - $i)) {
            ?>
                <option value="<?= date("Y") - $i ?>" selected><?= date("Y") - $i ?></option>
              <?php
              } else {
              ?>
                <option value="<?= date("Y") - $i ?>"><?= date("Y") - $i ?></option>
            <?php
              }
            }
            ?>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="col-lg-4">
          Último semestre aprobado
          <select name="ultimo_sem_aprobado" id="ultimo_sem_aprobado" class="browser-default custom-select" oninput="validarUltimoSemestre()" required>
            <option value=""> - Seleccione semestre - </option>
            <option value="Primer semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Primer semestre") { ?> selected <?php } ?>>Primer semestre</option>
            <option value="Segundo semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Segundo semestre") { ?> selected <?php } ?>>Segundo semestre</option>
            <option value="Tercer semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Tercer semestre") { ?> selected <?php } ?>>Tercer semestre</option>
            <option value="Cuarto semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Cuarto semestre") { ?> selected <?php } ?>>Cuarto semestre</option>
            <option value="Quinto semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Quinto semestre") { ?> selected <?php } ?>>Quinto semestre</option>
            <option value="Sexto semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Sexto semestre") { ?> selected <?php } ?>>Sexto semestre</option>
            <option value="Séptimo semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Séptimo semestre") { ?> selected <?php } ?>>Séptimo semestre</option>
            <option value="Octavo semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Octavo semestre") { ?> selected <?php } ?>>Octavo semestre</option>
            <option value="Noveno semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Noveno semestre") { ?> selected <?php } ?>>Noveno semestre</option>
            <option value="Décimo semestre" <?php if ($estudiante['ultimo_sem_aprobado'] == "Décimo semestre") { ?> selected <?php } ?>>Décimo semestre</option>
          </select>
          <span class="help-block"></span>
        </div>
      </div>
      <hr>

      <div class="form-group ">
        <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" required="required"><span class="fa fa-envelope"></span> Editar Información </button>
        <a href="<?= base_url('practicas/principal') ?>" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
      </div>
    </section>
    </form>
  </div>

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

  <!-- Validador propio -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_info_personal.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      new WOW().init();
      //validar();
      $("#enviar").submit(function(event) {
        if (enviar_validar()) {
          return confirm('¿Está seguro de enviar el formulario?');
        } else {
          alert("Existe uno o más campos que no se han rellenado correctamente.");
          return false;
        }
      });
    });
  </script>


</body>

</html>