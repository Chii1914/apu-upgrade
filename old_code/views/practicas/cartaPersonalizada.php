<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Carta Personalizada | Administración Pública UV</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- APU CSS-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>

</head>

<body>

  <?php require_once("menu_usuario.php"); ?>

  <div class="container my-5 wow fadeIn">
    <h1 class="h1">Carta Personalizada</h1>
    <p class="lead">
      Este tipo de carta sirve cuando el alumno <b>si sabe con exactitud</b> los datos de su futuro empleador, tales como: direccion del organismo, nombre del supervisor, correo del supervisor, etc.
    </p>
    <hr>
  </div>
  <div class="container my-5 wow fadeIn">
    <!--<form name="practica-form" id="practica-form" method="POST" action="../../logica/generar_carta_personalizada.php" enctype="multipart/form-data" onsubmit="return validar()">-->
    <?php echo form_open('practicas/CartaPersonalizada_Controller/crear', 'enctype="multipart/form-data" onsubmit="return validar()"'); ?>

    <p class="h3">Datos del organismo</p>

    <div class="form-group">
      <label for="">Organismo</label>
      <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" placeholder="Ingrese nombre del organismo" aria-describedby="basic-addon1" oninput="validarNombreOrganismo(this)" required>
      <span class="help-block"></span>
    </div>

    <div class="form-group">
      <label for="">Nombre supervisor</label>
      <input type="text" name="nombre_supervisor" id="nombre_supervisor" class="form-control" placeholder="Ingrese nombre del supervisor" aria-describedby="basic-addon1" oninput="validarNombreSupervisor(this)" required>
      <span class="help-block"></span>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="form-group">
          <label for="">Cargo supervisor</label>
          <input type="text" name="cargo_supervisor" id="cargo_supervisor" class="form-control" placeholder="Ingrese cargo del supervisor" aria-describedby="basic-addon1" oninput="validarCargoSupervisor(this)" required>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          Sexo del supervisor
          <div class="form-check">
            <input type="checkbox" name="sexo_femenino_supervisor" id="sexo_femenino_supervisor" value="Femenino" oninput="validarSexoSupervisor()">
            <label class="form-check-label" for="sexo_femenino_supervisor">
              Femenino
            </label>
          </div>
          <div class="form-check">
            <input type="checkbox" name="sexo_masculino_supervisor" id="sexo_masculino_supervisor" value="Masculino" oninput="validarSexoSupervisor()">
            <label class="form-check-label" for="sexo_masculino_supervisor">
              Masculino
            </label>
          </div>
          <span class="help-block"></span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="">División/departamento</label>
          <input type="text" name="division_departamento" id="division_departamento" class="form-control" placeholder="Ingrese divisón o departamento" aria-describedby="basic-addon1" oninput="validarDivisionDepartamento(this)" required>
          <span class="help-block"></span>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="">Sección/unidad</label>
          <input type="text" name="seccion_unidad" id="seccion_unidad" class="form-control" placeholder="Ingrese la sección o unidad" aria-describedby="basic-addon1" oninput="validarSeccionUnidad(this)" required>
          <span class="help-block"></span>
        </div>
      </div>
    </div>
    <hr class="my-5">

    <div class="form-group center">
      <button type="submit" class="btn btn-primary" name="submit" required="required"><span class="glyphicon glyphicon-download-alt"></span> Generar Carta</button>
      <a href="<?= base_url('practicas/principal') ?>" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
    </div>
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
  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_carta_personalizada.js"></script>

</body>

</html>