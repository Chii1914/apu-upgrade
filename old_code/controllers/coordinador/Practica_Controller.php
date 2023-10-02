<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class Practica_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 2)) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("coord/iniciar_sesion");
    }
  }
  public function index()
  {
  }

  public function ver_estado($practicaId)
  {
    $data['practicaId'] = $practicaId;

    $this->load->model('coordinador/Practica_Model');
    $data['row_practica'] = $this->Practica_Model->get_practica($practicaId);


    if (!is_null($data['row_practica']) && !empty($data['row_practica'])) {
      $this->load->model('coordinador/Estudiante_Model');
      $data['row_estudiante'] = $this->Estudiante_Model->get_estudiante_por_id($data['row_practica']['alumnoId']);


      if (!is_null($data['row_practica']['evaluacionId'])) {
        $this->load->model('coordinador/Evaluacion_Model');
        $data['row_evaluacion'] = $this->Evaluacion_Model->get_evaluacion($data['row_practica']['evaluacionId']);
        if (!is_null($data['row_evaluacion']['notasId'])) {
          $this->load->model('coordinador/Notas_Model');
          $data['row_notas'] = $this->Notas_Model->get_notas($data['row_evaluacion']['notasId']);
        }
      }
      $this->load->view('coordinador/ver_estado', $data);
    } else {
      $this->session->set_flashdata('mensaje', '¡Práctica no existe!');
      redirect('coord/ver_postulaciones/evaluaciones');
    }
  }

  public function aceptar_practica()
  {
    $practicaId = $this->input->post('hidden_practica_id_aceptada');
    $descripcion_aceptada = $this->input->post('descripcion_aceptada');
    $fecha_cambio_estado = date('Y-m-d');
    $this->load->model('coordinador/Practica_Model');
    $data_practica = array(
      "estado" => "Aceptada",
      "descripcion_estado" => $descripcion_aceptada,
      "fecha_cambio_estado" => $fecha_cambio_estado
    );

    //$this->Practica_Model->actualizar_estado_practica($practicaId, "Aceptada", $fecha_evaluacion);
    $this->Practica_Model->update_practica_por_practicaId($practicaId, $data_practica);
    $this->generar_docCartaSeguro($practicaId);

    $estudiante_id = $this->Practica_Model->get_practica($practicaId)['alumnoId'];
    $this->load->model('coordinador/Estudiante_Model');
    $estudiante = $this->Estudiante_Model->get_estudiante_por_id($estudiante_id);
    $nom_archivo = $this->Practica_Model->get_practica($practicaId)['nombre_archivo'];
    $enlace = "./DocumentosPracticasApu/" . $estudiante['run'] . "/" . $nom_archivo;


    $this->enviar_correo($estudiante, $enlace , $descripcion_aceptada);

    $this->session->set_flashdata('mensaje', '¡Práctica Aceptada exitosamente!');
    redirect('coord/ver_postulaciones');
  }

  public function generar_docCartaSeguro($practicaId)
  {
    $this->load->model("coordinador/Estudiante_Model");
    $row = $this->Estudiante_Model->getDatosCartaSeguroByPracticaId($practicaId);

    $run = $row['run'];
    $df = $row['df'];
    $practica = $row['ocasion'];
    $primer_nombre = $row['primer_nombre'];
    $segundo_nombre = $row['segundo_nombre'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $ultimo_sem_aprobado = $row['ultimo_sem_aprobado'];
    $nombre_organismo = $row['nombre_organismo'];
    $seccion_unidad = $row['division_departamento'];
    $nombre_supervisor = $row['nombre_supervisor'];
    $sexo = $row['sexo'];
    $sede = $row['sede'];


    $dia = date("d");
    if ($dia == "Monday") $dia = "Lunes";
    if ($dia == "Tuesday") $dia = "Martes";
    if ($dia == "Wednesday") $dia = "Miércoles";
    if ($dia == "Thursday") $dia = "Jueves";
    if ($dia == "Friday") $dia = "Viernes";
    if ($dia == "Saturday") $dia = "Sabado";
    if ($dia == "Sunday") $dia = "Domingo";

    $mes = date("F");
    if ($mes == "January") $mes = "Enero";
    if ($mes == "February") $mes = "Febrero";
    if ($mes == "March") $mes = "Marzo";
    if ($mes == "April") $mes = "Abril";
    if ($mes == "May") $mes = "Mayo";
    if ($mes == "June") $mes = "Junio";
    if ($mes == "July") $mes = "Julio";
    if ($mes == "August") $mes = "Agosto";
    if ($mes == "September") $mes = "Septiembre";
    if ($mes == "October") $mes = "Octubre";
    if ($mes == "November") $mes = "Noviembre";
    if ($mes == "December") $mes = "Diciembre";

    $anio = date("Y");

    //vocativos

    if ($sexo == "masculino") {
      $na = "nuestro alumno";
      $vocativo = "alumno";
      $articulo = "el";
      $articulo_mayus = "El";
      $sujeto = "señor";
      $cober = "cubierto";
    } else {
      $na = " nuestra alumna ";
      $vocativo = "alumna";
      $articulo = "la";
      $articulo_mayus = "La";
      $sujeto = "señorita";
      $cober = "cubierta";
    }


    $templateWord = new TemplateProcessor('./DocumentosPracticasApu/PlantillasWord/carta_seguro_plantilla.docx');
    $templateWord->setValue('sede', $sede);
    $templateWord->setValue('dia', $dia);
    $templateWord->setValue('mes', $mes);
    $templateWord->setValue('anio', $anio);
    $templateWord->setValue('nombre_organismo', mb_strtoupper($nombre_organismo));
    $templateWord->setValue('nombre_supervisor', mb_strtoupper($nombre_supervisor));
    $templateWord->setValue('seccion_unidad', mb_strtoupper($seccion_unidad));
    $templateWord->setValue('primer_nombre', mb_strtoupper($primer_nombre));
    $templateWord->setValue('segundo_nombre', mb_strtoupper($segundo_nombre));
    $templateWord->setValue('apellido_paterno', mb_strtoupper($apellido_paterno));
    $templateWord->setValue('apellido_materno', mb_strtoupper($apellido_materno));
    
    /*
    function formatNumber($number) {
    // Use number_format to format the number with thousands separators
    $formattedNumber = number_format($number, 0, '.', '.');

        return $formattedNumber;
    }
    
    // Example usage:
    $number = 22222222;
    $formattedNumber = formatNumber($number);
    */
    $run_puntos = number_format($run, 0, ".", ".");
    $templateWord->setValue('run', $run_puntos);

    if($df === "k"){
        $df = mb_strtoupper($df);
    }
   
    $templateWord->setValue('df', $df);
    $templateWord->setValue('nombre_organismo', mb_strtoupper($nombre_organismo));
    $templateWord->setValue('ultimo_sem_aprobado', $ultimo_sem_aprobado);
    $templateWord->setValue('practica', $practica);

    $templateWord->setValue('na', $na);
    $templateWord->setValue('vocativo', $vocativo);
    $templateWord->setValue('articulo', $articulo);
    $templateWord->setValue('articulo_mayus', $articulo_mayus);
    $templateWord->setValue('sujeto', $sujeto);
    $templateWord->setValue('cober', $cober);
    
    $compare = strcmp($sede, "Valparaíso");
    
    
    if (strcmp($sede, "Valparaíso") === 0){ 
      $templateWord->setValue('piepagina', "Las Heras Nº 06 Valparaíso | Fono: (32) 250 7961- 2507815 | E-mail: practivasv@uv.cl, www.uv.cl");
    } else if ($sede == "Santiago") {
      $templateWord->setValue('piepagina', "Campus Santiago - Gran Avenida 4160, San Miguel | Fono +56 (2) 2329 2149");
    }

    $this->load->model('FirmadorModel');
    if ($sede == "Valparaíso") {
      $templateWord->setValue('nombre_firmante', $this->FirmadorModel->nombre_firmante("Valparaíso"));
      $templateWord->setValue('firma_firmante', $this->FirmadorModel->vocativo("Valparaíso"));
      $templateWord->setValue('firma_sec', $this->FirmadorModel->firma_sec("Valparaíso"));
      $templateWord->setValue('cargo_firmante', $this->FirmadorModel->cargo_firmante("Valparaíso"));
    }
    else if($sede=="Santiago"){
      $templateWord->setValue('nombre_firmante', $this->FirmadorModel->nombre_firmante("Santiago"));
      $templateWord->setValue('firma_firmante', $this->FirmadorModel->vocativo("Santiago"));
      $templateWord->setValue('firma_sec', $this->FirmadorModel->firma_sec("Santiago"));
      $templateWord->setValue('cargo_firmante', $this->FirmadorModel->cargo_firmante("Santiago"));
    }


    //$carpeta = "./DocumentosPracticasApu/CartasSeguro/";
    $carpeta = "./DocumentosPracticasApu/" . $run . "/";
    //$archivo = "carta_seguro(".str_replace("ñ","n",$primer_nombre.$segundo_nombre.$apellido_paterno.$apellido_materno)."-".$run."-".str_replace("ó","o",str_replace(",","",utf8_encode($practica))).").docx";
    //$archivo = "carta_seguro(" . $primer_nombre . $segundo_nombre . $apellido_paterno . $apellido_materno . "-" . $run . "-" . $practica . ").docx";
    $archivo = $run . "-carta_seguro(" . $practica . "Practica).docx";


    $enlace = $carpeta . $archivo;
    $templateWord->saveAs($enlace);
  }

  //public function rechazar_practica($practicaId)
  public function rechazar_practica()
  {
    $practicaId = $this->input->post('hidden_practica_id');
    $descripcion_rechazo = $this->input->post('descripcion_rechazo');
    $fecha_cambio_estado = date('Y-m-d');
    $this->load->model('coordinador/Practica_Model');
    //$this->Practica_Model->actualizar_estado_practica($practicaId, "Rechazada", $fecha_evaluacion);

    $data_practica = array(
      "estado" => "Rechazada",
      "descripcion_estado" => $descripcion_rechazo,
      "fecha_cambio_estado" => $fecha_cambio_estado
    );
    $this->Practica_Model->update_practica_por_practicaId($practicaId, $data_practica);

    $estudiante_id = $this->Practica_Model->get_practica($practicaId)['alumnoId'];
    $this->load->model('coordinador/Estudiante_Model');
    $estudiante = $this->Estudiante_Model->get_estudiante_por_id($estudiante_id);


    $this->enviar_correo_rechazo($estudiante, $descripcion_rechazo);

    $this->session->set_flashdata('mensaje', '¡Práctica Rechazada exitosamente!');
    redirect('coord/ver_postulaciones');
  }

  public function regresar_sin_accion_practica($practicaId)
  {
    $fecha_evaluacion =  date('Y-m-d');
    $this->load->model('coordinador/Practica_Model');
    $this->Practica_Model->actualizar_estado_practica($practicaId, "Sin Acción", $fecha_evaluacion);
    $this->Practica_Model->update_practica_por_practicaId($practicaId, $data = array("descripcion_estado" => null));
    $this->session->set_flashdata('mensaje', '¡Práctica dejada Sin Acción exitosamente!');
    redirect('coord/ver_postulaciones/evaluaciones');
  }

  //public function evaluacion_practica($practicaId)
  public function evaluacion_practica()
  {
    $practicaId = $this->input->post('practica-id');
    $data['practicaId'] = $practicaId;
    $this->load->model('coordinador/Practica_Model');
    $data['datos_practica'] = $this->Practica_Model->get_practica($practicaId);
    $this->load->model('coordinador/Supervisor_Model');
    $data['datos_supervisor'] = $this->Supervisor_Model->get_supervisor($data['datos_practica']['supervisorId']);
    $this->load->model('coordinador/Organismo_Model');
    $data['datos_organismo'] = $this->Organismo_Model->get_organismo($data['datos_practica']['organismoId']);
    $this->load->model('coordinador/Estudiante_Model');
    $data['datos_estudiante'] = $this->Estudiante_Model->get_estudiante_por_id($data['datos_practica']['alumnoId']);



    //$this->load->model('coordinador/Notas_Model');
    //$data['row_notas'] = $this->Notas_Model->get_notas($data['datos_practica']['notasId']);

    $this->load->view('coordinador/evaluar_practica', $data);
  }

  public function editar_evaluacion_practica()
  {
    $practicaId = $this->input->post('practica-id');
    $data['practicaId'] = $practicaId;
    $this->load->model('coordinador/Practica_Model');
    $data['datos_practica'] = $this->Practica_Model->get_practica($practicaId);

    if ($data['datos_practica']['ocasion'] == "Primera") {
      $this->load->model('coordinador/Formulario_Model');
      $this->load->model('coordinador/Evaluacion_Model');
      $cnt_ASa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($data['datos_practica']['alumnoId'], "Primera", "Aceptada");
      $cnt_AA = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($data['datos_practica']['alumnoId'], "Primera", "Aceptada", "Aprobada");
      $cnt_Sa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($data['datos_practica']['alumnoId'], "Primera", "Sin Acción");
    } elseif ($data['datos_practica']['ocasion'] == "Segunda") {
      $this->load->model('coordinador/Formulario_Model');
      $this->load->model('coordinador/Evaluacion_Model');
      $cnt_ASa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($data['datos_practica']['alumnoId'], "Segunda", "Aceptada");
      $cnt_AA = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($data['datos_practica']['alumnoId'], "Segunda", "Aceptada", "Aprobada");
      $cnt_Sa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($data['datos_practica']['alumnoId'], "Segunda", "Sin Acción");
    }

    $evaluacion = $this->Evaluacion_Model->get_evaluacion($data['datos_practica']['evaluacionId'])['evaluacion'];
    if ($evaluacion == "Aprobada") {
      $situacion = "";
      if ($cnt_ASa > 0 || !$cnt_AA == 1 || $cnt_Sa > 0) {
        if ($cnt_ASa > 0) {
          $situacion .= "Aceptada Sin Evaluar -";
        }
        if ($cnt_AA > 0) {
          $situacion .= "Aceptada Aprobada -";
        }
        if ($cnt_Sa > 0) {
          $situacion .= " Sin Acción -";
        }

        $this->session->set_flashdata('mensaje', 'El/La estudiante ya poosee una nueva postulación a la práctica en ocasión: <strong>' . $data['datos_practica']['ocasion'] . '</strong> - ' . $situacion . ', por lo que no puede editar la evaluación.');
        redirect('coord/ver_postulaciones/evaluaciones');
      } else {
        $this->load->model('coordinador/Supervisor_Model');
        $data['datos_supervisor'] = $this->Supervisor_Model->get_supervisor($data['datos_practica']['supervisorId']);
        $this->load->model('coordinador/Organismo_Model');
        $data['datos_organismo'] = $this->Organismo_Model->get_organismo($data['datos_practica']['organismoId']);
        $this->load->model('coordinador/Estudiante_Model');
        $data['datos_estudiante'] = $this->Estudiante_Model->get_estudiante_por_id($data['datos_practica']['alumnoId']);
        $this->load->model('coordinador/Evaluacion_Model');
        $data['datos_evaluacion'] = $this->Evaluacion_Model->get_evaluacion($data['datos_practica']['evaluacionId']);
        $this->load->model('coordinador/Notas_Model');
        $data['datos_notas'] = $this->Notas_Model->get_notas($data['datos_evaluacion']['notasId']);
        $this->load->view('coordinador/editar_evaluacion_practica', $data);
      }
    } elseif ($evaluacion == "Reprobada") {
      $situacion = "";
      if ($cnt_ASa > 0 || $cnt_AA > 0 || $cnt_Sa > 0) {
        if ($cnt_ASa > 0) {
          $situacion .= "Aceptada Sin Evaluar -";
        }
        if ($cnt_AA > 0) {
          $situacion .= "Aceptada Aprobada -";
        }
        if ($cnt_Sa > 0) {
          $situacion .= " Sin Acción -";
        }

        $this->session->set_flashdata('mensaje', 'El/La estudiante ya poosee una nueva postulación a la práctica en ocasión: <strong>' . $data['datos_practica']['ocasion'] . '</strong> - ' . $situacion . ', por lo que no puede editar la evaluación.');
        redirect('coord/ver_postulaciones/evaluaciones');
      } else {
        $this->load->model('coordinador/Supervisor_Model');
        $data['datos_supervisor'] = $this->Supervisor_Model->get_supervisor($data['datos_practica']['supervisorId']);
        $this->load->model('coordinador/Organismo_Model');
        $data['datos_organismo'] = $this->Organismo_Model->get_organismo($data['datos_practica']['organismoId']);
        $this->load->model('coordinador/Estudiante_Model');
        $data['datos_estudiante'] = $this->Estudiante_Model->get_estudiante_por_id($data['datos_practica']['alumnoId']);
        $this->load->model('coordinador/Evaluacion_Model');
        $data['datos_evaluacion'] = $this->Evaluacion_Model->get_evaluacion($data['datos_practica']['evaluacionId']);
        $this->load->model('coordinador/Notas_Model');
        $data['datos_notas'] = $this->Notas_Model->get_notas($data['datos_evaluacion']['notasId']);
        $this->load->view('coordinador/editar_evaluacion_practica', $data);
      }
    }
  }




  public function evaluar_practica($practicaId)
  {
    if ($_POST) {
      // Notas
      $nota_uno = $this->input->post('nota_uno');
      $nota_dos = $this->input->post('nota_dos');
      $nota_tres = $this->input->post('nota_tres');
      $nota_cuatro = $this->input->post('nota_cuatro');
      $nota_cinco = $this->input->post('nota_cinco');
      $nota_seis = $this->input->post('nota_seis');
      $nota_siete = $this->input->post('nota_siete');
      $nota_ocho = $this->input->post('nota_ocho');
      $nota_nueve = $this->input->post('nota_nueve');
      $nota_diez = $this->input->post('nota_diez');
      $nota_once = $this->input->post('nota_once');
      $nota_doce = $this->input->post('nota_doce');
      $nota_trece = $this->input->post('nota_trece');
      $nota_promedio = $this->input->post('nota_promedio');
      $supervisor_evaluador = $this->input->post('supervisor_evaluador');
      $supervisor_evaluador_correo = $this->input->post('supervisor_evaluador_correo');
      $observaciones = $this->input->post('observaciones');
      $horas_practica = $this->input->post('horas_practica');

      $dataNotas = array(
        'nota_uno' => $nota_uno,
        'nota_dos' => $nota_dos,
        'nota_tres' => $nota_tres,
        'nota_cuatro' => $nota_cuatro,
        'nota_cinco' => $nota_cinco,
        'nota_seis' => $nota_seis,
        'nota_siete' => $nota_siete,
        'nota_ocho' => $nota_ocho,
        'nota_nueve' => $nota_nueve,
        'nota_diez' => $nota_diez,
        'nota_once' => $nota_once,
        'nota_doce' => $nota_doce,
        'nota_trece' => $nota_trece,
        'nota_promedio' => $nota_promedio,
        'supervisor_evaluador' => $supervisor_evaluador,
        'supervisor_evaluador_correo' => $supervisor_evaluador_correo,
        'observaciones' =>  $observaciones
      );

      /* GUARDAR DATOS EN BD */

      $this->load->model('coordinador/Notas_Model');
      $notasId = $this->Notas_Model->crear_notas($dataNotas);

      $evaluacion = "";
      ($nota_promedio >= 4.000) ? $evaluacion = "Aprobada" : $evaluacion = "Reprobada";
      $fecha_evaluacion = date("Y-m-d");

      $dataEvaluacion = array(
        'notasId' => $notasId,
        'evaluacion' => $evaluacion,
        'fecha_evaluacion' => $fecha_evaluacion
      );
      $this->load->model('coordinador/Evaluacion_Model');
      $evaluacionId = $this->Evaluacion_Model->crear_evaluacion($dataEvaluacion);

      $dataPractica = array(
        'evaluacionId' => $evaluacionId,
        'horas_practica' => $horas_practica
      );

      $this->load->model('coordinador/Practica_Model');
      $notasId = $this->Practica_Model->update_practica_por_practicaId($practicaId, $dataPractica);

      if ($notasId > 0 && $evaluacionId > 0) {

        $this->session->set_flashdata('mensaje', '¡Evaluación realizada exitosamente!');
        redirect('coord/ver_postulaciones/evaluaciones');
      } else {
        $this->session->set_flashdata('mensaje', 'Ocurrió un problema al evaluar la práctica, contacte al administrador del sistema.');
        redirect('coord/ver_postulaciones/evaluaciones');
      }

      echo '<script language="javascript"> document.formulario.submit(); </script>';
    }
  }

  public function actualizar_practica($practicaId)
  {
    if ($_POST) {
      // Notas
      $nota_uno = $this->input->post('nota_uno');
      $nota_dos = $this->input->post('nota_dos');
      $nota_tres = $this->input->post('nota_tres');
      $nota_cuatro = $this->input->post('nota_cuatro');
      $nota_cinco = $this->input->post('nota_cinco');
      $nota_seis = $this->input->post('nota_seis');
      $nota_siete = $this->input->post('nota_siete');
      $nota_ocho = $this->input->post('nota_ocho');
      $nota_nueve = $this->input->post('nota_nueve');
      $nota_diez = $this->input->post('nota_diez');
      $nota_once = $this->input->post('nota_once');
      $nota_doce = $this->input->post('nota_doce');
      $nota_trece = $this->input->post('nota_trece');
      $nota_promedio = $this->input->post('nota_promedio');
      $supervisor_evaluador = $this->input->post('supervisor_evaluador');
      $supervisor_evaluador_correo = $this->input->post('supervisor_evaluador_correo');
      $observaciones = $this->input->post('observaciones');
      $horas_practica = $this->input->post('horas_practica');

      $dataNotas = array(
        'nota_uno' => $nota_uno,
        'nota_dos' => $nota_dos,
        'nota_tres' => $nota_tres,
        'nota_cuatro' => $nota_cuatro,
        'nota_cinco' => $nota_cinco,
        'nota_seis' => $nota_seis,
        'nota_siete' => $nota_siete,
        'nota_ocho' => $nota_ocho,
        'nota_nueve' => $nota_nueve,
        'nota_diez' => $nota_diez,
        'nota_once' => $nota_once,
        'nota_doce' => $nota_doce,
        'nota_trece' => $nota_trece,
        'nota_promedio' => $nota_promedio,
        'supervisor_evaluador' => $supervisor_evaluador,
        'supervisor_evaluador_correo' => $supervisor_evaluador_correo,
        'observaciones' =>  $observaciones
      );

      /* GUARDAR DATOS EN BD */
      $this->load->model('coordinador/Practica_Model');
      $evaluacionId = $this->Practica_Model->get_practica($practicaId)['evaluacionId'];
      $this->load->model('coordinador/Evaluacion_Model');
      $notasId = $this->Evaluacion_Model->get_evaluacion($evaluacionId)['notasId'];

      $this->load->model('coordinador/Notas_Model');
      $this->Notas_Model->update_notas($notasId, $dataNotas);

      $evaluacion = "";
      ($nota_promedio >= 4.000) ? $evaluacion = "Aprobada" : $evaluacion = "Reprobada";
      $fecha_evaluacion = date("Y-m-d");


      $dataEvaluacion = array(
        'evaluacion' => $evaluacion,
        'fecha_evaluacion' => $fecha_evaluacion
      );

      $evaluacionId = $this->Evaluacion_Model->update_evaluacion($evaluacionId, $dataEvaluacion);

      $dataPractica = array(
        'horas_practica' => $horas_practica
      );

      $this->Practica_Model->update_practica_por_practicaId($practicaId, $dataPractica);

      if ($notasId > 0 && $evaluacionId > 0) {

        $this->session->set_flashdata('mensaje', '¡Evaluación Modificada exitosamente!');
        redirect('coord/ver_postulaciones/evaluaciones');
      } else {
        $this->session->set_flashdata('mensaje', 'Ocurrió un problema al evaluar la práctica, contacte al administrador del sistema.');
        redirect('coord/ver_postulaciones/evaluaciones');
      }

      echo '<script language="javascript"> document.formulario.submit(); </script>';
    }
  }


  private function enviar_correo($estudiante, $enlace, $comentarios)
  {
    $this->load->library('email');
    $config['protocol'] = 'smtp';
    $config["smtp_host"] = 'practicas.administracionpublica-uv.cl';
    $config['smtp_crypto'] = 'ssl';
    $config["smtp_user"] = 'no-reply@administracionpublica-uv.cl';
    $config["smtp_pass"] = 'WBkF}(QJ@Ter';
    $config["smtp_port"] = '465';
    $config['mailtype'] = 'html';
    $config['charset'] = "utf-8";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas');

    /*
          * Ponemos el o los destinatarios para los que va el email
          * en este caso al ser un formulario de contacto te lo enviarás a ti
          * mismo
          */
    $this->email->to($estudiante['correo_institucional'], $estudiante['primer_nombre'] . " " . $estudiante['apellido_paterno'] . " " . $estudiante['apellido_materno']);

    //Definimos el asunto del mensaje
    $this->email->subject("Aceptación de práctica");

 
    $data['titulo'] = 'Su solicitud de práctica ha sido aceptada';
    $data['contenido_mensaje'] = 'Estimado(a) <strong>' . $estudiante['primer_nombre'] . ': </strong><br><br>';
    $data['contenido_mensaje'] .= 'Le notificamos que ha sido aceptada su solicitud mediante el formulario de práctica profesional.<br>Prontamente, le haremos llegar el documento solicitado.<br><br>Saludos cordiales.<br><br>Coordinador(a) de Prácticas Profesionales. <br></p><br><br>Comentarios: '.$comentarios  ;


    //Definimos el mensaje a enviar
    $this->email->message($this->load->view('correo_support', $data, TRUE));
    $this->email->attach($enlace);
    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      show_error($this->email->print_debugger());
      return false;
    }
  }

  private function enviar_correo_rechazo($estudiante, $comentarios)
  {
    $this->load->library('email');
    $config['protocol'] = 'smtp';
    $config["smtp_host"] = 'practicas.administracionpublica-uv.cl';
    $config['smtp_crypto'] = 'ssl';
    $config["smtp_user"] = 'no-reply@administracionpublica-uv.cl';
    $config["smtp_pass"] = 'WBkF}(QJ@Ter';
    $config["smtp_port"] = '465';
    $config['mailtype'] = 'html';
    $config['charset'] = "utf-8";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas');

    /*
          * Ponemos el o los destinatarios para los que va el email
          * en este caso al ser un formulario de contacto te lo enviarás a ti
          * mismo
          */
    $this->email->to($estudiante['correo_institucional'], $estudiante['primer_nombre'] . " " . $estudiante['apellido_paterno'] . " " . $estudiante['apellido_materno']);

    //Definimos el asunto del mensaje
    $this->email->subject("Rechazo de práctica");


    $data['titulo'] = 'Su solicitud de práctica ha sido rechazada';
    $data['contenido_mensaje'] = 'Estimado(a) <strong>' . $estudiante['primer_nombre'] . ': </strong><br><br>';
    $data['contenido_mensaje'] .= 'Le notificamos que ha sido rechazada su solicitud mediante el formulario de práctica profesional.<br>Contacte a su coordinador(a) de prácticas para verificar su situación.<br><br>Coordinador(a) de Prácticas Profesionales. <br></p><br><br>Comentarios: '.$comentarios ;


    //Definimos el mensaje a enviar
    $this->email->message($this->load->view('correo_support', $data, TRUE));

    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      show_error($this->email->print_debugger());
      return false;
    }
  }
}
