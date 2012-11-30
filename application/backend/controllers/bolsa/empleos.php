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
		$this->load->view('empleos/qry_view',$data);
		// $this->load->view('layout/template',$data);
	}
	public function nuevo(){
		// $data['titulo'] = '..::Registrar Empleos::..';
		// $this->load->view('empleos/ins_view',$data);		
		$param = $this->input->post('json');
		$this->ObjEmpleo->set_Empleo(array('cEOfTitulo'=>$param['titulo'],'cEOfDescripcion'=>$param['descripcion'],'cEOfBases'=>$param['base']));
	}
	function get_Empleos(){
		echo $this->ObjEmpleo->get_EmpleosOfrecidos();
		$opcionesGrid = array(
		    "Editar"   =>"transferthick-e-w",
		    "Datos Tramite"   =>"contact",
		    );
		echo $this->jqgrid->get_DatosGrid(
		        array(
		            'modelo' => 'bandeja_Model',
		            'metodo' => 'bandejaPersonalGet',
		            'criterios' => array('cUsuNombre' => $nick,'accion' => $param),
		            'pkid' => 'nDocId',
		            // 'cripto' => true,
		            'opciones' =>$opcionesGrid,
		            'columns' => array('nDocId', 'nMovId','nEprId','nEpoId','nProId','cExpNumAnoSigla', 'titular','cProNombre', 'cModNombre','cEtaNombre','opcion'),
		            // 'columns' => array('nDocId', 'cExpNumAnoSigla', 'titular','cProNombre', 'cModNombre','cEtaNombre','opcion'),
		        )
		); 
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