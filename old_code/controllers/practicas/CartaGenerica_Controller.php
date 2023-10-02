<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpWord\TemplateProcessor;

class CartaGenerica_Controller extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('tipo') || !($this->session->userdata('tipo') == 3) || !($this->session->userdata('LOGIN') == TRUE)) {
      $this->session->set_flashdata('error', 'No ha iniciado sesión');
      redirect("practicas");
    }
  }
  public function index()
  {
    //$this->load->view('practicas/cartaGenerica');
  }

  public function crear()
  {

    $this->load->model('practicas/Estudiante_Model');
    $estudiante = $this->Estudiante_Model->get_estudiante($this->session->userdata('id'));
   
    /** Genera Documento Word */
    $archivo = $this->generar_docCartaGenerica(
      $estudiante['primer_nombre'],
      $estudiante['segundo_nombre'],
      $estudiante['apellido_paterno'],
      $estudiante['apellido_materno'],
      $estudiante['run'],
      $estudiante['df'],
      $estudiante['sede'],
      $estudiante['ultimo_sem_aprobado'],
      $estudiante['sexo'],
      $estudiante['correo_institucional']
    );


    $this->load->model('practicas/CartaGenerica_Model');
    $count_cg = $this->CartaGenerica_Model->count_cg_de_estudiante($this->session->userdata('id'));

    if ($count_cg < 1) {
      /** Datos Estudiantes */
      $data = array(
        'estudiante_id' => $estudiante['id'],
        'nombre_archivo' => $archivo['nombre'],
        'cantidad_generada' => 1
      );
      $this->load->model('practicas/CartaGenerica_Model');
      $cg_id = $this->CartaGenerica_Model->crear_cartaGenerica($data);
    } else {
      $this->load->model('practicas/CartaGenerica_Model');
      $cg_id = $this->CartaGenerica_Model->get_carta_generica($estudiante['id'])['id'];
      $data = array(
        'cantidad_generada' => ($this->CartaGenerica_Model->get_carta_generica($estudiante['id'])['cantidad_generada']) + 1,
        'revisado' => 0
      );
      $this->CartaGenerica_Model->actualizar_carta_generica($cg_id, $data);
    }

    $this->enviar_correo($estudiante['correo_institucional'], $estudiante['primer_nombre'], $estudiante['apellido_paterno'], $estudiante['apellido_materno'], $estudiante['sede'], $estudiante['run'], $estudiante['df']);


    $this->session->set_flashdata('mensaje', '¡Carta generada exitosamente!');
    redirect('practicas/principal');
  }

  private function generar_docCartaGenerica(
    $primer_nombre,
    $segundo_nombre,
    $apellido_paterno,
    $apellido_materno,
    $run,
    $df,
    $sede,
    $ultimo_sem_aprobado,
    $sexo,
    $correo_estudiante
  ) {
    $dia = date("d");

    if ($dia == "Monday") $dia = "Lunes";
    if ($dia == "Tuesday") $dia = "Martes";
    if ($dia == "Wednesday") $dia = "Miércoles";
    if ($dia == "Thursday") $dia = "Jueves";
    if ($dia == "Friday") $dia = "Viernes";
    if ($dia == "Saturday") $dia = "Sabado";
    if ($dia == "Sunday") $dia = "Domingo";

    $mes = date("F");

    if ($mes == "January") $mes = "Enero";
    if ($mes == "February") $mes = "Febrero";
    if ($mes == "March") $mes = "Marzo";
    if ($mes == "April") $mes = "Abril";
    if ($mes == "May") $mes = "Mayo";
    if ($mes == "June") $mes = "Junio";
    if ($mes == "July") $mes = "Julio";
    if ($mes == "August") $mes = "Agosto";
    if ($mes == "September") $mes = "Septiembre";
    if ($mes == "October") $mes = "Octubre";
    if ($mes == "November") $mes = "Noviembre";
    if ($mes == "December") $mes = "Diciembre";

    $anio = date("Y");

    if ($sexo == "femenino") {
      $extracto1 = "nuestra alumna Señorita";
      $extracto2 = "alumna";
      $extracto3 = "La señorita";
      $extracto4 = "LA ALUMNA";
    }
    if ($sexo == "masculino") {
      $extracto1 = "nuestro alumno Señor";
      $extracto2 = "alumno";
      $extracto3 = "El señor";
      $extracto4 = "EL ALUMNO";
    }

    $templateWord = new TemplateProcessor('./DocumentosPracticasApu/PlantillasWord/carta_generica_plantilla.docx');

    $templateWord->setValue('sede', $sede);
    $templateWord->setValue('dia', $dia);
    $templateWord->setValue('mes', $mes);
    $templateWord->setValue('anio', $anio);

    $templateWord->setValue('primer_nombre', mb_strtoupper($primer_nombre));
    $templateWord->setValue('segundo_nombre', mb_strtoupper($segundo_nombre));
    $templateWord->setValue('apellido_paterno', mb_strtoupper($apellido_paterno));
    $templateWord->setValue('apellido_materno', mb_strtoupper($apellido_materno));
    // number_format($number, 0, '.', '.');
    
    $d_verificador = $df;
    if($d_verificador === "k"){
        $d_verificador = mb_strtoupper($d_verificador);
    }
    
    
    $rut = $run;
    $rut = number_format($rut, 0, '.', '.');
    $templateWord->setValue('run', $rut . "-" . $d_verificador);

    $templateWord->setValue('ultimo_sem_aprobado', $ultimo_sem_aprobado);

    $this->load->model('FirmadorModel');
    if ($sede == "Valparaíso") {
      $templateWord->setValue('nombre_firmante', $this->FirmadorModel->nombre_firmante("Valparaíso"));
      $templateWord->setValue('firma_firmante', $this->FirmadorModel->vocativo("Valparaíso"));
      $templateWord->setValue('firma_sec', $this->FirmadorModel->firma_sec("Valparaíso"));
      $templateWord->setValue('cargo_firmante', $this->FirmadorModel->cargo_firmante("Valparaíso"));
    }
    else if($sede=="Santiago"){
      $templateWord->setValue('nombre_firmante', $this->FirmadorModel->nombre_firmante("Santiago"));
      $templateWord->setValue('firma_firmante', $this->FirmadorModel->vocativo("Santiago"));
      $templateWord->setValue('firma_sec', $this->FirmadorModel->firma_sec("Santiago"));
      $templateWord->setValue('cargo_firmante', $this->FirmadorModel->cargo_firmante("Santiago"));
    }

    $templateWord->setValue('extracto1', $extracto1);
    $templateWord->setValue('extracto2', $extracto2);
    $templateWord->setValue('extracto3', $extracto3);
    $templateWord->setValue('extracto4', $extracto4);

    if ($sede == "Valparaíso") {
      $templateWord->setValue('piepagina', "Las Heras Nº 06 Valparaíso | Fono: (32) 250 7961- 2507815 | E-mail: practivasv@uv.cl, www.uv.cl");
    } else if ($sede == "Santiago") {
      $templateWord->setValue('piepagina', "Campus Santiago - Gran Avenida 4160, San Miguel | Fono +56 (2) 2329 2149");
    }
    //$carpeta = "./DocumentosPracticasApu/CartasGenericas/".$run;
    $carpeta = "./DocumentosPracticasApu/" . $run . "/";
    //$archivo = "carta_generica(".utf8_decode($primer_nombre).utf8_decode($segundo_nombre).utf8_decode($apellido_paterno).utf8_decode($apellido_materno)."-".$run.").docx";

    //$nom_archivo = "carta_generica(" . $run . ").docx";
    $nom_archivo = $run . "-carta_generica.docx";
    $enlace = $carpeta . $nom_archivo;
    $contador = 0;

    while (is_file($enlace)) {
      //$contador++;
      //$nom_archivo = "carta_generica-" . $contador . "(" . $run . ").docx";
      //$enlace = $carpeta . $nom_archivo;
      unlink($enlace);
    }

    $templateWord->saveAs($enlace);

    $archivo = array(
      'carpeta' => $carpeta,
      'nombre' => $nom_archivo,
      'enlace' => $enlace
    );
    return $archivo;
  }

  private function enviar_correo($correo_estudiante, $primer_nombre, $apellido_paterno, $apellido_materno, $sede, $run, $df)
  {
    $this->load->library('email');
    $config['protocol'] = 'smtp';
    $config["smtp_host"] = 'mail.administracionpublica-uv.cl';
    $config['smtp_crypto'] = 'ssl';
    $config["smtp_user"] = 'no-reply@administracionpublica-uv.cl';
    $config["smtp_pass"] = 'WBkF}(QJ@Ter';
    $config["smtp_port"] = '465';
    $config['mailtype'] = 'html';
    $config['newline'] = "\r\n";

    $this->email->initialize($config);
    $this->email->set_newline("\r\n"); 

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas');

    /*
        * Ponemos el o los destinatarios para los que va el email
        * en este caso al ser un formulario de contacto te lo enviarás a ti
        * mismo
        */
    $this->email->to($correo_estudiante, $primer_nombre . " " . $apellido_paterno . " " . $apellido_materno);

    //Definimos el asunto del mensaje
    $this->email->subject("Notificación generación Carta Genérica");


    $data['titulo'] = 'Has generado tu Carta Genérica satisfactoriamente';
    $data['contenido_mensaje'] = 'Estimado(a) <strong>' . $primer_nombre . ': </strong><br><br>';
    $data['contenido_mensaje'] .= 'Le notificamos que acaba de generar una Carta Genérica a su práctica profesional, a través del Sistema de postulación de prácticas.<br>Prontamente, le haremos llegar el documento solicitado.<br><br>Saludos cordiales.<br><br>Coordinador(a) de Prácticas Profesionales. <br></p>';


    //Definimos el mensaje a enviar
    $this->email->message($this->load->view('correo_support', $data, TRUE));


    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      echo $this->email->print_debugger();
      return false;
    }


    $this->load->model('practicas/Coordinadores_Model');
    $coordinador = $this->Coordinadores_Model->get_coordinador_by_sede($sede);

    $date = new DateTime("now", new DateTimeZone('America/Santiago') );

    $this->email->initialize($config);
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas ');
    $this->email->to($coordinador['correo'], $coordinador['nombre'] . " " . $coordinador['apellido']);
    $this->email->subject("Notificación generación Carta Genérica (Coordinador(a))");
    $this->email->message("Señor(a) Coordinador(a)".$coordinador['nombre']." : <br>Se ha generado una nueva carta genérica en el sistema.<br><br>Nombre: " . $primer_nombre . " " . $apellido_paterno . " " . $apellido_materno . "<br>RUT: " . $run . "-" . $df . "<br>Correo: " . $correo_estudiante . "<br>Enviado a las " . $date->format('Y-m-d H:i:s') . "<br><br>Correo generado automáticamente.");
    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      echo $this->email->print_debugger();
      echo "error";
      return false;
}}}