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
	public function create(){
		$status = "";
		$msg = "";
		$file_element_name = 'upbase';
		$config['upload_path'] = './files/';
		$config['allowed_types'] = 'pdf|jpg|png|doc|txt';
		$config['max_size']  = 1024 * 8;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload($file_element_name))
		{
			$status = 'error';
			$msg = $file_element_name;
		   // $msg = $this->upload->display_errors('', '');
		}
		else
		{
			$data = $this->upload->data();
			$info = array(
				'cEOfBases'         => $data['file_name'],
				'cEOfDescripcion'   => $this->input->post('descripcion'),
				'cEOfSumilla'  	    => $this->input->post('sumilla'),
				'cEOfTitulo'   	    => $this->input->post('titulo'),
				'dEOfFechaLimite'   => date('Y-m-d',strtotime($this->input->post('fechalim'))),
		   	// 'dEOfFechaLimite'   => date("Y-m-d",strtotime(str_replace('/', '-', $this->input->post('fechalim')))),
				'nEOdEstado'		=> '1'
				);
			$file_id = $this->ObjEmpleo->create($info);
		   // $msg = json_encode($file_id);
			if($file_id)
			{
				$status = "success";
				$msg = "Empleo registrado";
			}
			else
			{
				unlink($data['full_path']);
				$status = "error";
				$msg = "Something went wrong when saving the file, please try again.";
			}
		}
		@unlink($_FILES[$file_element_name]);	
		echo json_encode(array('status' => $status, 'msg' => $msg));			
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
				'columns' => array('cEOfTitulo','cEOfSumilla','cEOfDescripcion','dEOfFechaRegistro','dEOfFechaLimite','opcion'),
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
			$status = "";
			$msg = "";
			$file_element_name = 'txt_perfil_up';
			$config['upload_path'] = './files/';
			$config['allowed_types'] = 'pdf|jpg|png|doc|txt';
			$config['max_size']  = 1024 * 8;
			$config['encrypt_name'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload($file_element_name))
			{
				$status = 'error';
			   	$msg = $this->upload->display_errors('', '');
			}
			else
			{
				$data = $this->upload->data();
				$info = array(
					'cEOfBases' =>$data['file_name'],
					'cEOfDescripcion' => $this->input->post( 'txt_upd_descripcion'),
					'cEOfSumilla' => $this->input->post( 'txt_upd_sumilla'),
					'cEOfTitulo' => $this->input->post( 'txt_upd_requerimiento'),
					'dEOfFechaLimite' => date('Y-m-d',strtotime($this->input->post( 'txt_upd_flimit'))),
					);
				$id = $this->input->post( 'txt_upd_nEmplId');
				$this->ObjEmpleo->get_file($id);
				$file_id = $this->ObjEmpleo->update($info,$id);
			   // $msg = json_encode($file_id);
				if($file_id)
				{
					$this->ObjEmpleo->delete_file_by_name($this->ObjEmpleo->get_cEOfBases());
					$status = "success";
					$msg    = 'Registro Actualizado Correctamente!';
					// $msg = "Empleo registrado";
				}
				else
				{
					unlink($data['full_path']);
					$status = "error";
					$msg = "Something went wrong when saving the file, please try again.";
				}
			}
			@unlink($_FILES[$file_element_name]);	
		}else{
			$status = "error";
			$msg = "Completar Los Datos";			
		}
		echo json_encode(array('status' => $status, 'msg' => $msg));			
	}

	public function read(){
		return $this->load->view('empleos/empleos_qry_view',TRUE);
	}

	public function files($idEmpleo){
		$files = $this->files_model->get_files($idEmpleo);
		$this->load->view('empleos/empleos_files_view', array('files' => $files));
	}

	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Identificación no proporcionada.';
			return;
		}
		
		$this->ObjEmpleo->delete( $id );
		echo 'Los registros se han borrados con éxito';
	}	
	public function _Esta_logeado() {
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