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
// $this->db->from($this->table_name);

// $query = $this->db->get(); 
// return $query->result();
		// $this->db
		$result = $this->db->where('nEOdEstado',1)->order_by("dEOfFechaRegistro", "desc")->get('empleo_ofrecido');
		if($result){
			return $result->result_array();
		}
	}
/*	public function set_Empleo($data){
		$this->db->insert('empleo_ofrecido',$data);
	}*/

	public function getAll() {
	    //Obtiene Todos Los Registros de la Tabla empleo_ofrecido
	    $query = $this->db->where('nEOdEstado',1)->get( 'empleo_ofrecido' );
	    
	    if( $query->num_rows() > 0 ) {
	        return $query->result();
	    } else {
	        return array();
	    }
	} //end getAll
	public function delete( $id ) {
		/*
		* Cualquier carácter que no sea dígito será excluido después de pasar $ id
		* por la función intval. Esto se hace por razones de seguridad.
		*/
	    $id = intval( $id );

	    $data = array('nEOdEstado' => 0);

	    $this->db->where('nEOfId', $id);
	    $this->db->update('empleo_ofrecido', $data); 	    
	} //end delete
	public function getById($id){
		$id = intval( $id );
		
		$query = $this->db->where( array('nEOfId'=>$id,'nEOdEstado' => 1) )->limit( 1 )->get( 'empleo_ofrecido' );
		
		if( $query->num_rows() > 0 ) {
		    return $query->row();
		} else {
		    return array();
		}		
	}
	public function update($data,$id) {
	    $this->db->update( 'empleo_ofrecido', $data, array( 'nEOfId' => $id ) );
	    return $this->db->affected_rows();
	}	
	public function create($data){
		// print_r($data);exit();
		// $sql = "INSERT INTO `bd_aeal`.`empleo_ofrecido`(`cEOfBases`,`cEOfDescripcion`,`cEOfSumilla`,`cEOfTitulo`,`dEOfFechaLimite`,`nEOdEstado`)VALUES('".$data['cEOfBases']."','".$data['cEOfDescripcion']."','".$data['cEOfSumilla']."','".$data['cEOfTitulo']."','".$data['dEOfFechaLimite']."','".$data['nEOdEstado']."');";
		// $this->db->query($sql);
		$this->db->insert('empleo_ofrecido',$data);
		return $this->db->insert_id();
		// return $sql;
	}

	public function delete_file($file_id)
	{
	   $file = $this->get_file($file_id);
	   unlink('./files/' . $file->cEOfBases);  
	   return TRUE;
	}
	public function delete_file_by_name($name)
	{
	   unlink('./files/' . $name);  
	   return TRUE;
	}
	 
	public function get_file($file_id)
	{
		// $query = new stdClass();
	   $query= $this->db->select()
	         ->from('empleo_ofrecido')
	         ->where('nEOfId', $file_id)
	         ->get()
	         ->row();
	         // print_r($query);exit();
		$this->set_nEOfId($query->nEOfId);
		$this->set_cEOfTitulo($query->cEOfTitulo);
		$this->set_cEOfDescripcion($query->cEOfDescripcion);
		$this->set_cEOfBases($query->cEOfBases);
		return $query;	         
	}


/* End of file empleos_model.php */
/* Location: ./application/backend/models/bolsa/empleos_model.php */

}
?>