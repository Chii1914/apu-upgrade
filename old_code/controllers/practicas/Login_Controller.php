<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 3) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión');
      redirect("practicas/principal");
    }
    $this->load->view('practicas/iniciar_sesion');
  }

  public function inicio_sesion()
  {
    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 3) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión');
      redirect("practicas/principal");
    }

    $user = $this->input->post('usuario');
    $pass = $this->input->post('contrasena');
    $this->load->model('practicas/Estudiante_Model');
    $valido = $this->Estudiante_Model->validar_sesion($user, $pass);
    if ($valido) {
      $estudiante_id = $this->Estudiante_Model->get_id_by_run($user);
      $this->session->set_userdata(array('tipo' => 3, 'id' => $estudiante_id, 'run' => $user, 'LOGIN' => TRUE ));
      $this->session->set_flashdata('mensaje', 'Inicio de sesion correcto');
      redirect('practicas/principal');
    } else {

      $this->session->set_flashdata('error', 'El usuario o la contraseña no son correctos.');
      redirect("practicas/iniciar_sesion");
    }
    //$this->load->view('admpracticas/login');
  }
  public function cerrar_sesion()
  {
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 3) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("practicas");
    }

    $datos = array('tipo', 'id', 'run', 'LOGIN');
    $this->session->unset_userdata($datos);
  
    $this->session->sess_destroy();
    $this->session->keep_flashdata('mensaje', 'Ha cerrado su sesión satisfactoriamente');
    redirect("practicas");


  }

  public function registrar()
  {
    if ($this->session->userdata('tipo') && ($this->session->userdata('tipo') == 3) && $this->session->userdata('LOGIN') == TRUE) {
      $this->session->set_flashdata('mensaje', 'Ya ha iniciado sesión');
      redirect("practicas/principal");
    }
    $this->load->view('practicas/registro');
  }
}
