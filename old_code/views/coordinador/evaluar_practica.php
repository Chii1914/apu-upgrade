<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Practicas - Evaluar práctica profesional | Administración Pública UV</title>

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
    <h1>Evaluación de Práctica Profesional</h1>

    <div class="row">
      <p class="lead">
        Señor Supervisor, agradeceremos completar la siguiente Pauta de Evaluación de Práctica Profesional, la que solicitamos seea entregada al alumno en sobre cerrado, dirigido a la Dirección de nuestra Escuela.
      </p>
    </div>
    <div class="row">
      <!-- <form name="evaluacion-form" id="practica-form" method="POST" action="../logica/guardar_evaluacion_practica.php" enctype="multipart/form-data" onsubmit="validar()"> -->
      <?php echo form_open('coordinador/Practica_Controller/evaluar_practica/' . $practicaId, ' onsubmit="return validar(this)"'); ?>
      <p class="h3">Antecedentes de la práctica</p>
      <div class="row">
        <div class="alert alert-info col-lg-12">
          <span>
            <i title="" class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Para editar la información sobre el alumno o la práctica diríjase al ícono <span class='fa fa-edit'></span> que corresponda de la página <a href="javascript:history.back(-1);">anterior</a>.</p>
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="primer_nombre">Primer nombre</label>
            <input type="text" class="form-control has-feedback" name="primer_nombre" id="primer_nombre" aria-describedby="basic-addon1" title="TITLE" value="<?php echo $datos_estudiante['primer_nombre'] ?>" readonly>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="segundo_nombre">Segundo nombre</label>
            <input type="text" class="form-control has-feedback" name="segundo_nombre" id="segundo_nombre" aria-describedby="basic-addon1" value="<?php echo $datos_estudiante['segundo_nombre'] ?>" readonly>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="apellido_paterno">Apellido paterno</label>
            <input type="text" class="form-control has-feedback" name="apellido_paterno" id="apellido_paterno" aria-describedby="basic-addon1" value="<?php echo $datos_estudiante['apellido_paterno'] ?>" readonly>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="apellido_materno">Apellido materno</label>
            <input type="text" class="form-control has-feedback" name="apellido_materno" id="apellido_materno" aria-describedby="basic-addon1" value="<?php echo $datos_estudiante['apellido_materno'] ?>" readonly>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="run">RUN</label>
            <input type="text" name="run" id="run" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_estudiante['run'] ?>" readonly>
            <span class="help-block"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="horas_practica">Horas de Práctica Cumplidas</label>
            <input type="number" name="horas_practica" id="horas_practica" class="form-control" aria-describedby="basic-addon1" value="288">
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="nombre_organismo">Organismo</label>
            <input type="text" name="nombre_organismo" id="nombre_organismo" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_organismo['nombre_organismo'] ?>" disabled>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="nombre_supervisor">Nombre Supervisor</label>
            <input type="text" name="nombre_supervisor" id="nombre_supervisor" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_supervisor['nombre'] ?>" disabled>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label for="cargo_supervisor">Cargo Supervisor</label>
            <input type="text" name="cargo_supervisor" id="cargo_supervisor" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_supervisor['cargo'] ?>" disabled>
            <span class="help-block"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_practica['fecha_inicio'] ?>" disabled>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="fecha_termino">Fecha de término</label>
            <input type="date" name="fecha_termino" id="fecha_termino" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_practica['fecha_termino'] ?>" disabled>
          </div>
        </div>
        <span class="help-block"></span>
      </div>

      <div class="form-group">
        <label for="descripcion">Funciones o actividades desempeñadas</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="10" maxlength="900" disabled><?php echo $datos_practica['descripcion'] ?></textarea>
      </div>

      <p class="h3">Pauta Evaluativa</p>
      <p class="lead">La siguiente pauta consta de trece items, de los cuales ocho pertenecen a Aspectos Generales y cinco a Aspectos profesionales, los que deberán ser calificados según la asociación de concepto con el rango correspondiente, como se muestra en el cuadro. Además se solicita que ésta evaluación sea respondida con el máximo de objetividad y mesura.</p>
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <style type="text/css">
            .tg {
              border-collapse: collapse;
              border-spacing: 0;
            }

            .tg td {
              font-family: Arial, sans-serif;
              font-size: 14px;
              padding: 10px 5px;
              border-style: solid;
              border-width: 1px;
              overflow: hidden;
              word-break: normal;
              border-color: black;
            }

            .tg th {
              font-family: Arial, sans-serif;
              font-size: 14px;
              font-weight: normal;
              padding: 10px 5px;
              border-style: solid;
              border-width: 1px;
              overflow: hidden;
              word-break: normal;
              border-color: black;
            }

            .tg .tg-erlg {
              font-weight: bold;
              background-color: #efefef;
              vertical-align: top
            }

            .tg .tg-yzt1 {
              background-color: #efefef;
              vertical-align: top
            }

            .tg .tg-oskr {
              background-color: #ffffff;
              vertical-align: top
            }

            .tg .tg-3we0 {
              background-color: #ffffff;
              vertical-align: top
            }
          </style>
          <table class="tg">
            <tr>
              <th class="tg-yzt1"><span style="font-weight:bold">Concepto</span></th>
              <th class="tg-erlg">Rango de calificación asociada</th>
            </tr>
            <tr>
              <td class="tg-oskr">Muy bueno</td>
              <td class="tg-oskr">6,0 a 7,0</td>
            </tr>
            <tr>
              <td class="tg-3we0">Bueno</td>
              <td class="tg-3we0">5,0 a 5,9</td>
            </tr>
            <tr>
              <td class="tg-oskr">Regular</td>
              <td class="tg-oskr">4,0 a 4,9</td>
            </tr>
            <tr>
              <td class="tg-3we0">Malo</td>
              <td class="tg-3we0">menor o igual a 3,9</td>
            </tr>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <p class="lead">* Si es que en la solicitud se indicó un supervisor y éste no fue quién evaluó la práctica, indique sus datos en los siguientes campos, de lo contrario déjelos con los datos que ya están:</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <div class="form-group">
            <label for="supervisor_evaluador">Nombre (opcional)</label>
            <input type="text" name="supervisor_evaluador" id="supervisor_evaluador" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_supervisor['nombre'] ?>">
            <!-- <span class="input-group-addon" id="basic-addon1"><b>Nombre (opcional)</b></span>
                            <input type="text" name="supervisor_evaluador" id="supervisor_evaluador" class="form-control" aria-describedby="basic-addon1" value="<?php //echo utf8_encode($row['nombre_supervisor']) 
                                                                                                                                                                  ?>" required> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label for="supervisor_evaluador_correo">Correo (opcional)</label>
            <input type="email" name="supervisor_evaluador_correo" id="supervisor_evaluador_correo" class="form-control" aria-describedby="basic-addon1" value="<?php echo $datos_supervisor['correo'] ?>">
            <!-- <span class="input-group-addon" id="basic-addon1"><b>Correo (opcional)</b></span>
                            <input type="email" name="supervisor_evaluador_correo" id="supervisor_evaluador_correo" class="form-control" aria-describedby="basic-addon1" value="<?php //echo utf8_encode($row['correo_supervisor']) 
                                                                                                                                                                                ?>" required> -->
          </div>
        </div>
      </div>

      <p class="lead">Asociando concepto con rango de calificación, evalúe la siguiente pauta:</p>

      <div class="row">
        <div class="col-lg-6">
          <style type="text/css">
            .tg {
              border-collapse: collapse;
              border-spacing: 0;
            }

            .tg td {
              font-family: Arial, sans-serif;
              font-size: 14px;
              padding: 10px 5px;
              border-style: solid;
              border-width: 1px;
              overflow: hidden;
              word-break: normal;
              border-color: black;
            }

            .tg th {
              font-family: Arial, sans-serif;
              font-size: 14px;
              font-weight: normal;
              padding: 10px 5px;
              border-style: solid;
              border-width: 1px;
              overflow: hidden;
              word-break: normal;
              border-color: black;
            }

            .tg .tg-kiyw {
              background-color: #efefef;
              border-color: inherit;
              vertical-align: top
            }

            .tg .tg-fhq0 {
              background-color: #ffffff;
              border-color: inherit;
              vertical-align: middle
            }

            .tg .tg-ek7a {
              font-weight: bold;
              background-color: #efefef;
              border-color: inherit;
              vertical-align: top
            }

            .tg .tg-eh2d {
              background-color: #ffffff;
              border-color: inherit;
              vertical-align: middle
            }

            .tg .tg-y5xj {
              font-weight: bold;
              background-color: #efefef;
              border-color: inherit;
              vertical-align: top
            }

            .tg .tg-egdh {
              background-color: #efefef;
              border-color: inherit;
              vertical-align: middle
            }
          </style>
          <table class="tg">
            <tr>
              <!--<th class="tg-kiyw"></th>-->
              <!--<th class="tg-y5xj">ASPECTOS GENERALES</th>-->
              <th class="tg-kiyw"><span style="font-weight:bold">Calificaciones</span></th>
            </tr>
            <tr>
              <!--<td class="tg-fhq0">1.-</td>-->
              <!--<td class="tg-fhq0"><span style="font-weight:bold">PUNTUALIDAD</span><br>El estudiante en práctica respeta el horario, tanto de inicio y término de la jornada, como el de reuniones y actividades planificadas.</td>-->
              <td class="tg-fhq0">
                <div class="form-group">
        /*a*/
                  <label class="control-label" for="nota_uno">Nota supervisor</label>
                  <input class="form-control" name="nota_uno" id="nota_uno" maxlength="2" type="number" value="70" oninput="validarNota(this,'nota_uno');" onfocusout="isNotaBlank(this,'nota_uno');" required>
                  <small id="nota_uno_label" class="form-text text-muted">
                  </small>
                </div>
              </td>

            </tr>
            <tr>
              <!--<td class="tg-eh2d">2.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">ASISTENCIA Y PERMANENCIA</span><br>El estudiante cumple con su asistencia y permanencia en el lugar de trabajo, sin presentar ausencias injustificadas.</td>-->
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_dos">Nota coordinador</label>
                  <input class="form-control" type="number" name="nota_dos" id="nota_dos" maxlength="2" value="10" oninput="validarNota(this,'nota_dos');" onfocusout="isNotaBlank(this,'nota_dos');" required>
                  <small id="nota_dos_label" class="form-text text-muted">
                  </small>
              </td>
            </tr>
            <!--<tr>
              <td class="tg-fhq0">3.-</td>
              <td class="tg-fhq0"><span style="font-weight:bold">RESPONSABILIDAD</span><br>El estudiante en práctica responde y cumple con las tareas encomendadas dentro de los plazos y tiempos establecidos.</td>
              <td class="tg-fhq0">
                <div class="form-group">
                  <label class="control-label" for="nota_tres">Nota</label>
                  <input class="form-control" type="text" name="nota_tres" id="nota_tres" maxlength="2" value="10" oninput="validarNota(this,'nota_tres');" onfocusout="isNotaBlank(this,'nota_tres');" required>
                  <small id="nota_tres_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-eh2d">4.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">GRADO DE COLABORACIÓN</span><br>El estudiante en práctica exhibe conductas de apoyo, colaboración y cooperación con las personas de su entorno laboral.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_cuatro">Nota</label>
                  <input class="form-control" type="text" name="nota_cuatro" id="nota_cuatro" maxlength="2" value="10" oninput="validarNota(this,'nota_cuatro');" onfocusout="isNotaBlank(this,'nota_cuatro');" required>
                  <small id="nota_cuatro_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-fhq0">5.-</td>
              <td class="tg-fhq0"><span style="font-weight:bold">CUMPLIMIENTO DE NORMAS DE SEGURIDAD, ÓRDENES E INSTRUCCIONES</span><br>El estudiante en práctica respeta las disposiciones y normas de higiene y seguridad propias de su lugar de trabajo y obedece las instrucciones u órdenes de su jefatura superior.</td>
              <td class="tg-fhq0">
                <div class="form-group">
                  <label class="control-label" for="nota_cinco">Nota</label>
                  <input class="form-control" type="text" name="nota_cinco" id="nota_cinco" maxlength="2" value="10" oninput="validarNota(this,'nota_cinco');" onfocusout="isNotaBlank(this,'nota_cinco');" required>
                  <small id="nota_cinco_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-eh2d">6.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">HABILIDADES INTERPERSONALES</span><br>El estudiante en práctica se expresa adecuadamente, respetuosamente y se comunica asertivamente con los demás.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_seis">Nota</label>
                  <input class="form-control" type="text" name="nota_seis" id="nota_seis" maxlength="2" value="10" oninput="validarNota(this,'nota_seis');" onfocusout="isNotaBlank(this,'nota_seis');" required>
                  <small id="nota_seis_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-fhq0">7.-</td>
              <td class="tg-fhq0"><span style="font-weight:bold">INTEGRACIÓN AL GRUPO</span><br>El estudiante en práctica se integra y participa en su grupo de trabajo.</td>
              <td class="tg-fhq0">
                <div class="form-group">
                  <label class="control-label" for="nota_siete">Nota</label>
                  <input class="form-control" type="text" name="nota_siete" id="nota_siete" maxlength="2" value="10" oninput="validarNota(this,'nota_siete');" onfocusout="isNotaBlank(this,'nota_siete');" required>
                  <small id="nota_siete_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-eh2d">8.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">ÉTICA Y PROBIDAD</span><br>El estudiante demuestra una conducta ética y proba en su desempeño.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_ocho">Nota</label>
                  <input class="form-control" type="text" name="nota_ocho" id="nota_ocho" maxlength="2" value="10" oninput="validarNota(this,'nota_ocho');" onfocusout="isNotaBlank(this,'nota_ocho');" required>
                  <small id="nota_ocho_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-egdh"></td>
              <td class="tg-ek7a">ASPECTOS PROFESIONALES</td>
              <td class="tg-egdh">
                <span style="font-weight:bold">Calificación</span></td>
            </tr>
            <tr>
              <td class="tg-eh2d">9.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">CALIDAD DE TRABAJO</span><br>El estudiante en práctica trabaja en forma eficiente y sus resultados son buenos. Genera informes y documentos con orden, buena redacción, ortografía y calidad gramatical, consistentes, pertinentes respecto de la coherencia y congruencia de los contenidos y datos.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_nueve">Nota</label>
                  <input class="form-control" type="text" name="nota_nueve" id="nota_nueve" maxlength="2" value="10" oninput="validarNota(this,'nota_nueve');" onfocusout="isNotaBlank(this,'nota_nueve');" required>
                  <small id="nota_nueve_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-fhq0">10.-</td>
              <td class="tg-fhq0"><span style="font-weight:bold">INNOVACIÓN Y CREATIVIDAD</span><br>El estudiante en práctica demuestra autonomía y capacidad para resolver problemas y/o proponer alternativas novedosas, cuando ha tenido la oportunidad.</td>
              <td class="tg-fhq0">
                <div class="form-group">
                  <label class="control-label" for="nota_diez">Nota</label>
                  <input class="form-control" type="text" name="nota_diez" id="nota_diez" maxlength="2" value="10" oninput="validarNota(this,'nota_diez');" onfocusout="isNotaBlank(this,'nota_diez');" required>
                  <small id="nota_diez_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-eh2d">11.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">CAPACIDAD DE APRENDIZAJE</span><br>El estudiante en práctica corrige sus errores ante la sugerencia de su supervisor y se da cuenta de su propio aprendizaje.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_once">Nota</label>
                  <input class="form-control" type="text" name="nota_once" id="nota_once" maxlength="2" value="10" oninput="validarNota(this,'nota_once');" onfocusout="isNotaBlank(this,'nota_once');" required>
                  <small id="nota_once_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-fhq0">12.-</td>
              <td class="tg-fhq0"><span style="font-weight:bold">APLICACIÓN DE LOS CONOCIMIENTOS TEÓRICOS Y HABILIDADES</span><br>El estudiante en práctica demuestra conocimientos y habilidades en la realización de las actividades delegadas.</td>
              <td class="tg-fhq0">
                <div class="form-group">
                  <label class="control-label" for="nota_doce">Nota</label>
                  <input class="form-control" type="text" name="nota_doce" id="nota_doce" maxlength="2" value="10" oninput="validarNota(this,'nota_doce');" onfocusout="isNotaBlank(this,'nota_doce');" required>
                  <small id="nota_doce_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>
            <tr>
              <td class="tg-eh2d">13.-</td>
              <td class="tg-eh2d"><span style="font-weight:bold">COMPRENSIÓN DEL CONTEXTO</span><br>Entiende las situaciones y desafíos, con sus amenazas y oportunidades. Identifica la visión, valores y prioridades institucionales.</td>
              <td class="tg-eh2d">
                <div class="form-group">
                  <label class="control-label" for="nota_trece">Nota</label>
                  <input class="form-control" type="text" name="nota_trece" id="nota_trece" maxlength="2" value="10" oninput="validarNota(this,'nota_trece');" onfocusout="isNotaBlank(this,'nota_trece');" required>
                  <small id="nota_trece_label" class="form-text text-muted">
                  </small>
                </div>


              </td>
            </tr>-->
          </table>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="form-group">
              <label for="nota_promedio_real">(*)Promedio real (sin aproximar)</label>
              <input type="number" name="nota_promedio_real" id="nota_promedio_real" class="form-control" aria-describedby="basic-addon1" readonly>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="nota_promedio">(*)Promedio final</label>
              <input type="number" name="nota_promedio" id="nota_promedio" class="form-control" aria-describedby="basic-addon1" min="10.0" max="70.0" step="0.01" value="" readonly>
            </div>
          </div>
        </div>




      </div> <!-- tabla -->


      <div class="row">
        <div class="col-lg-12">
          <p class="lead"><i>(*) El promedio final se calcula sumando el total de las notas, y su resultado es dividido por el total de items.</i></p>
        </div>
      </div>

      <!-- <div class="row">
                        <div class="col-lg-6"> -->
      <!-- <label for="informe">Adjuntar informe de práctica (Obligatorio)</label> -->
      <!-- <label for="informe">Adjuntar informe de práctica (Opcional)</label>
                            <div class="form-group">
                                <div class="input-group"> -->
      <!-- <input type="file" name="informe" id="informe" accept="application/pdf" class="form-control" aria-describedby="basic-addon1" required /> -->
      <!-- <input type="file" name="informe" id="informe" accept="application/pdf" class="form-control" aria-describedby="basic-addon1" value="<?php //$var = ($row_practica['informe_pdf']) ? $row_practica['informe_pdf'] : null; echo $var; 
                                                                                                                                                ?>"/>
                                </div>
                            </div>
                        </div>  -->
      <!-- <div class="col-lg-6">
                            <br>
                            <a href="../practica/postulacion/informes/INFORME PRÁCTICA.pdf"><?php //$var = ($row['informe_pdf']) ? $row['informe_pdf'] : ''; echo $var; 
                                                                                            ?>&nbsp;</a><a href="" class="glyphicon glyphicon-remove"></a>
                        </div> 
                    </div> -->

      <p class="h3">Observaciones</p><span id="charNum" class="badge badge-pill badge-default">0 caracteres de 900</span>
      <div class="form-group">
        <label for="observaciones"></label>
        <textarea class="form-control" name="observaciones" id="observaciones" rows="8" maxlength="900" placeholder="(900 caracteres como máximo)" onkeyup="countChars(this);" required></textarea>


        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="enviar" id="enviar" value="Enviar" required="required"><span class="fa fa-check"></span> Evaluar practica </button>
          <a href="javascript:history.back()" class="btn btn-default"><span class="fa fa-share"></span> Volver</a>
        </div>
        </form>
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

    <!-- Validador propio -->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/practicas/validacion_evaluar_practica.js"></script>

    <script type="text/javascript">
      function countChars(obj) {
        var maxLength = 900;
        var strLength = obj.value.length;

        if (strLength > maxLength) {
          document.getElementById("charNum").innerHTML = strLength + ' de ' + maxLength + ' caracteres';
        } else {
          document.getElementById("charNum").innerHTML = strLength + ' de ' + maxLength + ' caracteres';
        }
      }
      $(document).on("ready", inicio);
      this.calcularPromedio();

      function inicio() {

      }
    </script>
    
    <script>
        function Promedio_Real() {
            // Obtener los valores de las notas uno y dos
            var notaUno = parseFloat(document.getElementById("nota_uno").value);
            var notaDos = parseFloat(document.getElementById("nota_dos").value);

            // Calcular el promedio
            var promedio = ((notaUno + notaDos) / 2)/10;

            // Mostrar el promedio en el campo de nota_promedio
            document.getElementById("nota_promedio_real").value = promedio.toFixed(1);
            }
        document.getElementById("nota_uno").addEventListener("input", Promedio_Real);
        document.getElementById("nota_dos").addEventListener("input", Promedio_Real);

        // Llamar a la función inicialmente para mostrar el promedio inicial
        Promedio_Real();
    </script>
    
    <script>
        function Promedio_Final() {
            // Obtener los valores de las notas uno y dos
            var notaUno = parseFloat(document.getElementById("nota_uno").value);
            var notaDos = parseFloat(document.getElementById("nota_dos").value);

            // Calcular el promedio
            var promedio = ((notaUno + notaDos) / 2)/10;

            // Mostrar el promedio en el campo de nota_promedio
            document.getElementById("nota_promedio").value = promedio.toFixed(1);
            }
        document.getElementById("nota_uno").addEventListener("input", Promedio_Final);
        document.getElementById("nota_dos").addEventListener("input", Promedio_Final);

        // Llamar a la función inicialmente para mostrar el promedio inicial
        Promedio_Final();
    </script>


</body>

</html>