<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>[ADM] Administración de prácticas | Administración Pública UV</title>

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


  <?php require_once("menu_admpracticas.php"); ?>

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
    <h1 class="h1">Administrador del Sistema</h1>
    <p class="lead"></p>
    <hr class="my-3">
    <a class="btn btn-default" href="<?php echo base_url('administrador/ver_coordinadores') ?>">Modificar Coordinadores </a>
    <a class="btn btn-default" href="<?php echo base_url('administrador/ver_director') ?>">Modificar Firmas </a>



  
    
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