<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class Coordinadores_Controller extends CI_Controller
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

  public function editar_coordinador($coordinador_id)
  {
    $this->load->model("administrador/Coordinadores_Model");
    $data['coordinador'] = $this->Coordinadores_Model->get_coordinador($coordinador_id);
    $this->load->view('administrador/editar_coordinador', $data);
  }

  public function actualizar_coordinador($coordinador_id)
  {
    $usuario = $this->input->post('coord_usuario');
    $nombre =$this->input->post('coord_nombre');
    $apellido=$this->input->post('coord_apellido');
    $correo = $this->input->post('coord_correo');
    $sede =$this->input->post('coord_sede');

    $data_coordinador = array(
      'usuario' => $usuario,
      'nombre' => $nombre,
      'apellido' => $apellido,
      'correo' => $correo,
      'sede' => $sede
    );

    $this->load->model("administrador/Coordinadores_Model");
    $re= $this->Coordinadores_Model->actualizar_coordinador($coordinador_id, $data_coordinador);
    
    redirect("administrador/ver_coordinadores");
  }

  public function resetear_password_coordinador($coordinador_id)
  {
    $data_coordinador = array(
      'contrasena' => password_hash("APU-UV", PASSWORD_BCRYPT)
    );


    $this->load->model("administrador/Coordinadores_Model");
    $re= $this->Coordinadores_Model->actualizar_coordinador($coordinador_id, $data_coordinador);
    
    redirect("administrador/ver_coordinadores");
  }

}

