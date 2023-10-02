<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Formulario_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 3) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("practicas");
    }
  }

  public function index_primera()
  {
    $this->load->model('RegionComunaHelperModel');
    $data['regiones'] = $this->RegionComunaHelperModel->getRegiones();
    $data['ocasion'] = "Primera";
    $this->load->model('practicas/Formulario_Model');
    $this->load->model('practicas/Evaluacion_Model');
    $cnt_PASa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Primera", "Aceptada");
    $cnt_PAA = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Primera", "Aceptada", "Aprobada");
    $cnt_PSa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Primera", "Sin Acción");

    if ($cnt_PASa > 0 || $cnt_PAA > 0 || $cnt_PSa > 0) {
      $this->session->set_flashdata('mensaje', 'Ya posee una postulación para la primera práctica');
      redirect('practicas/principal');
    } else {
      $this->load->view('practicas/formulario', $data);
    }
  }

  public function index_segunda()
  {
    $this->load->model('RegionComunaHelperModel');
    $data['regiones'] = $this->RegionComunaHelperModel->getRegiones();
    $data['ocasion'] = "Segunda";
    $this->load->model('practicas/Formulario_Model');
    $this->load->model('practicas/Evaluacion_Model');

    $cnt_SASa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Segunda", "Aceptada");
    $cnt_SAA = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Segunda", "Aceptada", "Aprobada");
    $cnt_SSa = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Segunda", "Sin Acción");

    if ($cnt_SASa > 0 || $cnt_SAA > 0 || $cnt_SSa > 0) {
      $this->session->set_flashdata('mensaje', 'Ya posee una postulación para la primera práctica');
      redirect('practicas/principal');
    } else {

      $this->load->view('practicas/formulario', $data);
    }
  }



  public function cargarComunas()
  {

    $id_region = $this->input->post('id_region');
    $run = $this->input->post('run');
    $this->load->model('RegionComunaHelperModel');
    //$data['comunas'] = $this->RegionComunaHelperModel->getComunasByRegion($id_region);
    $res = $this->RegionComunaHelperModel->getComunasByRegion($id_region);
    /*
        $html= "<option value='0'> - Seleccione Comuna - </option>";
        foreach ($res as $comuna) {
        
            $html.= "<option value='".$comuna['id']."'>".$comuna['nombre']."</option>";
        }
        
        echo $html;
        */
    echo json_encode($res);
  }

  public function crear()
  {
    ignore_user_abort(true);
    if ($_POST) {

      /* Seccion "Datos del alumno" */
      $this->load->model('practicas/Estudiante_Model');
      $estudiante = $this->Estudiante_Model->get_estudiante($this->session->userdata('id'));
      $practica = $this->input->post('ocasion_practica');
      $practica_homologacion = $this->input->post('practica_homologacion');
      $practica_homologacion = ($practica_homologacion != NULL) ? $practica_homologacion : "0";
      $sexo = $this->input->post('sexo');

      /* FIN Seccion "Datos del alumno" */

      /* Seccion "Datos del organismo" */
      $nombre_organismo = trim($this->input->post('nombre_organismo'));
      $nombre_supervisor = trim($this->input->post('nombre_supervisor'));
      $cargo_supervisor = trim($this->input->post('cargo_supervisor'));
      $correo_supervisor = trim($this->input->post('correo_supervisor'));
      $division_departamento = trim($this->input->post('division_departamento'));
      $seccion_unidad = trim($this->input->post('seccion_unidad'));
      $direccion_organismo = trim($this->input->post('direccion_organismo'));
      $telefono_organismo = trim($this->input->post('telefono_organismo'));
      $regionId = trim($this->input->post('region'));
      $comunaId = trim($this->input->post('comuna'));

      /* FIN Seccion "Datos del organismo" */

      /* Seccion Jornada de práctica profesional */
      $fecha_inicio = $this->input->post('fecha_inicio');
      $fecha_termino = $this->input->post('fecha_termino');
      // Lunes - mañana
      $hora_lunes_manana_entrada = $this->input->post('hora_lunes_manana_entrada');
      $hora_lunes_manana_salida = $this->input->post('hora_lunes_manana_salida');
      // Lunes - tarde 
      $hora_lunes_tarde_entrada = $this->input->post('hora_lunes_tarde_entrada');
      $hora_lunes_tarde_salida = $this->input->post('hora_lunes_tarde_salida');
      $total_horas_lunes = $this->input->post('total_horas_lunes');
      // Martes - mañana
      $hora_martes_manana_entrada = $this->input->post('hora_martes_manana_entrada');
      $hora_martes_manana_salida = $this->input->post('hora_martes_manana_salida');
      // Martes - tarde 
      $hora_martes_tarde_entrada = $this->input->post('hora_martes_tarde_entrada');
      $hora_martes_tarde_salida = $this->input->post('hora_martes_tarde_salida');
      $total_horas_martes = $this->input->post('total_horas_martes');
      // Miercoles - mañana
      $hora_miercoles_manana_entrada = $this->input->post('hora_miercoles_manana_entrada');
      $hora_miercoles_manana_salida = $this->input->post('hora_miercoles_manana_salida');
      // Miercoles - tarde
      $hora_miercoles_tarde_entrada = $this->input->post('hora_miercoles_tarde_entrada');
      $hora_miercoles_tarde_salida = $this->input->post('hora_miercoles_tarde_salida');
      $total_horas_miercoles = $this->input->post('total_horas_miercoles');
      // Jueves - mañana
      $hora_jueves_manana_entrada = $this->input->post('hora_jueves_manana_entrada');
      $hora_jueves_manana_salida = $this->input->post('hora_jueves_manana_salida');
      // Jueves - tarde
      $hora_jueves_tarde_entrada = $this->input->post('hora_jueves_tarde_entrada');
      $hora_jueves_tarde_salida = $this->input->post('hora_jueves_tarde_salida');
      $total_horas_jueves = $this->input->post('total_horas_jueves');
      // Viernes - mañana
      $hora_viernes_manana_entrada = $this->input->post('hora_viernes_manana_entrada');
      $hora_viernes_manana_salida = $this->input->post('hora_viernes_manana_salida');
      // Viernes - tarde 
      $hora_viernes_tarde_entrada = $this->input->post('hora_viernes_tarde_entrada');
      $hora_viernes_tarde_salida = $this->input->post('hora_viernes_tarde_salida');
      $total_horas_viernes = $this->input->post('total_horas_viernes');
      $total_horas_semanales = $this->input->post('total_horas_semanales');
      /* FIN Seccion Jornada de práctica profesional */

      /* Seccion Descripcion */
      //$descripcion = $this->input->post('descripcion');
      $descripcion = trim($this->input->post('descripcion'));
      /* FIN Seccion Descripcion */


      /** Inserta Organismo */
      $dataOrganismo = array(
        'nombre_organismo' => $nombre_organismo,
        'direccion' => $direccion_organismo,
        'regionId' => $regionId,
        'otraRegion' => " ",
        'comunaId' => $comunaId,
        'otraComuna' => " ",
        'telefono' => $telefono_organismo,
        'division_departamento' => $division_departamento,
        'seccion_unidad' => $seccion_unidad
      );

      $this->load->model('practicas/Organismo_Model');
      $resultado = $this->Organismo_Model->crear_organismo($dataOrganismo);

      if ($resultado > 0) {
        $organismoId = $resultado;

        /** Inserta Supervisor */
        $dataSupervisor = array(
          'nombre' => $nombre_supervisor,
          'cargo' => $cargo_supervisor,
          'correo' => $correo_supervisor
        );
        $this->load->model('practicas/Supervisor_Model');
        $resultado = $this->Supervisor_Model->crear_supervisor($dataSupervisor);

        if ($resultado > 0) {
          $supervisorId = $resultado;



          /** Ingreso de Practica en BD */
          $this->load->model('practicas/Practica_Model');

          $dataPractica = array(
            'alumnoId' => $estudiante['id'],
            'organismoId' => $organismoId,
            'supervisorId' => $supervisorId,
            'ocasion' => $practica,
            'fecha_inicio' => $fecha_inicio,
            'fecha_termino' => $fecha_termino,
            'descripcion' => $descripcion,
            'homologacion' => $practica_homologacion,
            'horas_practica' => $total_horas_semanales
          );


          $resultado = $this->Practica_Model->crear_practica($dataPractica);
          if ($resultado > 0) {
            $practicaId = $resultado;


            if ($resultado > 0) {
              /** Inserta Horario */
              $this->load->model('practicas/Horario_Model');
              /** INSERTA LUNES */
              /* if($hora_lunes_manana_entrada == ""){$hora_lunes_manana_entrada = 'NULL';}
                                if($hora_lunes_manana_salida == ""){$hora_lunes_manana_salida = 'NULL';}
                                if($hora_lunes_tarde_entrada == ""){$hora_lunes_tarde_entrada = 'NULL';}
                                if($hora_lunes_tarde_salida == ""){$hora_lunes_tarde_salida = 'NULL';} */
              $dataHorario = array(
                'practicaId' => $practicaId,
                'dia' => "Lunes",
                'hora_manana_entrada' => $hora_lunes_manana_entrada,
                'hora_manana_salida' => $hora_lunes_manana_salida,
                'hora_tarde_entrada' => $hora_lunes_tarde_entrada,
                'hora_tarde_salida' => $hora_lunes_tarde_salida
              );
              $lunes = $this->Horario_Model->crear_horario($dataHorario);

              /** INSERTA MARTES */
              /* if($hora_martes_manana_entrada == ""){$hora_martes_manana_entrada = 'NULL';}
                                if($hora_martes_manana_salida == ""){$hora_martes_manana_salida = 'NULL';}
                                if($hora_martes_tarde_entrada == ""){$hora_martes_tarde_entrada = 'NULL';}
                                if($hora_martes_tarde_salida == ""){$hora_martes_tarde_salida = 'NULL';} */
              $dataHorario = array(
                'practicaId' => $practicaId,
                'dia' => "Martes",
                'hora_manana_entrada' => $hora_martes_manana_entrada,
                'hora_manana_salida' => $hora_martes_manana_salida,
                'hora_tarde_entrada' => $hora_martes_tarde_entrada,
                'hora_tarde_salida' => $hora_martes_tarde_salida
              );
              $martes = $this->Horario_Model->crear_horario($dataHorario);

              /** INSERTA MIERCOLES */
              /* if($hora_miercoles_manana_entrada == ""){$hora_miercoles_manana_entrada = 'NULL';}
                                if($hora_miercoles_manana_salida == ""){$hora_miercoles_manana_salida = 'NULL';}
                                if($hora_miercoles_tarde_entrada == ""){$hora_miercoles_tarde_entrada = 'NULL';}
                                if($hora_miercoles_tarde_salida == ""){$hora_miercoles_tarde_salida = 'NULL';} */
              $dataHorario = array(
                'practicaId' => $practicaId,
                'dia' => "Miercoles",
                'hora_manana_entrada' => $hora_miercoles_manana_entrada,
                'hora_manana_salida' => $hora_miercoles_manana_salida,
                'hora_tarde_entrada' => $hora_miercoles_tarde_entrada,
                'hora_tarde_salida' => $hora_miercoles_tarde_salida
              );
              $miercoles = $this->Horario_Model->crear_horario($dataHorario);

              /** INSERTA JUEVES */
              /* if($hora_jueves_manana_entrada == ""){$hora_jueves_manana_entrada = 'NULL';}
                                if($hora_jueves_manana_salida == ""){$hora_jueves_manana_salida = 'NULL';}
                                if($hora_jueves_tarde_entrada == ""){$hora_jueves_tarde_entrada = 'NULL';}
                                if($hora_jueves_tarde_salida == ""){$hora_jueves_tarde_salida = 'NULL';} */
              $dataHorario = array(
                'practicaId' => $practicaId,
                'dia' => "Jueves",
                'hora_manana_entrada' => $hora_jueves_manana_entrada,
                'hora_manana_salida' => $hora_jueves_manana_salida,
                'hora_tarde_entrada' => $hora_jueves_tarde_entrada,
                'hora_tarde_salida' => $hora_jueves_tarde_salida
              );
              $jueves = $this->Horario_Model->crear_horario($dataHorario);

              /** INSERTA VIERNES */
              /* if($hora_viernes_manana_entrada == ""){$hora_viernes_manana_entrada = 'NULL';}
                                if($hora_viernes_manana_salida == ""){$hora_viernes_manana_salida = 'NULL';}
                                if($hora_viernes_tarde_entrada == ""){$hora_viernes_tarde_entrada = 'NULL';}
                                if($hora_viernes_tarde_salida == ""){$hora_viernes_tarde_salida = 'NULL';} */
              $dataHorario = array(
                'practicaId' => $practicaId,
                'dia' => "Viernes",
                'hora_manana_entrada' => $hora_viernes_manana_entrada,
                'hora_manana_salida' => $hora_viernes_manana_salida,
                'hora_tarde_entrada' => $hora_viernes_tarde_entrada,
                'hora_tarde_salida' => $hora_viernes_tarde_salida
              );
              $viernes = $this->Horario_Model->crear_horario($dataHorario);

              // FALTA VERIFICAR TRUE TODOS LOS DÏAS

              /* Lunes */
              if ($hora_lunes_manana_salida == "" && $hora_lunes_tarde_entrada == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Lunes" AND practicaId = ' . $practicaId);
              } else if ($hora_lunes_tarde_entrada == "" && $hora_lunes_tarde_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_manana_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Lunes" AND practicaId = ' . $practicaId);
              } else if ($hora_lunes_manana_entrada == "" && $hora_lunes_manana_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_tarde_entrada) as total_hora_dia FROM horario WHERE dia = "Lunes" AND practicaId = ' . $practicaId);
              } else {
                $result = $this->db->query('SELECT SEC_TO_TIME(time_to_sec(timediff(hora_manana_salida, hora_manana_entrada)+timediff(hora_tarde_salida, hora_tarde_entrada))) as total_hora_dia
                                                            FROM horario WHERE dia = "Lunes" AND practicaId = ' . $practicaId);
              }

              $row = $result->row_array();
              $total_horas_lunes = substr($row['total_hora_dia'], 0, -3);
              if (substr($total_horas_lunes, 0, 1) === '-') {
                $total_horas_lunes = substr($total_horas_lunes, 1, 5);
              }

              /* Martes */
              if ($hora_martes_manana_salida == "" && $hora_martes_tarde_entrada == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Martes" AND practicaId = ' . $practicaId);
              } else if ($hora_martes_tarde_entrada == "" && $hora_martes_tarde_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_manana_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Martes" AND practicaId = ' . $practicaId);
              } else if ($hora_martes_manana_entrada == "" && $hora_martes_manana_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_tarde_entrada) as total_hora_dia FROM horario WHERE dia = "Martes" AND practicaId = ' . $practicaId);
              } else {
                $result = $this->db->query('SELECT SEC_TO_TIME(time_to_sec(timediff(hora_manana_salida, hora_manana_entrada)+timediff(hora_tarde_salida, hora_tarde_entrada))) as total_hora_dia
                                                            FROM horario WHERE dia = "Martes" AND practicaId = ' . $practicaId);
              }

              $row = $result->row_array();
              $total_horas_martes = substr($row['total_hora_dia'], 0, -3);
              if (substr($total_horas_martes, 0, 1) === '-') {
                $total_horas_martes = substr($total_horas_martes, 1, 5);
              }

              /* Miercoles */
              if ($hora_miercoles_manana_salida == "" && $hora_miercoles_tarde_entrada == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Miercoles" AND practicaId = ' . $practicaId);
              } else if ($hora_miercoles_tarde_entrada == "" && $hora_miercoles_tarde_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_manana_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Miercoles" AND practicaId = ' . $practicaId);
              } else if ($hora_miercoles_manana_entrada == "" && $hora_miercoles_manana_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_tarde_entrada) as total_hora_dia FROM horario WHERE dia = "Miercoles" AND practicaId = ' . $practicaId);
              } else {
                $result = $this->db->query('SELECT SEC_TO_TIME(time_to_sec(timediff(hora_manana_salida, hora_manana_entrada)+timediff(hora_tarde_salida, hora_tarde_entrada))) as total_hora_dia
                                                            FROM horario WHERE dia = "Miercoles" AND practicaId = ' . $practicaId);
              }

              $row = $result->row_array();
              $total_horas_miercoles = substr($row['total_hora_dia'], 0, -3);
              if (substr($total_horas_miercoles, 0, 1) === '-') {
                $total_horas_miercoles = substr($total_horas_miercoles, 1, 5);
              }

              /* Jueves */
              if ($hora_jueves_manana_salida == "" && $hora_jueves_tarde_entrada == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Jueves" AND practicaId = ' . $practicaId);
              } else if ($hora_jueves_tarde_entrada == "" && $hora_jueves_tarde_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_manana_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Jueves" AND practicaId = ' . $practicaId);
              } else if ($hora_jueves_manana_entrada == "" && $hora_jueves_manana_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_tarde_entrada) as total_hora_dia FROM horario WHERE dia = "Jueves" AND practicaId = ' . $practicaId);
              } else {
                $result = $this->db->query('SELECT SEC_TO_TIME(time_to_sec(timediff(hora_manana_salida, hora_manana_entrada)+timediff(hora_tarde_salida, hora_tarde_entrada))) as total_hora_dia
                                                            FROM horario WHERE dia = "Jueves" AND practicaId = ' . $practicaId);
              }

              $row = $result->row_array();
              $total_horas_jueves = substr($row['total_hora_dia'], 0, -3);
              if (substr($total_horas_jueves, 0, 1) === '-') {
                $total_horas_jueves = substr($total_horas_jueves, 1, 5);
              }

              /* Viernes */
              if ($hora_viernes_manana_salida == "" && $hora_viernes_tarde_entrada == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Viernes" AND practicaId = ' . $practicaId);
              } else if ($hora_viernes_tarde_entrada == "" && $hora_viernes_tarde_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_manana_salida, hora_manana_entrada) as total_hora_dia FROM horario WHERE dia = "Viernes" AND practicaId = ' . $practicaId);
              } else if ($hora_viernes_manana_entrada == "" && $hora_viernes_manana_salida == "") {
                $result = $this->db->query('SELECT timediff(hora_tarde_salida, hora_tarde_entrada) as total_hora_dia FROM horario WHERE dia = "Viernes" AND practicaId = ' . $practicaId);
              } else {
                $result = $this->db->query('SELECT SEC_TO_TIME(time_to_sec(timediff(hora_manana_salida, hora_manana_entrada)+timediff(hora_tarde_salida, hora_tarde_entrada))) as total_hora_dia
                                                            FROM horario WHERE dia = "Viernes" AND practicaId = ' . $practicaId);
              }

              $row = $result->row_array();
              $total_horas_viernes = substr($row['total_hora_dia'], 0, -3);
              if (substr($total_horas_viernes, 0, 1) === '-') {
                $total_horas_viernes = substr($total_horas_viernes, 1, 5);
              }
            }
          } else {
            $this->session->set_flashdata('error', '¡Error al ingresar datos! Ya posee dos postulaciones o una postulación aceptada. Verifique sus postulaciones con el/la coordinador/a');
            redirect('practicas/principal');
          }
        }
      }

      $this->load->model('RegionComunaHelperModel');

      $nombre_region = $this->RegionComunaHelperModel->getNombreRegionByRegionId($regionId);
      $nombre_region = $nombre_region['nombre'];
      $nombre_comuna = $this->RegionComunaHelperModel->getNombreComunaByRegionComunaId($regionId, $comunaId);
      $nombre_comuna = $nombre_comuna['nombre'];

      $archivo = $this->generar_docFormularioPractica(
        $estudiante['primer_nombre'],
        $estudiante['segundo_nombre'],
        $estudiante['apellido_paterno'],
        $estudiante['apellido_materno'],
        $estudiante['run'],
        $estudiante['df'],
        $estudiante['telefono'],
        $estudiante['correo_personal'],
        $estudiante['correo_institucional'],
        $estudiante['sede'],
        $estudiante['anio_ingreso'],
        $estudiante['ultimo_sem_aprobado'],
        $nombre_organismo,
        $direccion_organismo,
        $nombre_region,
        $nombre_comuna,
        $telefono_organismo,
        $division_departamento,
        $seccion_unidad,
        $nombre_supervisor,
        $cargo_supervisor,
        $correo_supervisor,
        $fecha_inicio,
        $fecha_termino,
        $hora_lunes_manana_entrada,
        $hora_lunes_manana_salida,
        $hora_lunes_tarde_entrada,
        $hora_lunes_tarde_salida,
        $total_horas_lunes,
        $hora_martes_manana_entrada,
        $hora_martes_manana_salida,
        $hora_martes_tarde_entrada,
        $hora_martes_tarde_salida,
        $total_horas_martes,
        $hora_miercoles_manana_entrada,
        $hora_miercoles_manana_salida,
        $hora_miercoles_tarde_entrada,
        $hora_miercoles_tarde_salida,
        $total_horas_miercoles,
        $hora_jueves_manana_entrada,
        $hora_jueves_manana_salida,
        $hora_jueves_tarde_entrada,
        $hora_jueves_tarde_salida,
        $total_horas_jueves,
        $hora_viernes_manana_entrada,
        $hora_viernes_manana_salida,
        $hora_viernes_tarde_entrada,
        $hora_viernes_tarde_salida,
        $total_horas_viernes,
        $total_horas_semanales,
        str_replace ("\r\n", "</w:t><w:br/><w:t>", $descripcion ),
        $practica,
        $sexo,
        $practica_homologacion
      );
      
      $data_nombre_archivo = array(
        'nombre_archivo' => $archivo['nombre']
      );
      $this->load->model('practicas/Formulario_Model');
      $this->Formulario_Model->actualizar_formulario($practicaId, $data_nombre_archivo);
      $this->enviar_correo($estudiante['correo_institucional'], $estudiante['primer_nombre'], $estudiante['apellido_paterno'], $estudiante['apellido_materno'], $estudiante['sede'], $estudiante['run'], $estudiante['df']);
      $this->session->set_flashdata('mensaje', '¡Datos de Formulario enviado exitosamente!');
      redirect('practicas/principal');
    }
  }

  private function generar_docFormularioPractica(
    $primer_nombre,
    $segundo_nombre,
    $apellido_paterno,
    $apellido_materno,
    $run,
    $df,
    $telefono,
    $correo_personal,
    $correo_institucional,
    $sede,
    $anio_ingreso,
    $ultimo_sem_aprobado,
    $nombre_organismo,
    $direccion_organismo,
    $nombre_region,
    $nombre_comuna,
    $telefono_organismo,
    $division_departamento,
    $seccion_unidad,
    $nombre_supervisor,
    $cargo_supervisor,
    $correo_supervisor,
    $fecha_inicio,
    $fecha_termino,
    $hora_lunes_manana_entrada,
    $hora_lunes_manana_salida,
    $hora_lunes_tarde_entrada,
    $hora_lunes_tarde_salida,
    $total_horas_lunes,
    $hora_martes_manana_entrada,
    $hora_martes_manana_salida,
    $hora_martes_tarde_entrada,
    $hora_martes_tarde_salida,
    $total_horas_martes,
    $hora_miercoles_manana_entrada,
    $hora_miercoles_manana_salida,
    $hora_miercoles_tarde_entrada,
    $hora_miercoles_tarde_salida,
    $total_horas_miercoles,
    $hora_jueves_manana_entrada,
    $hora_jueves_manana_salida,
    $hora_jueves_tarde_entrada,
    $hora_jueves_tarde_salida,
    $total_horas_jueves,
    $hora_viernes_manana_entrada,
    $hora_viernes_manana_salida,
    $hora_viernes_tarde_entrada,
    $hora_viernes_tarde_salida,
    $total_horas_viernes,
    $total_horas_semanales,
    $descripcion,
    $practica,
    $sexo,
    $practica_homologacion
  ) {

    ignore_user_abort(true);
    set_time_limit(0);
    /* Fecha */
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
    if ($mes == "September") $mes = "Setiembre";
    if ($mes == "October") $mes = "Octubre";
    if ($mes == "November") $mes = "Noviembre";
    if ($mes == "December") $mes = "Diciembre";

    $anio = date("Y");
    /*Comienza */
    $templateWord = new TemplateProcessor('./DocumentosPracticasApu/PlantillasWord/postulacion_plantilla.docx');

    $templateWord->setValue('dia', $dia);
    $templateWord->setValue('mes', $mes);
    $templateWord->setValue('anio', $anio);
    $templateWord->setValue('primer_nombre', mb_strtoupper($primer_nombre, 'utf-8'));
    $templateWord->setValue('segundo_nombre', mb_strtoupper($segundo_nombre, 'utf-8'));
    $templateWord->setValue('apellido_paterno', mb_strtoupper($apellido_paterno, 'utf-8'));
    $templateWord->setValue('apellido_materno', mb_strtoupper($apellido_materno, 'utf-8'));
    $templateWord->setValue('run', $run);
    $templateWord->setValue('df', $df);
    // Datos del Alumno - Contenido

    $templateWord->setValue('telefono', $telefono);
    $templateWord->setValue('correo_institucional', $correo_institucional);
    $templateWord->setValue('correo_personal', $correo_personal);
    $templateWord->setValue('sede', $sede);
    $templateWord->setValue('anio_ingreso', $anio_ingreso);
    $templateWord->setValue('ultimo_sem_aprobado', $ultimo_sem_aprobado);
    $templateWord->setValue('practica', $practica);
    if ($practica_homologacion == 1) {
      $templateWord->setValue('homologacion', "Sí");
    } else {
      $templateWord->setValue('homologacion', "No");
    }

    // Datos del organismo - Contenido
    $templateWord->setValue('nombre_organismo', mb_strtoupper($nombre_organismo));
    $templateWord->setValue('direccion_organismo', mb_strtoupper($direccion_organismo));
    $templateWord->setValue('division_departamento', mb_strtoupper($division_departamento));
    $templateWord->setValue('seccion_unidad', mb_strtoupper($seccion_unidad));
    $templateWord->setValue('nombre_supervisor', mb_strtoupper($nombre_supervisor));
    $templateWord->setValue('cargo_supervisor', mb_strtoupper($cargo_supervisor));
    $templateWord->setValue('correo_supervisor', mb_strtoupper($correo_supervisor));



    /* Jornada de práctica - Contenido*/

    $templateWord->setValue('fecha_inicio', date_format(new DateTime($fecha_inicio), 'd-m-Y'));
    $templateWord->setValue('fecha_termino', date_format(new DateTime($fecha_termino), 'd-m-Y'));

    // LUNES
    $templateWord->setValue('hora_lunes_manana_entrada', $hora_lunes_manana_entrada);
    $templateWord->setValue('hora_lunes_manana_salida', $hora_lunes_manana_salida);
    $templateWord->setValue('hora_lunes_tarde_entrada', $hora_lunes_tarde_entrada);
    $templateWord->setValue('hora_lunes_tarde_salida', $hora_lunes_tarde_salida);
    $templateWord->setValue('total_horas_lunes', $total_horas_lunes);



    // MARTES
    $templateWord->setValue('hora_martes_manana_entrada', $hora_martes_manana_entrada);
    $templateWord->setValue('hora_martes_manana_salida', $hora_martes_manana_salida);
    $templateWord->setValue('hora_martes_tarde_entrada', $hora_martes_tarde_entrada);
    $templateWord->setValue('hora_martes_tarde_salida', $hora_martes_tarde_salida);
    $templateWord->setValue('total_horas_martes', $total_horas_martes);



    //MIERCOLES
    $templateWord->setValue('hora_miercoles_manana_entrada', $hora_miercoles_manana_entrada);
    $templateWord->setValue('hora_miercoles_manana_salida', $hora_miercoles_manana_salida);
    $templateWord->setValue('hora_miercoles_tarde_entrada', $hora_miercoles_tarde_entrada);
    $templateWord->setValue('hora_miercoles_tarde_salida', $hora_miercoles_tarde_salida);
    $templateWord->setValue('total_horas_miercoles', $total_horas_miercoles);



    //JUEVES
    $templateWord->setValue('hora_jueves_manana_entrada', $hora_jueves_manana_entrada);
    $templateWord->setValue('hora_jueves_manana_salida', $hora_jueves_manana_salida);
    $templateWord->setValue('hora_jueves_tarde_entrada', $hora_jueves_tarde_entrada);
    $templateWord->setValue('hora_jueves_tarde_salida', $hora_jueves_tarde_salida);
    $templateWord->setValue('total_horas_jueves', $total_horas_jueves);


    //VIERNES
    $templateWord->setValue('hora_viernes_manana_entrada', $hora_viernes_manana_entrada);
    $templateWord->setValue('hora_viernes_manana_salida', $hora_viernes_manana_salida);
    $templateWord->setValue('hora_viernes_tarde_entrada', $hora_viernes_tarde_entrada);
    $templateWord->setValue('hora_viernes_tarde_salida', $hora_viernes_tarde_salida);
    $templateWord->setValue('total_horas_viernes', $total_horas_viernes);

    //TOTAL HORAS SEMANALES
    $templateWord->setValue('total_horas_semanales', $total_horas_semanales);


    // Descripción de las labores que realizará - Contenido
    $templateWord->setValue('descripcion', $descripcion);

    if ($sede == "Valparaíso") {
      $templateWord->setValue('piepagina', "Las Heras Nº 06 Valparaíso | Fono: (32) 250 7961- 2507815 | E-mail: practivasv@uv.cl, www.uv.cl");
    } else if ($sede == "Santiago") {
      $templateWord->setValue('piepagina', "Campus Santiago - Gran Avenida 4160, San Miguel | Fono +56 (2) 2329 2149");
    }


    //$carpeta = "../practica/postulacion/postulaciones/";
    //$carpeta = "./DocumentosPracticasApu/Postulaciones/";
    $carpeta = "./DocumentosPracticasApu/" . $run . "/";
    //$nom_archivo = "postulacion(" . $run . "_" . $practica . ").docx";
    $nom_archivo =  $run . "-postulacion(" . $practica . ").docx";

    $enlace = $carpeta . $nom_archivo;
    $contador = 0;
    while (is_file($enlace)) {
      $contador++;
      //$nom_archivo = "postulacion-" . $contador . "(" . $run . "_" . $practica . ").docx";
      $nom_archivo =  $run . "-postulacion-" . $contador . "-(" . $practica . ").docx";
      $enlace = $carpeta . $nom_archivo;
    }
    $templateWord->saveAs($enlace);

    $archivo = array(
      'carpeta' => $carpeta,
      'nombre' => $nom_archivo,
      'enlace' => $enlace
    );
    return $archivo;
  }


  private function enviar_correo($correo_estudiante, $primer_nombre, $apellido_paterno, $apellido_materno, $sede, $run, $df)
  {
    $this->load->library('email');
    $config['protocol'] = "mail";
    $config["smtp_host"] = 'practicas.administracionpublica-uv.cl';
    $config['smtp_crypto'] = 'ssl';
    $config["smtp_user"] = 'no-reply@administracionpublica-uv.cl';
    $config["smtp_pass"] = 'WBkF}(QJ@Ter';
    $config["smtp_port"] = '465';
    $config['mailtype'] = 'html';
    $config['charset'] = "utf-8";
    $config['newline'] = "\r\n";

    $this->email->initialize($config);
    $this->email->set_newline("\r\n");  

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas');

    /*
          * Ponemos el o los destinatarios para los que va el email
          * en este caso al ser un formulario de contacto te lo enviarás a ti
          * mismo
          */
    $this->email->to($correo_estudiante, $primer_nombre . " " . $apellido_paterno . " " . $apellido_materno);

    //Definimos el asunto del mensaje
    $this->email->subject("Notificación generación Formulario de Postulación");

    $htmlContent = '<h3>Has generado tu Formulario de Postulación satisfactoriamente</h3>';
    $htmlContent .= '<p>Estimado <strong>' . $primer_nombre . ': </strong><br><br>';
    $htmlContent .= 'Le notificamos que acaba de generar un Formulario de Postulación a su práctica profesional, a través del Sistema de postulación de prácticas.</p>';

    $data['titulo'] = 'Has generado tu Formulario de Postulación satisfactoriamente';
    $data['contenido_mensaje'] = 'Estimado(a) <strong>' . $primer_nombre . ': </strong><br><br>';
    $data['contenido_mensaje'] .= 'Le notificamos que acaba de generar un Formulario de Postulación a su práctica profesional, a través del Sistema de postulación de prácticas.<br>Prontamente, le haremos llegar el documento solicitado, de ser aceptada su solicitud.<br><br>Saludos cordiales.<br><br>Coordinador(a) de Prácticas Profesionales. <br></p>';


    //Definimos el mensaje a enviar
    $this->email->message($this->load->view('correo_support', $data, TRUE));

    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      show_error($this->email->print_debugger());
      return false;
    }

    $this->load->model('practicas/Coordinadores_Model');
    $coordinador = $this->Coordinadores_Model->get_coordinador_by_sede($sede);

    $date = new DateTime("now", new DateTimeZone('America/Santiago') );

    $this->email->initialize($config);
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas ');
    $this->email->to($coordinador['correo'], $coordinador['nombre'] . " " . $coordinador['apellido']);
    $this->email->subject("Notificación generación Formulario Postulación (Coordinador(a))");
    $this->email->message("Señor(a) Coordinador(a) " . $coordinador['nombre'] . ": <br>Se ha generado un nuevo Formulario de Postulación en el sistema.<br><br>Nombre: " . $primer_nombre . " " . $apellido_paterno . " " . $apellido_materno . "<br>RUT: " . $run . "-" . $df . "<br>Correo: " . $correo_estudiante . "<br>Enviado a las " . $date->format('Y-m-d H:i:s') . "<br><br>Correo generado automáticamente.");
    if ($this->email->send()) {
      echo "Correo enviado!";
    } else {
      echo $this->email->print_debugger();
      return false;
    }



  }
}
