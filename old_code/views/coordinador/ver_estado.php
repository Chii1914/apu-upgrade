<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Editar información de práctica | Administración Pública UV</title>

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

  <div class="container">

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



    <h1>Información sobre el alumno</h1>
    <legend><b>Datos personales</b></legend>
    <input type="hidden" id="practicaId" name="practicaId" value="<?php echo $practicaId ?>">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="run" class="disabled">RUN (con dígito verificador)</label>
          <input type="text" name="run" id="run" class="form-control" aria-describedby="basic-addon1" value="<?php echo $row_estudiante['run'] . "-" . $row_estudiante['df'] ?>" disabled>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="primer_nombre">Primer Nombre</label>
          <input type="text" class="form-control has-feedback" name="primer_nombre" id="primer_nombre" aria-describedby="basic-addon1" value="<?php echo $row_estudiante['primer_nombre'] ?>" disabled>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="segundo_nombre">Segundo nombre</label>
          <input type="text" class="form-control has-feedback" name="segundo_nombre" id="segundo_nombre" aria-describedby="basic-addon1" value="<?php echo $row_estudiante['segundo_nombre'] ?>" disabled>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="apellido_paterno">Apellido paterno</label>
          <input type="text" class="form-control has-feedback" name="apellido_paterno" id="apellido_paterno" aria-describedby="basic-addon1" value="<?php echo $row_estudiante['apellido_paterno'] ?>" disabled>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="apellido_materno"><b>Apellido materno</b></label>
          <input type="text" class="form-control has-feedback" name="apellido_materno" id="apellido_materno" aria-describedby="basic-addon1" value="<?php echo $row_estudiante['apellido_materno'] ?>" disabled>
        </div>
      </div>
    </div>

    <hr class="my-5">
    <h2>Estado de práctica actual</h2>

    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="practica"><b>Práctica</b></label>
          <input type="text" class="form-control has-feedback" name="practica" id="practica" aria-describedby="basic-addon1" value="<?php echo $row_practica['ocasion'] ?>" disabled>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="form-group">
          <label for="estado"><b>Estado</b></label>
          <input type="text" class="form-control <?php if ($row_practica['estado'] == "Rechazada") { ?> danger-color text-white<?php } ?>" name="estado" id="estado" aria-describedby="basic-addon1" value="<?php echo $row_practica['estado'] ?>" disabled>
        </div>
      </div>
    </div>

    <!-- CARTA SEGURO -->
    <?php if ($row_practica['estado'] == "Aceptada") { ?>
      <div class="row">
        <div class="col-lg-6">
          <div class="card mb-3" id="tabla_estado_actual">
            <div class="card-body">

              <h5>Carta de Seguro</h5>
              <!-- <a href="<?php echo base_url() ?>DocumentosPracticasApu/<?= $row_estudiante['run']; ?>/<?= $row_estudiante['run']; ?>-carta_seguro(<?= $row_practica['ocasion']; ?>Practica).docx?v=<?php echo (rand()); ?>" title='Descargar documento de carta de seguro en formato WORD.'>Descargar <span class='fa fa-file-word-o fa-lg'></span></a> -->
              <?php
                $downloadFileName = $row_estudiante['run'].'-'.$row_estudiante['apellido_paterno'].'.'.$row_estudiante['apellido_materno'].'.'. $row_estudiante['primer_nombre'].'.'.$row_estudiante['segundo_nombre'].'-carta_seguro(' . $row_practica['ocasion'] . 'Practica).docx';

                ?>
              <a href="<?php echo base_url() ?>DocumentosPracticasApu/<?= $row_estudiante['run']; ?>/<?= $row_estudiante['run']; ?>-carta_seguro(<?= $row_practica['ocasion']; ?>Practica).docx?v=<?php echo (rand()); ?>"download="<?php echo $downloadFileName; ?>" title='Descargar documento de carta de seguro en formato WORD.'>Descargar <span class='fa fa-file-word-o fa-lg'></span></a>
                
            </div>
          </div>
        </div>
      </div>
      <hr class="my-5">
      <h2>Evaluación de práctica actual</h2>
      <!-- EVALUACION -->
      <?php if (isset($row_evaluacion)) { ?>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
              <label for="evaluacion"><b>Evaluación</b></label>
              <input type="text" class="form-control font-weight-bold <?= ($row_evaluacion['evaluacion']=="Aprobada")?  "green-text" :  "red-text"?>  " name="evaluacion" id="evaluacion" aria-describedby="basic-addon1" value="<?php echo $row_evaluacion['evaluacion'] ?>" disabled>
            </div>
          </div>
          <?php if (!($row_evaluacion['evaluacion'] == "Sin acción")) { ?>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <label for="estado"><b>Nota final</b></label>
                <input type="text" class="form-control font-weight-bold <?= ($row_evaluacion['evaluacion']=="Aprobada")?  "green-text" :  "red-text"?> " name="estado" id="estado" aria-describedby="basic-addon1" value="<?php echo $row_notas['nota_promedio'] ?>" disabled>
              </div>
            </div>
          <?php } ?>
        </div>
      <?php } else { ?>
        <p class="note note-info"><strong>Información:</strong> Aún no se ha registrado una evaluación para esta práctica.</p>
      <?php } ?>
    <?php } ?>
    <hr class="my-5">



    <div class="form-group center">
      <a href="javascript:history.back()" class="btn btn-default" ><span class="fa fa-share"></span> Volver</a>
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