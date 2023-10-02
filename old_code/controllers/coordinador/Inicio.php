<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 2)) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión1');
      redirect("coord/iniciar_sesion");
    }
  }

  public function index()
  {
    $this->load->view('coordinador/inicio');
  }

  public function verPostulaciones()
  {
    $this->load->view('coordinador/ver_postulaciones_practicas');
  }

  public function verCartasGenericas()
  {
    $this->load->view('coordinador/ver_cartas_genericas');
  }

  public function verCartasPersonalizadas()
  {
    $this->load->view('coordinador/ver_cartas_personalizadas');
  }
  public function cambiar_contrasena()
  {
    $this->load->model("coordinador/Coordinador_Model");
    $data['coordinador_id'] = $this->Coordinador_Model->get_coordinador($this->session->userdata('usuario'))['id'];

    $this->load->view('coordinador/cambiar_contrasena', $data);
  }

  public function modificar_contrasena()
  {

    $coordinador_id = $this->input->post('coordinador-id');

    $pass_antiguo = $this->input->post('password-antiguo');
    $pass_nuevo = $this->input->post('password-nuevo');
    $pass_nuevo_repite = $this->input->post('password-nuevo-repite');

    $this->load->model("coordinador/Coordinador_Model");
    $pass_actual = $this->Coordinador_Model->get_pass($coordinador_id)['contrasena'];
    
    if ($pass_nuevo == $pass_nuevo_repite) {
      if (password_verify($pass_antiguo, $pass_actual)) {
        $datos = array(
          'contrasena' => password_hash($pass_nuevo_repite, PASSWORD_BCRYPT)
        );
        $this->Coordinador_Model->update_pass($coordinador_id, $datos);
        $this->session->set_flashdata('mensaje', 'Su contraseña ha sido modificada con éxito');
        redirect('coord/practicas');
      } else {
        $this->session->set_flashdata('mensaje', 'Las contraseñas no son identicas.');
        redirect('coord/practicas');
      }
    } else {
      $this->session->set_flashdata('mensaje', 'Las contraseñas nuevas no son identicas.');
      redirect('coord/practicas');
    }

    //$this->load->view('coordinador/cambiar_contrasena', $data);
  }
}
