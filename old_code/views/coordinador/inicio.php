<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>[Coordinador(a)] Administración de prácticas | Administración Pública UV</title>

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

  <div class="container my-5">
    <h1 class="h1">Administración de Prácticas Profesionales</h1>
    <p class="lead">En las siguientes opciones usted prodrá gestionar todo el proceso de la postulación a practicas, los coordinadores y además revisar las cartas de recomendaciones enviadas por los alumnos.</p>
    <hr class="my-3">

    <div class="card ">
      <h5 class="card-header apu-backg white-text h5"><i class="fas fa-angle-double-right yellow-text" aria-hidden="true"></i> Formularios Postulaciones</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>

        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ver Postulaciones</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se visualizan todas las postulaciones que están en proceso" href="<?php echo base_url('coord/ver_postulaciones') ?>">
                Ver Formularios Postulaciones
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Evaluaciones</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary" title="En esta sección se visualizan todas las postulaciones que están en proceso" href="<?php echo base_url('coord/ver_postulaciones/evaluaciones') ?>">
                Ingresar a las evaluaciones
              </a>
            </div>
          </div>
        </div>

      </div>
    </div>
    <hr class="my-5">
    <div class="card">
      <h5 class="card-header apu-backg white-text h5"><i class="fas fa-angle-double-right yellow-text" aria-hidden="true"></i> Cartas Genéricas y Personalizadas</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>

        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cartas Genéricas</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se visualizan todas las cartas de presentación genericas requeridas por los alumnos" href="<?php echo base_url('coord/ver_cartas/genericas') ?>">
                Ver Cartas de presentación genéricas
              </a>

            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cartas Personalizadas</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary" title="En esta sección se visualizan todas las cartas de presentación personalizadas requeridas por los alumnos" href="<?php echo base_url('coord/ver_cartas/personalizadas') ?>">
                Ver Cartas de presentación personalizadas
              </a>
            </div>
          </div>
        </div>


      </div>
    </div>
    
    <hr class="my-5">

    <div class="card">
      <h5 class="card-header apu-backg white-text h5"><i class="fas fa-angle-double-right yellow-text" aria-hidden="true"></i> Reportes</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>

        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reporte Valparaíso</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se obtienen todas las prácticas inscritas de los alumnos de Valparaíso" href="<?php echo base_url('coordinador/Formulario_Controller/exportar_a_excel_nuevo') ?>">
                Obtener prácticas sede Valparaíso
              </a>

            </div>
          </div>
          
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Reporte Santiago</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se obtienen todas las prácticas inscritas de los alumnos de Santiago" href="<?php echo base_url('coordinador/Formulario_Controller/exportar_a_excel_santiago') ?>">
                Obtener prácticas sede Santiago
              </a>

            </div>
          </div>
          
        </div>
      </div>
    </div>
<!--    
    <hr class="my-5">

    <div class="card">
      <h5 class="card-header apu-backg white-text h5"><i class="fas fa-angle-double-right yellow-text" aria-hidden="true"></i> Actualizar Datos</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text"></p>

        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datos Sede Valparaíso</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se obtienen todas las prácticas inscritas de los alumnos de Valparaíso" href="<?php echo base_url('coordinador/Formulario_Controller/exportar_a_excel_nuevo') ?>">
                MODIFICAR DATOS SEDE VALPARAÍSO
              </a>

            </div>
          </div>
          
          <div class="card">
            <div class="card-body">Datos Sede Santiago</h5>
              <p class="card-text"></p>
              <a class="btn btn-primary " title="En esta sección se obtienen todas las prácticas inscritas de los alumnos de Santiago" href="<?php echo base_url('coordinador/Formulario_Controller/exportar_a_excel_santiago') ?>">
                MODIFICAR DATOS SEDE Santiago
              </a>

            </div>
          </div>
-->          
        </div>
      </div>
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

</body>

</html>