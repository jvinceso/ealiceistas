<?php
if ( ! defined('BASEPATH')) exit('No Tienes Acceso Aqui Fuera!!!');

class Profesional_model extends CI_Model {

	private $cProCarrera;
	private $cProCurriculum;
	private $cProDescripcion;
	private $cProEmail;
	private $cProNombre;
	private $cProWeb;
	private $nProEstado;
	private $nProId;

	function __construct($nProId=null){
		parent::__construct();
	}
	function set_cProCarrera($cProCarrera){
		$this->cProCarrera = $cProCarrera;
	}
	function set_cProCurriculum($cProCurriculum){
		$this->cProCurriculum = $cProCurriculum;
	}
	function set_cProDescripcion($cProDescripcion){
		$this->cProDescripcion = $cProDescripcion;
	}
	function set_cProEmail($cProEmail){
		$this->cProEmail = $cProEmail;
	}
	function set_cProNombre($cProNombre){
		$this->cProNombre = $cProNombre;
	}
	function set_cProWeb($cProWeb){
		$this->cProWeb = $cProWeb;
	}
	function set_nProEstado($nProEstado){
		$this->nProEstado = $nProEstado;
	}
	function set_nProId($nProId){
		$this->nProId = $nProId;
	}

	function get_cProCarrera(){
		return $this->cProCarrera;
	}
	function get_cProCurriculum(){
		return $this->cProCurriculum;
	}
	function get_cProDescripcion(){
		return $this->cProDescripcion;
	}
	function get_cProEmail(){
		return $this->cProEmail;
	}
	function get_cProNombre(){
		return $this->cProNombre;
	}
	function get_cProWeb(){
		return $this->cProWeb;
	}
	function get_nProEstado(){
		return $this->nProEstado;
	}
	function get_nProId(){
		return $this->nProId;
	}
	public function get_Profesionales(){
		$query = $this->db->where('nProEstado',1)->order_by("nProId", "desc")->get('profesional_servicio');
		if ($query) {
			return $query->result_array();
		}
	}
	public function create($data){
		$this->db->insert('profesional_servicio',$data);
		return $this->db->insert_id();
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
	public function get_file($file_id){
		$query= $this->db->select()
		->from('profesional_servicio')
		->where('nProId', $file_id)
		->get()
		->row();
		$this->set_cProCarrera($query->cProCarrera);
		$this->set_cProCurriculum($query->cProCurriculum);
		$this->set_cProDescripcion($query->cProDescripcion);
		$this->set_cProEmail($query->cProEmail);
		$this->set_cProNombre($query->cProNombre);
		$this->set_cProWeb($query->cProWeb);
		$this->set_nProEstado($query->nProEstado);
		$this->set_nProId($query->nProId);
		return $query;	 		
	}

	public function delete_file_by_name($name){
		unlink('./cv/' . $name);  
		return TRUE;
	}
	public function update($data,$id){
		$this->db->update( 'profesional_servicio', $data, array( 'nProId' => $id ) );
		return $this->db->affected_rows();
	}

	public function delete( $id ) {
		/*
		* Cualquier carácter que no sea dígito será excluido después de pasar $ id
		* por la función intval. Esto se hace por razones de seguridad.
		*/
	    $id = intval( $id );

	    $data = array('nProEstado' => 0);

	    $this->db->where('nProId', $id);
	    $this->db->update('profesional_servicio', $data); 	    
	} //end delete

}

/* End of file profesionales_model.php */
/* Location: ./application/backend/models/bolsa/profesionales_model.php */

?>