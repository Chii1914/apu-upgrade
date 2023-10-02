<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title> Iniciar Sesión Administración de prácticas | Administración Pública UV</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="<?php echo base_url(); ?>css/mdb.min.css" type="text/css" rel="stylesheet">
  <!-- APU-->
  <link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/3300da7169.js" crossorigin="anonymous"></script>

  <!-- APU LOGIN -->
  <link href="<?php echo base_url(); ?>css/practicas/login.css" type="text/css" rel="stylesheet">

</head>
<!--/head-->

<body>




  <header>
  <?php //require_once("menu_practica.php"); ?>

    <!--Mask-->
    <div id="intro" class="view">

      <div class="mask rgba-black-strong d-flex justify-content-center align-items-center">

        <div class="container">

          <div class="row ">
            <?php
            if ($this->session->flashdata('error')) {
            ?>
              <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
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

          </div>
          <div class="row ">

            <div class="col-md-7">
              <h1 class="white-text display-4 font-weight-bold">Bienvenidos y bienvenidas</h1>
              <h3 class="white-text "> al sistema de prácticas de la Escuela de Administración Pública</h3>
              <h4 class="white-text "> Universidad de Valparaíso</h4>
            </div>

            <div class="col-md-5">

              <?php echo form_open('practicas/Login_Controller/inicio_sesion', ' class="  " '); ?>
              <div class="card estud-login">
                <div class="card-body">
                  <div class="container py-5 px-2">
                    <h3 class="card-title text-center text-white mb-5">Iniciar Sesión</h3>

                    <div class="md-form mv-2">
                      <i class="fas fa-user prefix text-white "></i><input type="text" id="usuario" name="usuario" class="form-control text-white border-white  my-4" autocomplete="off">
                      <label for="usuario" class="text-white" data-error="Error" data-success="Bien">RUT sin dígito verificador</label>
                      <small id="usuario_error" class="form-text text-danger"></small>
                    </div>
                    <div class="md-form mb-5 ">
                      <i class="fas fa-lock prefix text-white "></i><input type="password" id="contrasena" name="contrasena" class="form-control text-white border-white my-4">
                      <label for="contrasena" class="text-white">Contraseña</label>
                      <small id="contrasena_error" class="form-text text-danger"></small>
                    </div>
                    <button class="btn btn-success btn-block my-3" type="submit" id="boton_entrar" disabled>Entrar</button>
                    <a class="white-text"  data-toggle="tooltip" title="Cuidado con los espacios iniciales y finales"><i class="fas fa-info-circle"></i></a>
                    <br>
                    <a href="<?= base_url('practicas') ?>" class="text-white"><span class="fa fa-share mt-5"></span> Volver</a>
                  </div>
                </div>
              </div>
              </form>


            </div>


          </div>

        </div>

      </div>

    </div>
    <!--/.Mask-->

  </header>


  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url(); ?>js/mdb.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {

      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })

      $("#usuario").keyup(function() {
        validar_usuario();
      });

      $(" #contrasena").keyup(function() {
        validar_contrasena();
      });




      function validar_usuario() {
        validar();
        if ($("#usuario").val().length > 0) {
          $("#usuario").parent().children("label").removeClass( "text-danger" ).addClass( " white-text ");
          $("#usuario").attr("class", "form-control text-white border-white my-4 is-valid");
          $("#usuario_error").html("");
          return true;
        } else {
          $("#usuario").parent().children("label").removeClass( "white-text" ).addClass( "text-danger" );
          $("#usuario").attr("class", "form-control text-white border-white my-4 is-invalid");
          $("#usuario_error").html("EL usuario no puede ir vacio");
          return false;
        }
      }

      function validar_contrasena() {
        validar();
        if ($("#contrasena").val().length > 0) {
          $("#contrasena").attr("class", "form-control text-white my-4 valid is-valid");
          $("#contrasena_error").html("");
          return true;
        } else {
          $("#contrasena").attr("class", "form-control text-white my-4 invalid is-invalid ");
          $("#contrasena_error").html("La contraseña no puede ir vacia");
          return false;
        }
      }

      function validar() {
        $('#usuario').val( $.trim(document.getElementById("usuario").value));
        $('#contrasena').val( $.trim(document.getElementById("contrasena").value));
        document.getElementById("boton_entrar").disabled = !document.getElementById("usuario").value.length || !document.getElementById("contrasena").value.length;


      }


    });
  </script>

</body>

</html>