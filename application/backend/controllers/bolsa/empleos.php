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
		            'modelo' => 'empleos_model',
		            'metodo' => 'empleos',
		            // 'criterios' => array('cUsuNombre' => $nick,'accion' => $param),
		            'pkid' => 'nEOfId',
		            // 'cripto' => true,
		            'opciones' =>$opcionesGrid,
		            'columns' => array('cEOfTitulo','cEOfSumilla','cEOfTitulo','cEOfDescripcion','cExpNumAnoSigla', 'dEOfFechaRegistro','opcion'),
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