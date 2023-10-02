<?php

class Estudiante_Model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function get_datos_estudiantes_excel()
  {
    $this->db->select('alumnos.run, alumnos.df, alumnos.primer_nombre, alumnos.segundo_nombre, alumnos.apellido_paterno, alumnos.apellido_materno,
            alumnos.correo_personal, alumnos.correo_institucional, alumnos.telefono, alumnos.ultimo_sem_aprobado,
            alumnos.sede, alumnos.anio_ingreso, 
            practica.ocasion, practica.fecha_inicio, practica.fecha_termino,
            practica.estado, practica.fecha_cambio_estado, 
            evaluaciones.evaluacion, evaluaciones.fecha_evaluacion, 
            organismo.nombre_organismo AS nombre_organismo, organismo.direccion, organismo.telefono AS telefono_organismo, 
            organismo.division_departamento AS division_departamento, 
            organismo.seccion_unidad, organismo.otraRegion, organismo.otraComuna,
            region.nombre AS nombre_region, comuna.nombre AS nombre_comuna,supervisor.nombre AS nombre_supervisor, supervisor.cargo, 
            supervisor.correo, notas.nota_uno, notas.nota_dos, notas.nota_tres, notas.nota_cuatro, notas.nota_cinco, notas.nota_seis, notas.nota_siete,
            notas.nota_ocho, notas.nota_nueve, notas.nota_diez, notas.nota_once, notas.nota_doce, notas.nota_trece, notas.nota_promedio, notas.observaciones');
    $this->db->from('practica');

    $this->db->join('alumnos', ' alumnos.id = practica.alumnoId');
    $this->db->join('organismo', 'organismo.id = practica.organismoId');
    $this->db->join('region', 'organismo.regionId = region.id');
    $this->db->join('comuna', 'organismo.comunaId = comuna.id');

    $this->db->join('supervisor', 'supervisor.id = practica.supervisorId');
    $this->db->join('evaluaciones', 'evaluaciones.id = practica.evaluacionId');
    $this->db->join('notas', 'notas.id = evaluaciones.notasId');

    $this->db->where('alumnos.sede', $this->session->userdata('sede'));
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }
  
  public function get_datos_estudiantes_excel_nuevo()
  {
    $this->db->select('alumnos.run, alumnos.df, alumnos.primer_nombre, alumnos.segundo_nombre, alumnos.apellido_paterno, alumnos.apellido_materno,
            alumnos.correo_personal, alumnos.correo_institucional, alumnos.telefono, alumnos.ultimo_sem_aprobado,
            alumnos.sede, alumnos.anio_ingreso, 
            practica.ocasion, practica.fecha_inicio, practica.fecha_termino, practica.fecha_creado,
            practica.estado, practica.fecha_cambio_estado, practica.homologacion, practica.informe_pdf,
            organismo.nombre_organismo AS nombre_organismo, organismo.direccion, organismo.telefono AS telefono_organismo, 
            organismo.division_departamento AS division_departamento, 
            organismo.seccion_unidad, organismo.otraRegion, organismo.otraComuna,
            region.nombre AS nombre_region, comuna.nombre AS nombre_comuna,supervisor.nombre AS nombre_supervisor, supervisor.cargo, 
            supervisor.correo');
            
    $this->db->from('practica');

    $this->db->join('alumnos', ' alumnos.id = practica.alumnoId');
    $this->db->join('organismo', 'organismo.id = practica.organismoId');
    $this->db->join('region', 'organismo.regionId = region.id');
    $this->db->join('comuna', 'organismo.comunaId = comuna.id');

    $this->db->join('supervisor', 'supervisor.id = practica.supervisorId');

    $this->db->where('alumnos.sede', 'Valparaíso');
    $this->db->order_by('alumnos.run', 'ASC');
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }
  
  
  public function calcular_horas_semanales() /*aea*/
{
    $this->db->select('alumnos.primer_nombre, alumnos.apellido_paterno, practica.ocasion, LEFT(CAST(SUM(ADDTIME(SUBTIME(horario.hora_manana_salida, horario.hora_manana_entrada), SUBTIME(horario.hora_tarde_salida, horario.hora_tarde_entrada)) ) AS CHAR), 2) AS horas_semanal');
    $this->db->from('horario');
    $this->db->join('practica', 'horario.practicaId = practica.id');
    $this->db->join('alumnos', 'practica.alumnoId = alumnos.id');
    $this->db->group_by('alumnos.run, practica.ocasion, practica.fecha_creado');
    $this->db->where('alumnos.sede', 'Valparaíso');
    $this->db->order_by('alumnos.run', 'ASC');
  
    
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
}

public function calcular_horas_semanales_santiago() /*aea*/
{
    $this->db->select('alumnos.primer_nombre, alumnos.apellido_paterno, practica.ocasion, LEFT(CAST(SUM(ADDTIME(SUBTIME(horario.hora_manana_salida, horario.hora_manana_entrada), SUBTIME(horario.hora_tarde_salida, horario.hora_tarde_entrada)) ) AS CHAR), 2) AS horas_semanal');
    $this->db->from('horario');
    $this->db->join('practica', 'horario.practicaId = practica.id');
    $this->db->join('alumnos', 'practica.alumnoId = alumnos.id');
    $this->db->group_by('alumnos.run, practica.ocasion, practica.fecha_creado');
    $this->db->where('alumnos.sede', 'Santiago');
    $this->db->order_by('alumnos.run', 'ASC');
  
    
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
}

  
    public function get_datos_estudiantes_excel_santiago()
  {
    $this->db->select('alumnos.run, alumnos.df, alumnos.primer_nombre, alumnos.segundo_nombre, alumnos.apellido_paterno, alumnos.apellido_materno,
            alumnos.correo_personal, alumnos.correo_institucional, alumnos.telefono, alumnos.ultimo_sem_aprobado,
            alumnos.sede, alumnos.anio_ingreso, 
            practica.ocasion, practica.fecha_inicio, practica.fecha_termino, practica.fecha_creado,
            practica.estado, practica.fecha_cambio_estado, practica.homologacion, practica.informe_pdf,
            organismo.nombre_organismo AS nombre_organismo, organismo.direccion, organismo.telefono AS telefono_organismo, 
            organismo.division_departamento AS division_departamento, 
            organismo.seccion_unidad, organismo.otraRegion, organismo.otraComuna,
            region.nombre AS nombre_region, comuna.nombre AS nombre_comuna,supervisor.nombre AS nombre_supervisor, supervisor.cargo, 
            supervisor.correo');
    $this->db->from('practica');

    $this->db->join('alumnos', ' alumnos.id = practica.alumnoId');
    $this->db->join('organismo', 'organismo.id = practica.organismoId');
    $this->db->join('region', 'organismo.regionId = region.id');
    $this->db->join('comuna', 'organismo.comunaId = comuna.id');

    $this->db->join('supervisor', 'supervisor.id = practica.supervisorId');

    $this->db->where('alumnos.sede', 'Santiago');
    $this->db->order_by('alumnos.run', 'ASC');
    
    $query = $this->db->get();
    $res = $query->result_array();
    return $res;
  }


  public function getDatosCartaSeguroByPracticaId($practicaId)
  {
    $this->db->select('alumnos.run, alumnos.df, alumnos.primer_nombre, alumnos.segundo_nombre, alumnos.apellido_paterno, alumnos.apellido_materno, alumnos.ultimo_sem_aprobado, alumnos.sede,
             alumnos.sexo, practica.ocasion,
            organismo.seccion_unidad, organismo.nombre_organismo, organismo.division_departamento, supervisor.nombre AS nombre_supervisor');
    $this->db->from('practica');

    $this->db->join('alumnos', ' alumnos.id = practica.alumnoId');
    $this->db->join('organismo', 'practica.organismoId = organismo.id');

    $this->db->join('supervisor', 'practica.supervisorId = supervisor.id');
    $this->db->where('practica.id', $practicaId);
    $query = $this->db->get();
    $res = $query->row_array();
    return $res;
  }

  public function get_estudiante_por_id($estudiante_id)
  {
    $this->db->select('id, run, df, primer_nombre, segundo_nombre, apellido_paterno, apellido_materno, correo_personal, correo_institucional, telefono, ultimo_sem_aprobado, sede, anio_ingreso, sexo');
    $this->db->from('alumnos');
    $this->db->where('id', $estudiante_id);
    $resultado = $this->db->get();
    return $resultado->row_array();
  }
}
