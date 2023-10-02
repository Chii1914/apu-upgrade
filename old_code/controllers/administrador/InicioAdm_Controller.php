<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InicioAdm_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 1)) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión1');
      redirect("administrador/iniciar_sesion");
    }
  }

  public function index()
  {
    $this->load->view('administrador/inicio');
  }

  public function cambiar_contrasena()
  {
    $this->load->model("administrador/Administrador_Model");
    $data['admin_id'] = $this->Administrador_Model->get_administrador($this->session->userdata('admin_id'))['id'];

    $this->load->view('administrador/cambiar_contrasena', $data);
  }








  public function modificar_contrasena()
  {

    $admin_id = $this->input->post('admin-id');

    $pass_antiguo = $this->input->post('password-antiguo');
    $pass_nuevo = $this->input->post('password-nuevo');
    $pass_nuevo_repite = $this->input->post('password-nuevo-repite');

    $this->load->model("administrador/Administrador_Model");
    $pass_actual = $this->Administrador_Model->get_pass($admin_id)['contrasena'];

    if ($pass_nuevo == $pass_nuevo_repite) {
      if (password_verify($pass_antiguo, $pass_actual)) {
        $datos = array(
          'contrasena' => password_hash($pass_nuevo_repite, PASSWORD_BCRYPT)
        );
        $this->Administrador_Model->update_pass($admin_id, $datos);
        $this->session->set_flashdata('mensaje', 'Su contraseña ha sido modificada con éxito');
        redirect('administrador/inicio');
      } else {
        $this->session->set_flashdata('mensaje', 'Las contraseñas no son identicas.');
        redirect('administrador/inicio');
      }
    } else {
      $this->session->set_flashdata('mensaje', 'Las contraseñas nuevas no son identicas.');
      redirect('administrador/inicio');
    }

    //$this->load->view('coordinador/cambiar_contrasena', $data);
  }
}
