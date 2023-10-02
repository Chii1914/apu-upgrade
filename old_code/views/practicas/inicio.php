<!DOCTYPE html>
<html lang="es">
<!-- 23/8 Código fuente entregado, combinado de request. Menú y footer-->
<!-- 23/8 Dependencia con menu_practica.php y footer.php-->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Practicas - Postulación a practicas profesionales | Administración Pública UV</title>
    
  <!-- Las siguientes funciones son dependiendes de /public_html/practicas/system/helpers/url_helper -->

     
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
  <!-- REALIZADO DE REQUEST -->
  <?php require_once("menu_practica.php"); ?>

  <div class="container mt-5 my-5 text-center wow fadeIn ">

    <h1 class="mt-3 font-weight-bold text-center">Postulación a Prácticas Profesionales</h1>
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
      <div class="col-lg-8 col-sm-6 col-xs-12 ">
        <p class="lead">
          Bienvenido al sistema de prácticas de Administración Pública de la Universidad de Valparaíso. Para continuar, necesitas ingresar con tu cuenta. De no contar con una, puedes registrarte en nuestro sistema.
        </p>
        <!--<p class="note note-danger"><strong>Aviso:</strong> El SPP-APU se encuentra en una fase de prueba, por lo que ante cualquier error que pueda observar, agradeceremos que se pueda contactar con su Coordinador(a) de prácticas, indicando el problema.  </p>
        -->
      </div>
    </div>
    
    <div class="row justify-content-md-center my-5 ">
      <div class="col-lg-5 col-sm-6 col-xs-12 ">
        <div class="row mx-3 my-2">
          <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/iniciar_sesion') ?>">Iniciar Sesión</a>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row mx-3 my-3">
          <a class="btn btn-default btn-lg col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/registrar') ?>"><i class="glyphicon glyphicon-pencil"></i> Registrarse</a>
        </div>
      </div>
    </div>
    <!--/.row-->


  </div>
  <!--/.container-->
  
  <!-- REALIZADO DE REQUEST -->
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

</body>

</html>