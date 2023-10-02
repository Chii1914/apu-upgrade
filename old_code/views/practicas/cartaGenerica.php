<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Carta Genérica | Administración Pública UV</title>

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
    <h1 class="font-weight-bold">Carta Genérica</a></h1>
    <p class="lead">
      Este tipo de carta sirve cuando el alumno <b>no sabe con exactitud</b> ciertos datos de su futuro empleador, por ejemplo: la dirección del organismo, el nombre supervisor que tendrá, etc.
    </p>
    <hr>
  </div>

  <div class="container my-5 wow fadeIn">
    <!--<form name="practica-form" method="POST" action="../../logica/generar_carta_generica.php" enctype="multipart/form-data" onsubmit="return validar()">-->
    <?php echo form_open('practicas/CartaGenericaController/crear', 'enctype="multipart/form-data" onsubmit="return validar()"'); ?>
    <fieldset>
      <p class="h3">Datos del alumno</p>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="primer_nombre" class="font-weight-bold">Primer nombre</label>
            <input type="text" class="form-control " name="primer_nombre" id="primer_nombre" placeholder="Ingrese su primer nombre" aria-describedby="basic-addon1" oninput="validarPrimerNombre(this)" onkeyup="this.value = this.value.toUpperCase();" required>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="" class="font-weight-bold">Segundo nombre (Opcional)</label>
            <input type="text" class="form-control " name="segundo_nombre" id="segundo_nombre" placeholder="Ingrese su segundo nombre" aria-describedby="basic-addon1" oninput="validarSegundoNombre(this)">
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="" class="font-weight-bold">Apellido paterno</label>
            <input type="text" class="form-control " name="apellido_paterno" id="apellido_paterno" placeholder="Ingrese su apellido paterno" aria-describedby="basic-addon1" oninput="validarApellidoPaterno(this)" required>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="" class="font-weight-bold">Apellido materno</label>
            <input type="text" class="form-control " name="apellido_materno" id="apellido_materno" placeholder="Ingrese su apellido materno" aria-describedby="basic-addon1" oninput="validarApellidoMaterno(this)" required>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="run" class="font-weight-bold">RUN</label>
            <input type="text" name="run" id="run" class="form-control" placeholder="Ingrese su run sin puntos ni guión" aria-describedby="basic-addon1" oninput="validarRut(this)" required>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="form-group">
            <b>Sede</b><br />
            <select name="sede" id="sede" class="form-control" required>
              <option value=""> - Seleccione sede - </option>
              <option value="Valparaíso"> Valparaíso</option>
              <option value="Santiago"> Santiago</option>
            </select>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            Último semestre aprobado
            <select name="ultimo_sem_aprobado" id="ultimo_sem_aprobado" class="form-control" required>
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
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
            Sexo del alumno
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="sexo_femenino" id="sexo_femenino" value="Femenino" oninput="validarSexo()">
              <label class="form-check-label" for="sexo_femenino">
                Femenino
              </label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" name="sexo_masculino" id="sexo_masculino" value="Masculino" oninput="validarSexo()">
              <label class="form-check-label" for="sexo_masculino">
                Masculino
              </label>

            </div>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
    </fieldset>
    <!--
            <fieldset>
                <legend><b>Datos del organismo</b></legend>
                <div class="single-profile-top left">
                -->
    <!--
                    <div class="form-group">
                        <b>Organismo</b><br />
                        <select name="nombre_organismo_id" id="nombre_organismo_id" class="form-control" required>
                            <option value="0"> - Seleccione organismo - </option>
                            <?php //while($row_organismo = $result_organismo->fetch_assoc()){
                            ?>
                                <option value="<?php //echo $row_organismo['id_organismo']; 
                                                ?>"><?php //echo utf8_encode($row_organismo['nombre_organismo']); 
                                                                                                ?></option>
                            <?php //} 
                            ?>
                        </select>
                    </div>
                    -->
    <!--
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1"><b>Organismo</b></span>
                            <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" placeholder="Ingrese nombre del organismo" aria-describedby="basic-addon1" oninput="validarNombreOrganismo(this)" required>
                        </div>
                        <span class="help-block"></span>
                    </div>
                    
                </div>
            </fieldset>
            -->
    <fieldset>
      <legend><b>Correo para Notificación</b></legend>
      <div class="single-profile-top left">
        <div class="row">
          <div class="col-lg-12">
            <div class="form-group">
              <label for="" class="font-weight-bold">Correo Institucional </label>
              <input type="text" name="correo_estudiante" id="correo_estudiante" class="form-control" placeholder="Correo Estudiante" aria-describedby="basic-addon1" oninput="validarCorreoInstitucional(this)" required>
              <span class="help-block"></span>
            </div>
          </div>
        </div>
      </div>
    </fieldset>


    <div class="form-group center">
      <button type="submit" class="btn btn-primary" name="submit" required="required"><span class="glyphicon glyphicon-download-alt"></span> Generar Carta</button>
      <a href="javascript:history.back(1)" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
    </div>
    </form>
  </div>
  <!--/#formulario-->

  <?php require_once("footer.php"); ?>

  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>

  <!-- Validador propio -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_carta_generica.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>js/modules/wow.js"></script>
  <script>
    new WOW().init();
  </script>



</body>

</html>