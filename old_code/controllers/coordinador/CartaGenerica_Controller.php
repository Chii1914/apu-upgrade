<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class CartaGenerica_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || (!($this->session->userdata('tipo') == 2)) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("coord/iniciar_sesion");
    }
  }
  public function index()
  {
    //$this->load->view('practicas/cartaGenerica');
  }

  public function ver_cartasGenericas()
  {
    $this->load->model("coordinador/CartaGenerica_Model");
    $data['cartas_genericas'] = $this->CartaGenerica_Model->get_cartasGenericas();

    $this->load->view('coordinador/ver_cartas_genericas', $data);
  }

  public function ver_cartasGenericas_ajax()
  {
    $this->load->model("coordinador/CartaGenerica_Model");
    echo json_encode($this->CartaGenerica_Model->get_cartasGenericas());
  }


  public function actualizar()
  {
    $this->load->model("coordinador/CartaGenerica_Model");
    $carta_generica_id = $this->input->post('id');
    $data_cg = array(
      'revisado' => $this->input->post('revisado')
    );
    if($this->CartaGenerica_Model->actualizar_carta_generica($carta_generica_id, $data_cg) == true){
      echo json_encode(1);
    }else{
      echo json_encode(0);
    }
  }


  public function eliminar()
  {
    $this->load->model("coordinador/CartaGenerica_Model");
    $carta_generica_id = $this->input->post('id');
    
    if($this->CartaGenerica_Model->eliminar_carta_generica($carta_generica_id) == true){
      echo json_encode(1);
    }else{
      echo json_encode(0);
    }
  }

}
