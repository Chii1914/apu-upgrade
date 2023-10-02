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
    <div class="row">
      <div class="card-deck">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Carta Genérica</h5>
            <p class="card-text">Se generará automáticamente su Carta genérica. Considere que ésta reemplazará a la más reciente que haya solicitado, creando nuevamente la solicitud.</p>
            <div class="d-flex justify-content-center">
              <div id="load-carta-generica" class="spinner-border text-info d-none" role="status">
                <span class="sr-only">Cargando...</span>
              </div>
            </div>
          </div>
          <div class="card-footer">

            <a class="btn btn-default col-lg-12 col-sm-12 col-xs-12" data-toggle="modal" data-target="#confirmar-generar-carta-generica">Generar <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cg ?> </span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Carta Personalizada</h5>
            <p class="card-text">Deberá rellenar el formulario para poder genererar la solicitud de Carta Personalizada. Considere que ésta reemplazará a la más reciente que haya solicitado, creando nuevamente la solicitud.</p>
          </div>
          <div class="card-footer">
            <a class="btn btn-default  col-lg-12 col-sm-12 col-xs-12" href="<?php echo base_url('practicas/carta_personalizada') ?>">Rellenar <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_cp ?></span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Postulación Primera Práctica</h5>
            <p class="card-text">Formulario de postulación para su primera práctica profesional.</p>
            <a class="blue-text" data-toggle="modal" data-target="#modal_formulario_primera"><i class="far fa-hand-pointer"></i>
              Ver Postulaciones
            </a>
          </div>
          <div class="card-footer">
            <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
            <a class="btn col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) { ?>btn-light disabled <?php } else { ?> btn-default<?php } ?> " href="<?php echo base_url('practicas/formulario/primera') ?>"><i class="glyphicon glyphicon-pencil"></i> Postular <span class="badge badge-pill badge-light"><i class="far fa-hand-point-right"></i> # <?= $cnt_forms_primera ?></span></a>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Postulación Segunda Práctica</h5>
            <p class="card-text">Formulario de postulación para su segunda práctica profesional.</p>
            <a class="blue-text" data-toggle="modal" data-target="#modal_formulario_segunda"><i class="far fa-hand-pointer"></i>
              Ver Postulaciones
            </a>
          </div>
          <div class="card-footer">
            <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?> Ya ha realizado una postulación <?php } ?>
            <a class="btn col-lg-12 col-sm-12 col-xs-12 <?php if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) { ?>btn-light  disabled <?php } else { ?> btn-default <?php } ?> " href="<?php echo base_url('practicas/formulario/segunda') ?>"><i class="glyphicon glyphicon-pencil"></i> Postular <span class="badge badge-pill badge-light"> <i class="far fa-hand-point-right"></i> # <?= $cnt_forms_segunda ?></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="row my-5 ">
      <div class="col-lg-12 col-sm-12 col-xs-12 ">
        <p class="lead ">
          Podrás elegir entre estas cuatro opciones para llevar a cabo la postulación de práctica profesional.
          Puedes solicitar una carta de recomendación para llevarla a tu futuro empleador o rellenar el formulario para que el/la coordinador(a) de prácticas
          te ayude en este proceso.
        </p>


      </div>
    </div>
    <!--/.row-->



    <!--/.container-->
  </div>

  <div class="modal fade " id="modal_formulario_primera" tabindex="-1" role="dialog" aria-labelledby="modal_formulario_primeraLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="heading lead" id="modal_formulario_primeraLabel">Postulaciones Primera Práctica</h5>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Aceptadas Sin acción: <?= $cnt_PASa ?><br>
          Aceptadas Aprobadas: <?= $cnt_PAA ?><br>
          Sin Acción: <?= $cnt_PSa ?><br>
          Aceptadas Reprobadas: <?= $cnt_PAR ?><br>
          Rechazadas: <?= $cnt_PR ?><br>
          <hr>
          <?php if (isset($primera_practica_info)  && !empty($primera_practica_info)) { ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Fecha Actualización</th>
                    <th scope="col">Ocasión</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Evaluación</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($primera_practica_info as $practica) { ?>
                    <tr>
                      <td><?= $practica['fecha_actualizacion'] ?></td>
                      <th><?= $practica['ocasion'] ?></th>
                      <td class="<?php if ($practica['estado'] == "Aceptada") { ?>text-success<?php } elseif ($practica['estado'] == "Rechazada") { ?>red-text<?php } ?>"><?= $practica['estado'] ?></td>
                      <td><?= $practica['descripcion_estado'] ?></td>
                      <td class="<?php if (!is_null($practica['evaluacion']) && $practica['evaluacion']=="Aprobada" ) { ?> text-success <?php } elseif(!is_null($practica['evaluacion']) && $practica['evaluacion']=="Reprobada") { ?> red-text<?php } ?> "><?php if (!is_null($practica['evaluacion'])) { echo $practica['evaluacion']; } else { echo "No hay evaluación"; } ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php  } else { ?>
            <p class="note note-primary my-5"><strong>Información:</strong> Aún no ha realizado una postulación.</p>
          <?php  } ?>
        </div>
        <div class="modal-footer flex-center">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade " id="modal_formulario_segunda" tabindex="-1" role="dialog" aria-labelledby="modal_formulario_segundaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="heading lead" id="modal_formulario_segundaLabel">Postulaciones Segunda Práctica</h5>
          <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Aceptada Sin Acción: <?= $cnt_SASa ?><br>
          Aceptadas Aprobadas: <?= $cnt_SAA ?><br>
          Sin Acción: <?= $cnt_SSa ?><br>
          Aceptadas Reprobadas: <?= $cnt_SAR ?><br>
          Rechazadas: <?= $cnt_SR ?><br>
          <hr>
          <?php if (isset($segunda_practica_info) && !empty($segunda_practica_info)) { ?>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Fecha Actualización</th>
                    <th scope="col">Ocasión</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Comentarios</th>
                    <th scope="col">Evaluación</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($segunda_practica_info as $practica) { ?>
                    <tr>
                      <td><?= $practica['fecha_actualizacion'] ?></td>
                      <th><?= $practica['ocasion'] ?></th>
                      <td class="<?php if ($practica['estado'] == "Aceptada") { ?>text-success<?php } elseif ($practica['estado'] == "Rechazada") { ?>red-text<?php } ?>"><?= $practica['estado'] ?></td>
                      <td><?= $practica['descripcion_estado'] ?></td>
                      <td class="<?php if (!is_null($practica['evaluacion']) && $practica['evaluacion']=="Aprobada" ) { ?> text-success <?php } elseif(!is_null($practica['evaluacion']) && $practica['evaluacion']=="Reprobada") { ?> red-text<?php } ?> "><?php if (!is_null($practica['evaluacion'])) { echo $practica['evaluacion']; } else { echo "No hay evaluación"; } ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          <?php  } else { ?>
            <p class="note note-primary my-5"><strong>Información:</strong> Aún no ha realizado una postulación.</p>
          <?php  } ?>
        </div>
        <div class="modal-footer flex-center">
          <button type="button" class="btn btn-outline-info" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="confirmar-generar-carta-generica" tabindex="-1" role="dialog" aria-labelledby="confirmar-generar-carta-genericaLabel" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header">
          <p class="heading lead">Confirmar generación de nueva Carta Genérica</p>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="text-center">
            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i><br>
            <div id="loader-cg" class="spinner-border text-danger d-none m-3" style="width: 3rem; height: 3rem;" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            <p>¿Está seguro(a) de que desea generar una nueva Carta Genérica? Considere que esta nueva carta reemplazará a la más reciente que haya solicitado por el sistema, generando una nueva solicitud.</p>
          </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
          <a id="boton-generar-carta-generica" class="btn btn-danger " href="<?php echo base_url('practicas/carta_generica') ?>" onclick='return loaderWait()'>Generar </a>
          <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">Cerrar</a>
        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>


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
      $("#loader-cg").removeClass('d-none');
      $("#boton-generar-carta-generica").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Generando...').addClass('disabled');
    }


    



    $(document).ready(function() {
      new WOW().init();
    });
  </script>


</body>

</html>