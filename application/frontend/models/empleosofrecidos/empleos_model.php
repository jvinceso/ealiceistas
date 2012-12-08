<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleos_model extends CI_Model {
	private $cEOfBases;
	private $cEOfDescripcion;
	private $cEOfSumilla;
	private $cEOfTitulo;
	private $dEOfFechaLimite;
	private $dEOfFechaRegistro;
	private $nEOdEstado;
	private $nEOfId;
	function __construct($nEOfId=null) {
	    parent::__construct();
	}   
	public function getById($id){
		$id = intval( $id );
		
		$query = $this->db->where( array('nEOfId'=>$id,'nEOdEstado' => 1) )->limit( 1 )->get( 'empleo_ofrecido' );
		
		if( $query->num_rows() > 0 ) {
		    return $query->row();
		} else {
		    return array();
		}		
	}	

	public function get_empleos($limit, $start){
		$limit = intval($limit);
		$start = intval($start);
		$this->db->limit($limit,$start);
		$where = "dEOfFechaLimite > current_date";

		$result = $this->db->where('nEOdEstado',1)->where($where)->order_by("dEOfFechaLimite", "ASC")->get('empleo_ofrecido');
		if($result){
			return $result->result_array();
		}else{
			return null;
		}
	}
	public function record_count(){
		$sql="select count(*) as filas from empleo_ofrecido where nEOdEstado=1";
		return $this->db->query($sql)->row();
	}
	public function record_count_paginator_fechas(){
		$sql="select count(*) as filas from empleo_ofrecido where nEOdEstado=1 AND dEOfFechaLimite > current_date";
		return $this->db->query($sql)->row();
	}
	public function documentoGetPDF($nEOfId){

		$nEOfId = intval($$nEOfId);
	    $fila = $this->db->where('nEOfId',$nEOfId)->get('empleo_ofrecido')->row();
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