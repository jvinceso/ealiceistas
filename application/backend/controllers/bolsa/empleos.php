<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Empleos extends CI_Controller {
	
	function __construct() {
	    parent::__construct();
	    $this->_Esta_logeado(); 
		$this->load->model('bolsa/empleos_model','ObjEmpleo');
	}	
	public function index(){
		// print_r($this->ObjEmpleo->get_EmpleosOfrecidos());
		$data['result'] = $this->ObjEmpleo->get_EmpleosOfrecidos();
		$data['titulo'] = '..::Anuncios Empleos::..';
		// $data['grilla'] = $this->load->view('empleos/empleos_view',$data);
		$this->load->view('empleos/empleos_view',$data);
		// $this->load->view('layout/template',$data);
	}
	public function nuevo(){
		// $data['titulo'] = '..::Registrar Empleos::..';
		// $this->load->view('empleos/ins_view',$data);		
		$param = $this->input->post('json');
		$this->ObjEmpleo->set_Empleo(array('cEOfTitulo'=>$param['titulo'],'cEOfDescripcion'=>$param['descripcion'],'cEOfBases'=>$param['base']));
	}
	function get_Empleos(){
		$opcionesGrid = array(
		    "Editar"   =>"pencil",
		    "Datos Tramite"   =>"circle-close",
		    );
		echo $this->jqgrid->get_DatosGrid(
		        array(
		            'modelo' => 'ObjEmpleo',
		            'metodo' => 'get_EmpleosOfrecidos',
		            'criterios' =>'',
		            'pkid' => 'nEOfId',
		            // 'cripto' => true,
		            'opciones' =>$opcionesGrid,
		            'columns' => array('cEOfTitulo','cEOfSumilla','cEOfDescripcion','dEOfFechaRegistro','opcion'),
		            // 'columns' => array('nDocId', 'cExpNumAnoSigla', 'titular','cProNombre', 'cModNombre','cEtaNombre','opcion'),
		        )
		); 
	}
	public function getById($id){
		if(isset($id))
			echo json_encode( $this->ObjEmpleo->getById( $id ) );
	}
	public function update() {
		if( !empty( $_POST ) ) {
			$this->ObjEmpleo->update();
			echo 'Registro Actualizado Correctamente!';
		}
	}	
	public function read(){
		$this->load->view('empleos/empleos_qry_view');
	}
	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Identificación no proporcionada.';
			return;
		}
		
		$this->ObjEmpleo->delete( $id );
		echo 'Los registros se han borrados con éxito';
	}	
	function _Esta_logeado() {
	    $esta_logeado = $this->session->userdata('esta_logeado');
	    $nPerID = $this->session->userdata('nPerID');
	    if ($esta_logeado != true OR $nPerID = '') {
	        redirect('login/logins');
	    }
	} 	

}

/* End of file empleos.php */
/* Location: ./application/backend/controllers/bolsa/empleos.php */

?>