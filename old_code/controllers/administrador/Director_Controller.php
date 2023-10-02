<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class Director_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 1) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("administrador/iniciar_sesion");
    }
  }
  public function index()
  {
    $this->load->model("administrador/Director_Model");
    $data['firmas'] = $this->Director_Model->get_firmas();
    $this->load->view('administrador/ver_director', $data);
  }

  public function editar_firma($director_id)
  {
    $this->load->model("administrador/Director_Model");
    $data['director'] = $this->Director_Model->get_firma($director_id);
    $this->load->view('administrador/editar_director', $data);
  }

  public function actualizar_director($director_id)
  {
    $nombre = $this->input->post('director_usuario');
    $vocativo =$this->input->post('director_vocativo');
    $firma=$this->input->post('director_firma');
    $sede =$this->input->post('director_sede');

    $data_director = array(
      'nombre_firmante' => $nombre,
      'vocativo' => $vocativo,
      'firma_sec' => $firma,
      'sede' => $sede
    );
    $this->load->model("administrador/Director_Model");
    $re= $this->Director_Model->actualizar_director($director_id, $data_director);

    redirect("administrador/ver_director");
  }

    
  

}

