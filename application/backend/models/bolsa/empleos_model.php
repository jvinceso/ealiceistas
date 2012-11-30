<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleos_model extends CI_Model {

	private $nEOfId;
	private $cEOfTitulo;
	private $cEOfDescripcion;
	private $cEOfBases;	
	function __construct($nEOfId=null) {
	    parent::__construct();
	}   

	public function get_nEOfId(){
		return $this->nEOfId;
	}
	public function get_cEOfTitulo(){
		return $this->cEOfTitulo;
	}
	public function get_cEOfDescripcion(){
		return $this->cEOfDescripcion;
	}
	public function get_cEOfBases(){
		return $this->cEOfBases;
	}

	public function set_nEOfId($nEOfId){
		$this->nEOfId=$nEOfId;
	}
	public function set_cEOfTitulo($cEOfTitulo){
		$this->cEOfTitulo=$cEOfTitulo;
	}
	public function set_cEOfDescripcion($cEOfDescripcion){
		$this->cEOfDescripcion=$cEOfDescripcion;
	}
	public function set_cEOfBases($cEOfBases){
		$this->cEOfBases=$cEOfBases;
	}
	public function get_EmpleosOfrecidos(){
		$result = $this->db->query('select  nEOfId,cEOfTitulo,cEOfDescripcion,cEOfBases from empleo_ofrecido where nEOdEstado=1');
		if($result){
			return $result->result_array();
		}
	}
	public function set_Empleo($data){
		$this->db->insert('empleo_ofrecido',$data);
	}
/* End of file empleos_model.php */
/* Location: ./application/backend/models/bolsa/empleos_model.php */

}
?>