<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Registrar Cuenta | Administración Pública UV</title>

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

  <?php require_once("menu_practica.php"); ?>

  <div class="container my-5 wow fadeIn">
    <h1 class="h1">Registro sistema de prácticas</h1>
    <p class="lead">
      Este formulario se puede enviar una sola vez. En el caso de cometer un error en los datos personales, se debe modificar una vez iniciado sesion, en la sección de "Modificar Info. Personal", sino dirigirse a la oficina del coordinador(a) de prácticas. Considere que como ingrese sus datos en éste formulario, será como se muestren en sus respectivas cartas.
    </p>
    <hr>
  </div>


  <div class="container my-5 wow fadeIn">
    <!--<form name="practica-form" id="practica-form" method="POST" action="../../logica/enviar_formulario_practica.php" onsubmit="return validar(this)">-->
    <?php echo form_open('practicas/Estudiante_Controller/registrar_estudiante', 'onsubmit="return validar(this)"'); ?>

    <section id="datos_del_alumno" class="  wow fadeIn ">
      <p class="h3">Datos del alumno</p>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form ">
            <input type="text" class="form-control " name="primer_nombre" id="primer_nombre" maxlength="55" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" oninput="validarPrimerNombre(this)" required>
            <label for="primer_nombre" data-success="¡Bien!">Primer nombre</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="segundo_nombre" id="segundo_nombre" maxlength="55" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" oninput="validarSegundoNombre(this)">
            <label for="segundo_nombre" data-success="¡Bien!">Segundo nombre</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" maxlength="55" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" oninput="validarApellidoPaterno(this)" required>
            <label for="apellido_paterno" data-success="¡Bien!">Apellido paterno</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" maxlength="55" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" oninput="validarApellidoMaterno(this)" required>
            <label for="apellido_materno" data-success="¡Bien!">Apellido materno</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="run" id="run" class="form-control" maxlength="9" placeholder="Ingrese su run sin puntos ni guión" aria-describedby="basic-addon1" oninput="validarRut()" autocomplete="off" required>
            <label class="run" data-success="¡Bien!">RUN</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="df" id="df" class="form-control w-25" maxlength="1" placeholder="Dígito verificador" aria-describedby="basic-addon1" oninput="validarRut()" required>
            <label for="df" data-success="¡Bien!">Dígito Verificador</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="telefono" id="telefono" class="form-control" maxlength="20" placeholder="Ingresa celular (9 dígitos)" aria-describedby="basic-addon1" oninput="validarTelefono(this)">
            <label for="telefono" data-success="¡Bien!">Teléfono Contacto</label><!-- pattern="\d*" maxlength="9" -->
            <span class="help-block"></span>
          </div><!-- /.col-lg-6 -->
        </div>
        <div class="col-lg-4">
          Sexo
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="sexo" id="sexoM" value="masculino" checked="checked">
            <label class="custom-control-label" for="sexoM"> Masculino</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" name="sexo" id="sexoF" value="femenino">
            <label class="custom-control-label" for="sexoF"> Femenino </label>
          </div>
          <span class="help-block"></span>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <div class="md-form">
            <input type="text" name="correo-institucional" id="correo-institucional" class="form-control" maxlength="55" placeholder="Ingresa tu correo institucional" aria-describedby="basic-addon1" oninput="validarCorreoInstitucional(this)" required>
            <label for="institucional" data-success="¡Bien!">Correo institucional</label>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="md-form">
            <input type="email" name="correo-personal" id="correo-personal" class="form-control" placeholder="Ingresa tu correo personal" aria-describedby="basic-addon1" oninput="" >
            <label for="correo-personal" data-success="¡Bien!">Correo personal (Opcional)</label>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row mb-5">
        <div class="col-lg-4">
          Sede
          <select name="sede" id="sede" class="browser-default custom-select" oninput="validarSede()" required>
            <option value=""> - Seleccione sede - </option>
            <option value="Valparaíso"> Valparaíso</option>
            <option value="Santiago"> Santiago</option>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="col-lg-4">
          Año de ingreso
          <select name="anio_ingreso" id="anio_ingreso" class="browser-default custom-select" oninput="validarAnhoIngreso()" required>
            <option value=""> - Seleccione año - </option>

            <?php
            // empieza desde el 2003
            for ($i = 15; $i >= 0; $i--) {
            ?>
              <option value="<?= date("Y") - $i?>"><?= date("Y") - $i ?></option>
            <?php
            }
            ?>
          </select>
          <span class="help-block"></span>
        </div>
        <div class="col-lg-4">
          Último semestre aprobado
          <select name="ultimo_sem_aprobado" id="ultimo_sem_aprobado" class="browser-default custom-select" oninput="validarUltimoSemestre()" required>
            <option value=""> - Seleccione semestre - </option>
            <option value="Primer semestre">Primer semestre</option>
            <option value="Segundo semestre">Segundo semestre</option>
            <option value="Tercer semestre">Tercero semestre</option>
            <option value="Cuarto semestre">Cuarto semestre</option>
            <option value="Quinto semestre">Quinto semestre</option>
            <option value="Sexto semestre">Sexto semestre</option>
            <option value="Séptimo semestre">Séptimo semestre</option>
            <option value="Octavo semestre">Octavo semestre</option>
            <option value="Noveno semestre">Noveno semestre</option>
            <option value="Décimo semestre">Décimo semestre</option>
          </select>
          <span class="help-block"></span>
        </div>
      </div>
      <hr>

      <div class="form-group mt-5">
        <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" required="required" ><span class="fa fa-envelope" ></span> Registrarse </button>

        
        <a href="<?= base_url('practicas') ?>" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
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
  <script type="text/javascript">
    $(document).ready(function() {
      new WOW().init();
    });
  </script>

  <!-- Validador propio -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_registro.js"></script>

</body>

</html>