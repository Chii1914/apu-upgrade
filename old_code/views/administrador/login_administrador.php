<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>[ADM] Login Administración de prácticas | Administración Pública UV</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>
  <!-- APU CSS-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">

  <!-- APU LOGIN -->
  <link href="<?php echo base_url(); ?>css/coordinador/login.css" type="text/css" rel="stylesheet">


</head>
<!--/head-->

<body>
  <div class="container my-5 text-center">

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

<img src="<?php echo base_url(); ?>imagenes/logo_apu_blanco.png" alt="" class="img-fluid my-2" style="max-height:120px;">
    <?php echo form_open('administrador/Loginadm_Controller/login', ' class="text-center " '); ?>
    <div class="row justify-content-md-center  ">
      <div class="col-md-5 col-12 col-sm-12 col-md-7 col-lg-5 my-5">
        <div class="card coord-login">
          <div class="card-body ">
            <div class="container">
              <div class="md-form">
                <p class="h3 ">Iniciar Sesión</p>
                <p class="h1 mb-5">Administrador</p>
                <a href="<?php echo base_url('coord') ?>">Cambiar a Coordinador(a)</a>
                <input type="text" id="usuario" name="usuario" class="form-control my-4 apu-login-btn" placeholder="Usuario">
                <input type="password" id="contrasena" name="contrasena" class="form-control my-4 apu-login-btn" placeholder="Contraseña  ">
                <button class="btn btn-apu btn-block my-5" type="submit">Entrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>




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