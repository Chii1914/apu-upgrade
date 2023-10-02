<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estudiante_Controller extends CI_Controller
{
  public function index()
  {
  }

  public function registrar_estudiante()
  {
    $primer_nombre = $this->input->post('primer_nombre');
    $segundo_nombre = $this->input->post('segundo_nombre');
    $apellido_paterno = $this->input->post('apellido_paterno');
    $apellido_materno = $this->input->post('apellido_materno');
    $run = $this->input->post('run');
    $df = $this->input->post('df');
    $sede = $this->input->post('sede');
    $ultimo_sem_aprobado = $this->input->post('ultimo_sem_aprobado');
    $telefono = $this->input->post('telefono');
    $correo_personal = $this->input->post('correo-personal');
    $correo_institucional = $this->input->post('correo-institucional');
    $anio_ingreso = $this->input->post('anio_ingreso');
    $sexo = $this->input->post('sexo');

    $dataEstudiante = array(
      'run' => $run,
      'df' => $df,
      'contrasena' => password_hash(substr($run, -4), PASSWORD_DEFAULT),
      'primer_nombre' => $primer_nombre,
      'segundo_nombre' => $segundo_nombre,
      'apellido_paterno' => $apellido_paterno,
      'apellido_materno' => $apellido_materno,
      'correo_personal' => $correo_personal,
      'correo_institucional' => $correo_institucional,
      'sede' => $sede,
      'run' => $run,
      'telefono' => $telefono,
      'ultimo_sem_aprobado' => $ultimo_sem_aprobado,
      'anio_ingreso' => $anio_ingreso,
      'sexo' => $sexo
    );



    /* GUARDAR ESTUDIANTE DATOS EN BD */
    $this->load->model('practicas/Estudiante_Model');
    $resultado = $this->Estudiante_Model->crear_estudiante($dataEstudiante);
    mkdir("./DocumentosPracticasApu/" . $run, 0755);
    if ($resultado > 0) {
      $this->session->set_flashdata('mensaje', '¡Cuenta creada correctamente!');
      $this->enviar_correo($correo_institucional, $primer_nombre, $apellido_paterno, $apellido_materno );
      redirect('practicas');
    } else {
      $this->session->set_flashdata('error', '¡Error al ingresar datos! Ya posee una cuenta');
      redirect('practicas');
    }
  }

  public function editar_info_personal()
  {
    $this->load->model('practicas/Estudiante_Model');
    $data['estudiante'] = $this->Estudiante_Model->get_estudiante($this->session->userdata("id"));
    $this->load->view('practicas/editar_informacion_personal', $data);
  }




  public function actualizar_info_personal()
  {
    $primer_nombre = $this->input->post('primer_nombre');
    $segundo_nombre = $this->input->post('segundo_nombre');
    $apellido_paterno = $this->input->post('apellido_paterno');
    $apellido_materno = $this->input->post('apellido_materno');
    $sede = $this->input->post('sede');
    $ultimo_sem_aprobado = $this->input->post('ultimo_sem_aprobado');
    $telefono = $this->input->post('telefono');
    $correo_personal = $this->input->post('correo-personal');
    $correo_institucional = $this->input->post('correo-institucional');
    $anio_ingreso = $this->input->post('anio_ingreso');
    $sexo = $this->input->post('sexo');
    $dataEstudiante = array(
      'primer_nombre' => $primer_nombre,
      'segundo_nombre' => $segundo_nombre,
      'apellido_paterno' => $apellido_paterno,
      'apellido_materno' => $apellido_materno,
      'correo_personal' => $correo_personal,
      'correo_institucional' => $correo_institucional,
      'sede' => $sede,
      'telefono' => $telefono,
      'ultimo_sem_aprobado' => $ultimo_sem_aprobado,
      'anio_ingreso' => $anio_ingreso,
      'sexo' => $sexo
    );

    /* GUARDAR ESTUDIANTE DATOS EN BD */
    $this->load->model('practicas/Estudiante_Model');
    $resultado = $this->Estudiante_Model->update_estudiante($this->session->userdata('id'), $dataEstudiante);

    if ($resultado > 0) {
      $this->session->set_flashdata('mensaje', '¡Información Actualizada correctamente!');
      redirect('practicas/principal');
    } else {
      $this->session->set_flashdata('error', '¡Error al actualizar datos! Contacte a coordinador para informar acerca del problema.');
      redirect('practicas/principal');
    }
  }


  private function enviar_correo($correo_estudiante, $primer_nombre, $apellido_paterno, $apellido_materno)
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

    //Ponemos la dirección de correo que enviará el email y un nombre
    $this->email->from('no-reply@administracionpublica-uv.cl', 'APU UV Prácticas');

    /*
          * Ponemos el o los destinatarios para los que va el email
          * en este caso al ser un formulario de contacto te lo enviarás a ti
          * mismo
          */
    $this->email->to($correo_estudiante, $primer_nombre . " " . $apellido_paterno . " " . $apellido_materno);

    //Definimos el asunto del mensaje
    $this->email->subject("Registro de cuenta:");

    //$htmlContent = '<h3>Has creado tu cuenta para el sistema de prácticas de la Escuela de Administración Pública UV satisfactoriamente</h3>';
    //$htmlContent .= '<p>Estimado(a) <strong>' . $primer_nombre . ': </strong><br><br>';
    //$htmlContent .= 'Le notificamos que ha hecho registro de su cuenta en nuestro sistema de prácticas correctamente. Le recordamos que su contraseña son los últimos cuatro dígitos de su rut sin considerar el dígito verificador.<br></p>';

    $data['titulo'] = 'Has creado tu cuenta para el sistema de prácticas de la Escuela de Administración Pública UV satisfactoriamente';
    $data['contenido_mensaje'] = 'Estimado(a) <strong>' . $primer_nombre . ': </strong><br><br>';
    $data['contenido_mensaje'] .= 'Le notificamos que ha hecho registro de su cuenta en nuestro sistema de prácticas correctamente. Le recordamos que su contraseña son los últimos cuatro dígitos de su rut sin considerar el dígito verificador.<br>';

    //Definimos el mensaje a enviar
    //$this->email->message($htmlContent);

    $this->email->message($this->load->view('correo_support',$data,TRUE));

    //$this->email->attach($enlace);
    if ($this->email->send()) {
      echo "Correo enviado !";
    } else {
      echo $this->email->print_debugger();
      return false;
    }
  }
}
