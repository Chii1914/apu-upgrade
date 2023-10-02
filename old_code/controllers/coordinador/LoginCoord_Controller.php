<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginCoord_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 2) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión2');
      redirect("coord/practicas");
    }
    $this->load->view('coordinador/login');
  }

  public function login()
  {

    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 2) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión2');
      redirect("coord/practicas");
    }
    $user = $this->input->post('usuario');
    $pass = $this->input->post('contrasena');
    $this->load->model('coordinador/Login_Model');

    $valido = $this->Login_Model->validar($user, $pass);

    if ($valido) {
      $this->load->model('coordinador/Coordinador_Model');
      $coordinador = $this->Coordinador_Model->get_coordinador($user);
      $this->session->set_userdata(array('tipo' => $coordinador['tipo_usuario'], 'usuario' => $user, 'sede' => $this->Login_Model->get_sede($user), 'LOGIN' => TRUE));
      redirect('coord/practicas');
    } else {
      $this->session->set_flashdata('error', 'El usuario o la contraseña no son correctos.');
      redirect("coord/iniciar_sesion");
    }
    $this->load->view('coordinador/login');
  }

  public function logout()
  {
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 2) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("coord");
    }
    $datos = array('tipo', 'usuario', 'sede', 'LOGIN');
    $this->session->unset_userdata($datos);
    $this->session->sess_destroy();
    $this->session->set_flashdata('mensaje', 'Ha cerrado su sesión satisfactoriamente');
    redirect("coord/iniciar_sesion");
  }
}
