<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>[Administrador] Administración de prácticas | Administración Pública UV</title>

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
    <h1 class="h1">Cambio de contraseña Administrador </h1>
    <p class="lead"></p>
    <hr class="my-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Ingrese su nueva contraseña</h5>

        <?php echo form_open('administrador/InicioAdm_Controller/modificar_contrasena', 'onsubmit="return validar();" class="" '); ?>

        <div class="form-group">
          <label for="password-antiguo">Contraseña antigua</label>
          <input type="password" class="form-control" id="password-antiguo" name="password-antiguo" placeholder="Ingrese contraseña antigua">
        </div>

        <div class="form-group">
          <label for="password-nuevo">Contraseña nueva</label>
          <input type="password" class="form-control" id="password-nuevo" name="password-nuevo" placeholder="Ingrese contraseña nueva">
          <span id="password-nuevo-mensaje" class="help-block"></span><br>
          <span id="password-nuevo-mensaje-espacios" class="help-block"></span>
        </div>

        <div class="form-group">
          <label for="password-nuevo-repite">Repita Contraseña nueva</label>
          <input type="password" class="form-control" id="password-nuevo-repite" name="password-nuevo-repite" placeholder="Repita contraseña nueva" oninput="contrasenasIguales()">
          <span id="password-nuevo-repite-mensaje" class="help-block"></span>
        </div>
        <input type="hidden" id="admin-id" name="admin-id" value="<?= $admin_id ?>">
        <button class="btn btn-info  my-4" type="submit">Cambiar Contraseña</button>
        </form>
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


  <script type="text/javascript">
    function validar() {

      password = $('#password-nuevo').val();
      var strength = 0;
      if (password.length < 6) {
        $('#password-nuevo-mensaje').removeClass();
        $('#password-nuevo-mensaje').addClass('text-danger font-weight-bold');
        return false;
      }
      if (password.length > 7) strength += 1;
      // If password contains both lower and uppercase characters, increase strength value.
      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
      // If it has numbers and characters, increase strength value.
      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1;
      // If it has one special character, increase strength value.
      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
      // If it has two special characters, increase strength value.
      if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
      // Calculated strength value, we can return messages
      // If value is less than 2
      if (!contrasenasIguales()) {
        return false;
      }
      if (!contrasenasEspacios()) {
        return false;
      }

      if (strength < 2) {
        $('#password-nuevo-mensaje').removeClass();
        $('#password-nuevo-mensaje').addClass('text-danger');
        return false;
      } else if (strength == 2) {
        $('#password-nuevo-mensaje').removeClass();
        $('#password-nuevo-mensaje').addClass('text-success');
        return true;
      } else {
        $('#password-nuevo-mensaje').removeClass();
        $('#password-nuevo-mensaje').addClass('text-success font-weight-bold');
        return true;
      }
    }

    function contrasenasIguales() {
      var password_nuevo = $('#password-nuevo').val();
      var password_nuevo_repite = $('#password-nuevo-repite').val();
      if (password_nuevo === password_nuevo_repite) {
        $('#password-nuevo-repite-mensaje').removeClass();
        $('#password-nuevo-repite-mensaje').addClass('text-success font-weight-bold');
        $('#password-nuevo-repite-mensaje').html("Contraseñas Ok!");
        return true;
      } else {

        $('#password-nuevo-repite-mensaje').removeClass();
        $('#password-nuevo-repite-mensaje').addClass('text-danger font-weight-bold');
        $('#password-nuevo-repite-mensaje').html("Contraseñas distintas");
        return false;
      }
    }

    function contrasenasEspacios() {

      var password_nuevo = $('#password-nuevo').val();
      if (!/^\s|\s$/.test(password_nuevo) ) {
        $('#password-nuevo-mensaje-espacios').removeClass();
        $('#password-nuevo-mensaje-espacios').addClass('text-success font-weight-bold');
        $('#password-nuevo-mensaje-espacios').html("");
        return true;
      } else {

        $('#password-nuevo-mensaje-espacios').removeClass();
        $('#password-nuevo-mensaje-espacios').addClass('text-danger font-weight-bold');
        $('#password-nuevo-mensaje-espacios').html("Su contraseña presenta espacios al inicio o al final");
        return false;
      }

    }


    /^\s|\s$/


    $(document).ready(function() {
      $('#password-nuevo').keyup(function() {
        contrasenasEspacios();
        contrasenasIguales();
        $('#password-nuevo-mensaje').html(checkStrength($('#password-nuevo').val()));
      })

      function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
          $('#password-nuevo-mensaje').removeClass()
          $('#password-nuevo-mensaje').addClass('text-danger font-weight-bold')
          return 'Contraseña corta (Mínimo 6 caracteres)'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
          $('#password-nuevo-mensaje').removeClass()
          $('#password-nuevo-mensaje').addClass('text-danger')
          return 'Débil'
        } else if (strength == 2) {
          $('#password-nuevo-mensaje').removeClass()
          $('#password-nuevo-mensaje').addClass('text-success')
          return 'Contraseña segura'
        } else {
          $('#password-nuevo-mensaje').removeClass()
          $('#password-nuevo-mensaje').addClass('text-success font-weight-bold')
          return 'Contraseña Fuerte'
        }
      }
    });
  </script>


</body>

</html>