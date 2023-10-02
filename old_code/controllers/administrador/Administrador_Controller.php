<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class Administrador_Controller extends CI_Controller
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
    $this->load->model("administrador/Coordinadores_Model");
    $data['lista_coordinadores'] = $this->Coordinadores_Model->get_coordinadores();
    $this->load->view('administrador/ver_coordinadores', $data);
  }

  public function editar_administrador()
  {
    $this->load->model("administrador/Administrador_Model");
    $data['administrador'] = $this->Administrador_Model->get_administrador($this->session->userdata('admin_id'));
    $this->load->view('administrador/editar_administrador', $data);
  }



  public function actualizar_administrador($administrador_id)
  {
    $usuario = $this->input->post('admin_usuario');
    $nombre =$this->input->post('admin_nombre');
    $apellido=$this->input->post('admin_apellido');
    $correo = $this->input->post('admin_correo');
    $sede =$this->input->post('admin_sede');

    $data_administrador = array(
      'usuario' => $usuario,
      'nombre' => $nombre,
      'apellido' => $apellido,
      'correo' => $correo,
      'sede' => $sede
    );

    $this->load->model("administrador/Administrador_Model");
    $re= $this->Administrador_Model->actualizar_administrador($administrador_id, $data_administrador);
    
    redirect("administrador/inicio");
  }

}

