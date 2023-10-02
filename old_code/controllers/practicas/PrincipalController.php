<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalController extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 3) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("practicas");
    }
  }

  public function index()
  {


    $this->load->model('practicas/CartaGenerica_Model');
    $this->load->model('practicas/CartaPersonalizada_Model');
    $this->load->model('practicas/Formulario_Model');
    $this->load->model('practicas/Evaluacion_Model');
    $this->load->model('practicas/Practica_Model');

    $data['cnt_cg'] = $this->CartaGenerica_Model->count_cg_de_estudiante($this->session->userdata('id'));
    $data['cnt_cp'] = $this->CartaPersonalizada_Model->count_cp_de_estudiante($this->session->userdata('id'));
    $data['cnt_forms_primera'] = $this->Formulario_Model->count_forms_de_estudiante($this->session->userdata('id'), "Primera");
    $data['cnt_forms_segunda'] = $this->Formulario_Model->count_forms_de_estudiante($this->session->userdata('id'), "Segunda");
    /*
    $data['cnt_PASa'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Primera", "Aceptada");
    $data['cnt_PAA'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Primera", "Aceptada");
    $data['cnt_PSaSa'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Primera", "Sin Acción");
    $data['cnt_PAR'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Primera", "Aceptada");
    $data['cnt_PR'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Primera", "Rechazada");

    $data['cnt_SASa'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Segunda", "Aceptada");
    $data['cnt_SAA'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Segunda", "Aceptada");
    $data['cnt_SSaSa'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Segunda", "Sin Acción");
    $data['cnt_SAR'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Segunda", "Aceptada");
    $data['cnt_SR'] = $this->Formulario_Model->ctn_o_estado_evaluacion($this->session->userdata('id'),"Segunda", "Rechazada");
*/

    $data['cnt_PASa'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Primera", "Aceptada");
    $data['cnt_PAA'] = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Primera", "Aceptada", "Aprobada");
    $data['cnt_PAR'] = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Primera", "Aceptada", "Reprobada");
    $data['cnt_PSa'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Primera", "Sin Acción");
    $data['cnt_PR'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Primera", "Rechazada");

    $data['cnt_SASa'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Segunda", "Aceptada");
    $data['cnt_SAA'] = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Segunda", "Aceptada", "Aprobada");
    $data['cnt_SAR'] = $this->Evaluacion_Model->ctn_evaluaciones_evaluacion_xestudiante($this->session->userdata('id'), "Segunda", "Aceptada", "Reprobada");
    $data['cnt_SSa'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Segunda", "Sin Acción");
    $data['cnt_SR'] = $this->Formulario_Model->ctn_formulario_estado_xestudiante_sin_evaluar($this->session->userdata('id'), "Segunda", "Rechazada");


    $data['primera_practica_info'] = $this->Practica_Model->get_practicas_by_alumnoId($this->session->userdata('id'), "Primera");
    $data['segunda_practica_info'] = $this->Practica_Model->get_practicas_by_alumnoId($this->session->userdata('id'), "Segunda");

    $this->load->view('practicas/postulacionPractica', $data);
  }
}
