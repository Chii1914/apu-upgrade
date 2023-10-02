<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class CartaPersonalizada_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 2) ) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("coord/iniciar_sesion");
    }
  }

  public function index()
  {
    $this->load->view('practicas/cartaPersonalizada');
  }


  public function ver_cartasPersonalizadas()
  {
    $this->load->view('coordinador/ver_cartas_personalizadas');
  }

  public function ver_cartasPersonalizadas_ajax()
  {
    $this->load->model("coordinador/CartaPersonalizada_Model");
    echo json_encode($this->CartaPersonalizada_Model->get_cartasPersonalizadas());
  }

  public function actualizar()
  {
    $this->load->model("coordinador/CartaPersonalizada_Model");
    $carta_personalizada_id = $this->input->post('id');
    $data_cp = array(
      'revisado' => $this->input->post('revisado')
    );
    if ($this->CartaPersonalizada_Model->actualizar_carta_personalizada($carta_personalizada_id, $data_cp) == true) {
      echo json_encode(1);
    } else {
      echo json_encode(0);
    }
  }
  
  public function eliminar()
  {
    $this->load->model("coordinador/CartaPersonalizada_Model");
    $carta_personalizada_id = $this->input->post('id');
    
    if($this->CartaPersonalizada_Model->eliminar_carta_personalizada($carta_personalizada_id) == true){
      echo json_encode(1);
    }else{
      echo json_encode(0);
    }
  }
}
