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
<?php require_once("menu_admpracticas.php"); ?>

  <div class="container">
    <div class="row my-5">
      <h1 class="h1">Coordinadores</h1>

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

    <div class="card justify-content-md-center">
      <div class="card-header apu-navbar text-white">
      Editar Coordinador
      </div>

      <div class="card-body ">
        <h5 class="card-title"></h5>
        <p class="card-text">En esta sección puede modificar la información del perfil de los coordinadores vigentes.</p>

        <?php echo form_open('coordinador/Coordinadores_Controller/actualizar_coordinador/' . $coordinador['id'], 'enctype="multipart/form-data" onsubmit="" class="" '); ?>
        <div class="row  ">
          <div class="col-12 col-sm-12 col-md-12 col-lg-6">
            <div class="form-group">
              <label for="coord_usuario">Usuario</label>
              <input type="text" id="coord_usuario" name="coord_usuario" class="form-control" value="<?= $coordinador['usuario'] ?>">
            </div>
            <div class="form-group">
              <label for="coord_nombre">Nombre</label>
              <input type="text" id="coord_nombre" name="coord_nombre" class="form-control" value="<?= $coordinador['nombre'] ?>">
            </div>
            <div class="form-group">
              <label for="coord_apellido">Apellido</label>
              <input type="text" id="coord_apellido" name="coord_apellido" class="form-control" value="<?= $coordinador['apellido'] ?>">
            </div>
            <div class="form-group">
              <label for="coord_correo">Correo</label>
              <input type="text" id="coord_correo" name="coord_correo" class="form-control" value="<?= $coordinador['correo'] ?>">
            </div>

            Sede
            <select class="browser-default custom-select mt-2" id="coord_sede" name="coord_sede">
              <option value="Valparaíso" <?php echo ($coordinador['sede'] == "Valparaíso") ? "selected" : ""; ?>>Valparaíso</option>
              <option value="Santiago" <?php echo ($coordinador['sede'] == "Santiago") ? "selected" : ""; ?>>Santiago</option>
            </select>
            <div class="form-group mt-5">
              <button type="submit" class="btn btn-primary" name="submit" required="required"><span class="glyphicon glyphicon-download-alt"></span>Editar Coordinador</button>
              <a href="<?= base_url() ?>administrador/ver_coordinadores" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
            </div>
          </div>
        </div>
        </form>
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


    <script type="text/javascript">
      $(document).ready(function() {
        new WOW().init();
      });
    </script>
</body>

</html>