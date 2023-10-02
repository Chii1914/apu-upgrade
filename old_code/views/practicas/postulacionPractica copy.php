<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Practicas - Postulación a practicas profesionales | Administración Pública UV</title>

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

  <div class="container mt-5 my-5 text-center wow fadeIn ">

    <h1 class="mt-3 font-weight-bold text-center">Postulación a prácticas profesionales</h1>
    <?php
    if ($this->session->flashdata('error')) {
    ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php
        echo $this->session->flashdata('error');
        //echo '<div class="col-lg-12 col-sm-12 col-xs-12 status alert alert-'.$_POST['operacion'].'"><p class="center">'.$_POST['mensaje'].'</p></div>';
        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php
    } else if ($this->session->flashdata('mensaje')) {
    ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
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
    <img src="<?php echo base_url(); ?>imagenes/logo_sis_practicas.png" alt="" class="img-fluid my-2" style="max-height:120px;">
  </div>

  <div class="container my-5 wow fadeIn">
    <div class="row justify-content-md-center my-5 ">
      <div class="col-lg-6 col-sm-6 col-xs-12 ">
        <p class="lead text-justify">
          A continuación, podrás elegir dos opciones para llevar a cabo la postulación de práctica profesional.
          Puedes solicitar una carta de recomendación para llevarla a tu futuro empleador o rellenar el formulario para que el coordinador de prácticas
          te ayude en este proceso.
        </p>
        <div class="row mx-3 my-2 ">
          <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/carta_generica') ?>" onclick='return loaderWait()'>Carta Genérica <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cg ?> </span></a>
        </div>
        <div class="row justify-content-center">
          <div id="load-carta-genericaa" class="spinner-border text-info d-none" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </div>
        <div class="row mx-3 my-2">
          <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/carta_personalizada') ?>">Carta Personalizada <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cp ?></span></a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row mx-3 my-3">
          <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
          <a class="btn btn-lg col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?>btn-light disabled <?php } else { ?> btn-default<?php } ?> " href="<?php echo base_url('practicas/formulario/primera') ?>"><i class="glyphicon glyphicon-pencil"></i> Formulario Primera Práctica<span class="badge badge-light"><?= $cnt_forms_primera ?></span></a>
        </div>


        <div class="row mx-3 my-3">
          <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
          <a class="btn btn-lg col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?>btn-light  disabled <?php } else { ?> btn-default <?php } ?> " href="<?php echo base_url('practicas/formulario/segunda') ?>"><i class="glyphicon glyphicon-pencil"></i> Formulario Segunda Práctica<span class="badge badge-light"><?= $cnt_forms_segunda ?></span></a>
        </div>

        1ra Practicas Aceptada Sin acción: <?= $cnt_PASa ?><br>
        1ra Practicas Aceptada Aprobadas: <?= $cnt_PAA ?><br>
        1ra Practicas Sin Acción: <?= $cnt_PSa ?><br>
        1ra Practicas Aceptadas Reprobadas: <?= $cnt_PAR ?><br>
        1ra Practicas Rechazadas: <?= $cnt_PR ?><br>
        <?= "<br>" ?>
        2da Practicas Aceptada Sin Acción: <?= $cnt_SASa ?><br>
        2da Practicas Aceptada Aprobadas: <?= $cnt_SAA ?><br>
        2da Practicas Sin Acción: <?= $cnt_SSa ?><br>
        2da Practicas Aceptadas Reprobadas: <?= $cnt_SAR ?><br>
        2da Practicas Rechazadas: <?= $cnt_SR ?><br>

      </div>
    </div>
    <!--/.row-->

    <div class="row">
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Carta Genérica</h5>
            <p class="card-text">Se generará automáticamente su Carta genérica. Considere que ésta reemplazará a la más reciente que haya solicitado.</p>
            <div class="d-flex justify-content-center">
              <div id="load-carta-generica" class="spinner-border text-info d-none" role="status">
                <span class="sr-only">Cargando...</span>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a class="btn btn-default col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/carta_generica') ?>" onclick='return loaderWait()'>Generar <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cg ?> </span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Carta Personalizada</h5>
            <p class="card-text"></p>
          </div>
          <div class="card-footer">
            <a class="btn btn-default  col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/carta_personalizada') ?>">Solicitar <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cp ?></span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Postulación Primera Práctica</h5>
            <p class="card-text"></p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <div class="card-footer">
            <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
            <a class="btn col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?>btn-light disabled <?php } else { ?> btn-default<?php } ?> " href="<?php echo base_url('practicas/formulario/primera') ?>"><i class="glyphicon glyphicon-pencil"></i> Postular <span class="badge badge-light"><?= $cnt_forms_primera ?></span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Postulación Segunda Práctica</h5>
            <p class="card-text"></p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
          <div class="card-footer">
            <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
            <a class="btn col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?>btn-light  disabled <?php } else { ?> btn-default <?php } ?> " href="<?php echo base_url('practicas/formulario/segunda') ?>"><i class="glyphicon glyphicon-pencil"></i> Postular <span class="badge badge-light"><?= $cnt_forms_segunda ?></span></a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/.container-->
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
    function loaderWait() {
      $("#load-carta-generica").removeClass('d-none');
    }

    $(document).ready(function() {
      new WOW().init();
    });
  </script>


</body>

</html>