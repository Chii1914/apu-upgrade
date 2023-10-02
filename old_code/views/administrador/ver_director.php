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
      <h1 class="h1">Firmas</h1>

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


    <h2>Editar Firmas</h2>

    <hr>
    <div class="table-responsive">
      <table class="table table-hover align-middle table-bordered">
        <thead>
          <tr>
            <th scope="col">nombre firmante</th>
            <th scope="col">vocativo</th>
            <th scope="col">firma secundaria</th>
            <th scope="col">sede</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($firmas as $director) { ?>
            <tr>
              <td><?= $director['nombre_firmante'] ?></td>
              <td><?= $director['vocativo'] ?></td>
              <td><?= $director['firma_sec'] ?></td>
              <td><?= $director['sede'] ?></td>
              <td>
                <a href="<?= base_url("administrador/editar_director") . "/" . $director['id'] ?>" class="btn btn-elegant btn-sm">Editar</button>
                
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    
     



    <div class="row">
      <div class="form-group">
        <a href="<?= base_url("administrador/inicio") ?>" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
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
    function confirmarReseteo(idCoordinador){
      if (confirm('¿Está seguro de que desea resetear la contraseña para este coordinador(a)?')) {
        window.location.href = "<?= base_url("administrador/editar_coordinador/resetear_contrasena") . "/" ?>"  +idCoordinador;
      }
    }
      $(document).ready(function() {
        new WOW().init();
      });
    </script>
</body>

</html>