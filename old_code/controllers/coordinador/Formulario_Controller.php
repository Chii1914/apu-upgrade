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
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 2)) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("coord/iniciar_sesion");
    }
  }

  public function index()
  {
    $this->load->model('RegionComunaHelperModel');
    $data['regiones'] = $this->RegionComunaHelperModel->getRegiones();
    $this->load->view('practicas/formulario', $data);
  }

  public function cargarComunas()
  {
    $id_region = $this->input->post('id_region');
    $run = $this->input->post('run');
    $this->load->model('RegionComunaHelperModel');
    $res = $this->RegionComunaHelperModel->getComunasByRegion($id_region);
    echo json_encode($res);
  }




  public function ver_postulaciones($offset = 0)
  {
    $this->load->view('coordinador/ver_postulaciones_practicas');
  }
  public function ver_postulaciones_aceptadas($offset = 0)
  {
    $this->load->view('coordinador/ver_postulaciones_aceptadas');
  }
  public function ver_postulaciones_rechazadas($offset = 0)
  {

    $this->load->view('coordinador/ver_postulaciones_rechazadas');
  }



  public function ver_evaluacion_postulaciones($offset = 0)
  {
    $this->load->view('coordinador/ver_evaluacion_postulaciones');
  }
  public function ver_evaluacion_postulaciones_aprobadas($offset = 0)
  {
    $this->load->view('coordinador/ver_evaluaciones_postulaciones_aprobadas');
  }
  public function ver_evaluaciones_postulaciones_reprobadas($offset = 0)
  {
    $this->load->view('coordinador/ver_evaluaciones_postulaciones_reprobadas');
  }




  public function ver_postulaciones_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    echo json_encode($this->Formulario_Model->get_formularios( "Sin acción"));
  } 

  public function ver_postulaciones_aceptadas_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    echo json_encode($this->Formulario_Model->get_formularios( "Aceptada"));
  } 
  public function ver_postulaciones_rechazadas_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    
    echo json_encode($this->Formulario_Model->get_formularios( "Rechazada"));
  } 



  public function ver_postulaciones_aceptadas_evaluacion_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    echo json_encode($this->Formulario_Model->get_formularios_aceptados_sin_evaluar());
  }
  public function ver_postulaciones_aceptadas_evaluacion_aprobadas_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    echo json_encode($this->Formulario_Model->get_formularios_evaluacion("Aprobada"));
  }
  public function ver_postulaciones_aceptadas_evaluacion_rechazadas_ajax()
  {
    $this->load->model("coordinador/Formulario_Model");
    echo json_encode($this->Formulario_Model->get_formularios_evaluacion("Reprobada"));
  }




  public function exportar_a_excel()
  {
    $this->load->model('coordinador/Estudiante_Model');
    $result = $this->Estudiante_Model->get_datos_estudiantes_excel();
    //$obj = new Spreadsheet();
    //$objReader = PHPExcel_IOFactory::createReader('Excel2007');

    $obj = \PhpOffice\PhpSpreadsheet\IOFactory::load('DocumentosPracticasApu/PlantillasWord/plantilla_excel.xlsx');
    //Agregar propiedades al objeto
    $obj->getProperties()
      ->setCreator('Sistema de postulación a prácticas profesionales')
      ->setTitle('Información sobre postulantes')
      ->setDescription('Información detallada sobre los alumnos que han postulado a prácticas profesionales.')
      ->setKeywords('')
      ->setCategory('');


    $obj->getActiveSheet();
    $obj->setActiveSheetIndex('0');
    $i = 2;


   
   
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="informacion_postulantes_valparaiso.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($obj, "Xlsx");
    $writer->save("php://output");
  }
  
    public function exportar_a_excel_nuevo()
    {
    $this->load->model('coordinador/Estudiante_Model');
    $result = $this->Estudiante_Model->get_datos_estudiantes_excel_nuevo();
    //$obj = new Spreadsheet();
    //$objReader = PHPExcel_IOFactory::createReader('Excel2007');

    $obj = \PhpOffice\PhpSpreadsheet\IOFactory::load('DocumentosPracticasApu/PlantillasWord/modelo_reporte.xlsx');
    //Agregar propiedades al objeto
    $obj->getProperties()
      ->setCreator('Sistema de postulación a prácticas profesionales')
      ->setTitle('Prácticas inscritas')
      ->setDescription('Reporte de todas las prácticas inscritas')
      ->setKeywords('')
      ->setCategory('');


    $obj->getActiveSheet();
    $obj->setActiveSheetIndex('0');
    $i = 5;
    $nro = 1;

    foreach ($result as $row) {
      $formattedFechaInicio = date('d/m/Y', strtotime($row['fecha_inicio']));
      $formattedFechaTermino = date('d/m/Y', strtotime($row['fecha_termino']));
      $obj->getActiveSheet()->setCellValue('A' . $i, $nro);
      $obj->getActiveSheet()->setCellValue('B' . $i, $row['run']."-".$row['df']);
      $obj->getActiveSheet()->setCellValue('C' . $i, $row['fecha_creado']);
      $obj->getActiveSheet()->setCellValue('D' . $i, $row['primer_nombre'] . ' ' . $row['segundo_nombre']);
      $obj->getActiveSheet()->setCellValue('E' . $i, $row['apellido_paterno']);
      $obj->getActiveSheet()->setCellValue('F' . $i, $row['apellido_materno']);
      $obj->getActiveSheet()->setCellValue('G' . $i, $row['telefono']);
      $obj->getActiveSheet()->setCellValue('H' . $i, $row['correo_institucional']);
      $obj->getActiveSheet()->setCellValue('I' . $i, $row['anio_ingreso']);
      $obj->getActiveSheet()->setCellValue('J' . $i, $row['ultimo_sem_aprobado']);
      $obj->getActiveSheet()->setCellValue('K' . $i, $row['ocasion']);
      $obj->getActiveSheet()->setCellValue('L' . $i, $row['homologacion']);
      $obj->getActiveSheet()->setCellValue('M' . $i, $row['nombre_organismo']);
      $obj->getActiveSheet()->setCellValue('N' . $i, $row['nombre_supervisor']);
      $obj->getActiveSheet()->setCellValue('O' . $i, $row['cargo']);
      $obj->getActiveSheet()->setCellValue('P' . $i, $row['correo']);
      $obj->getActiveSheet()->setCellValue('Q' . $i, $row['division_departamento']);
      $obj->getActiveSheet()->setCellValue('R' . $i, $row['seccion_unidad']);
      $obj->getActiveSheet()->setCellValue('S' . $i, $row['direccion']);
      $obj->getActiveSheet()->setCellValue('T' . $i, $row['telefono_organismo']);
      $obj->getActiveSheet()->setCellValue('U' . $i, $formattedFechaInicio);
      $obj->getActiveSheet()->setCellValue('V' . $i, $formattedFechaTermino);
      $i++;
      $nro++;
    }
    
    $obj->setActiveSheetIndex('0');
    $i = 5;
    $result2 = $this->Estudiante_Model->calcular_horas_semanales();
    foreach ($result2 as $row2) {
          $a = $row2;
          $obj->getActiveSheet()->setCellValue('W' . $i, $row2['horas_semanal']);
          $i++;
    }
    
   
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_practicas_valparaiso.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($obj, "Xlsx");
    $writer->save("php://output");
  }
  
  
  
    public function exportar_a_excel_santiago()
    {
    $this->load->model('coordinador/Estudiante_Model');
    $result = $this->Estudiante_Model->get_datos_estudiantes_excel_santiago();
    //$obj = new Spreadsheet();
    //$objReader = PHPExcel_IOFactory::createReader('Excel2007');

    $obj = \PhpOffice\PhpSpreadsheet\IOFactory::load('DocumentosPracticasApu/PlantillasWord/modelo_reporte.xlsx');
    //Agregar propiedades al objeto
    $obj->getProperties()
      ->setCreator('Sistema de postulación a prácticas profesionales')
      ->setTitle('Prácticas inscritas')
      ->setDescription('Reporte de todas las prácticas inscritas')
      ->setKeywords('')
      ->setCategory('');


    $obj->getActiveSheet();
    $obj->setActiveSheetIndex('0');
    $i = 5;
    $nro = 1;


    foreach ($result as $row) {
      $formattedFechaInicio = date('d/m/Y', strtotime($row['fecha_inicio']));
      $formattedFechaTermino = date('d/m/Y', strtotime($row['fecha_termino']));
      $obj->getActiveSheet()->setCellValue('A' . $i, $nro);
      $obj->getActiveSheet()->setCellValue('B' . $i, $row['run']."-".$row['df']);
      $obj->getActiveSheet()->setCellValue('C' . $i, $row['fecha_creado']);
      $obj->getActiveSheet()->setCellValue('D' . $i, $row['primer_nombre'] . ' ' . $row['segundo_nombre']);
      $obj->getActiveSheet()->setCellValue('E' . $i, $row['apellido_paterno']);
      $obj->getActiveSheet()->setCellValue('F' . $i, $row['apellido_materno']);
      $obj->getActiveSheet()->setCellValue('G' . $i, $row['telefono']);
      $obj->getActiveSheet()->setCellValue('H' . $i, $row['correo_institucional']);
      $obj->getActiveSheet()->setCellValue('I' . $i, $row['anio_ingreso']);
      $obj->getActiveSheet()->setCellValue('J' . $i, $row['ultimo_sem_aprobado']);
      $obj->getActiveSheet()->setCellValue('K' . $i, $row['ocasion']);
      $obj->getActiveSheet()->setCellValue('L' . $i, $row['homologacion']);
      $obj->getActiveSheet()->setCellValue('M' . $i, $row['nombre_organismo']);
      $obj->getActiveSheet()->setCellValue('N' . $i, $row['nombre_supervisor']);
      $obj->getActiveSheet()->setCellValue('O' . $i, $row['cargo']);
      $obj->getActiveSheet()->setCellValue('P' . $i, $row['correo']);
      $obj->getActiveSheet()->setCellValue('Q' . $i, $row['division_departamento']);
      $obj->getActiveSheet()->setCellValue('R' . $i, $row['seccion_unidad']);
      $obj->getActiveSheet()->setCellValue('S' . $i, $row['direccion']);
      $obj->getActiveSheet()->setCellValue('T' . $i, $row['telefono_organismo']);
      $obj->getActiveSheet()->setCellValue('U' . $i, $formattedFechaInicio);
      $obj->getActiveSheet()->setCellValue('V' . $i, $formattedFechaTermino);


      $i++;
      $nro++;
    }
    
    $obj->setActiveSheetIndex('0');
    $i = 5;
    $result3 = $this->Estudiante_Model->calcular_horas_semanales_santiago();
    foreach ($result3 as $row3) {
          $a = $row3;
          $obj->getActiveSheet()->setCellValue('W' . $i, $row3['horas_semanal']);
          $i++;
    }
    
   
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="reporte_practicas_santiago.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($obj, "Xlsx");
    $writer->save("php://output");
  }

}
