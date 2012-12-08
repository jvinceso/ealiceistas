<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Servicios_model extends CI_Model {
	private $cProCarrera;
	private $cProCurriculum;
	private $cProDescripcion;
	private $cProEmail;
	private $cProNombre;
	private $cProWeb;
	private $nProEstado;
	private $nProId;

	function __construct($nProId=null) {
	    parent::__construct();
	}   
	public function getById($id){
		$id = intval( $id );
		
		$query = $this->db->where( array('nProId'=>$id,'nProEstado' => 1) )->limit( 1 )->get( 'profesional_servicio' );
		
		if( $query->num_rows() > 0 ) {
		    return $query->row();
		} else {
		    return array();
		}		
	}	

	public function get_profesionales($limit, $start){
		$limit = intval($limit);
		$start = intval($start);
		$this->db->limit($limit,$start);
		// $where = "dEOfFechaLimite > current_date";

		$result = $this->db->where('nProEstado',1)->order_by("nProId", "DESC")->get('profesional_servicio');
		if($result){
			return $result->result_array();
		}else{
			return null;
		}
	}
	public function record_count(){
		$sql="select count(*) as filas from profesional_servicio where nProEstado=1";
		return $this->db->query($sql)->row();
	}
/*	public function record_count_paginator_fechas(){
		$sql="select count(*) as filas from profesional_servicio where nProEstado=1 AND dEOfFechaLimite > current_date";
		return $this->db->query($sql)->row();
	}*/
	public function documentoGetPDF($nProId){

		$nProId = intval($$nProId);
	    $fila = $this->db->where('nProId',$nProId)->get('profesional_servicio')->row();
	    if ($fila) {
	        // $this->set_neo($fila['archivo']); | 
	        return $fila;
	    } else {
	        return null;
	    }
	}	

}

/* End of file empleos_model.php */
/* Location: ./application/frontend/models/empleosofrecidos/empleos_model.php */

?>