<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loginadm_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('administrador/login_administrador');
  }

  public function login()
  {

    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 1) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión');
      redirect("administrador/inicio");
    }
    $user = $this->input->post('usuario');
    $pass = $this->input->post('contrasena');
    $this->load->model('administrador/Login_Model');

    $valido = $this->Login_Model->validar($user, $pass);

    if ($valido) {
      $this->load->model('administrador/Administrador_Model');
      $administrador = $this->Administrador_Model->get_administrador_by_usuario($user);
      $this->session->set_userdata(array('tipo' => $administrador['tipo_usuario'], 'usuario' => $user, 'sede' => $administrador['sede'], 'admin_id' => $administrador['id'], 'LOGIN' => TRUE));
      redirect('administrador/inicio');
    } else {
      $this->session->set_flashdata('error', 'El usuario o la contraseña no son correctos.');
      redirect("administrador");
    }
    $this->load->view('administrador/iniciar_sesion');
  }

  public function logout()
  {
    if (!$this->session->userdata('admin_id')  || !$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 1) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("administrador/iniciar_sesion");
    }
    $datos = array('admin_id','tipo', 'usuario', 'sede', 'LOGIN');
    $this->session->unset_userdata($datos);
    $this->session->sess_destroy();
    $this->session->set_flashdata('mensaje', 'Ha cerrado su sesión satisfactoriamente');
    redirect("administrador/iniciar_sesion");
  }
}
