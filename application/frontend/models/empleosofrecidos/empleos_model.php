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

	public function get_empleos($limit, $start){
		$limit = intval($limit);
		$start = intval($start);
		$this->db->limit($limit,$start);
		$result = $this->db->where('nEOdEstado',1)->order_by("dEOfFechaRegistro", "desc")->get('empleo_ofrecido');
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

}

/* End of file empleos_model.php */
/* Location: ./application/frontend/models/empleosofrecidos/empleos_model.php */

?>