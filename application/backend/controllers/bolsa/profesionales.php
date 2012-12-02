<?php if ( ! defined('BASEPATH')) exit('No Tienes Acceso Fuera de Aqui!!!');

class Profesionales extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->_Esta_logeado(); 
		$this->load->model('bolsa/profesional_model','ObjProfesional');
	}	
	public function index(){
		$data['titulo']       = '..::Anuncios Profesionales::..';
		/*$data['main_content'] = 'empleos/profesionales_view';
		$this->load->view('layout/template',$data);*/
		$this->load->view('empleos/profesionales_view',$data);
	}
	public function _Esta_logeado() {
		$esta_logeado = $this->session->userdata('esta_logeado');
		$nPerID = $this->session->userdata('nPerID');
		if ($esta_logeado != true OR $nPerID = '') {
			redirect('login/logins');
		}
	}

	public function get_profesionales(){
		$opcionesGrid = array(
			"Editar"   =>"pencil",
			"Datos Tramite"   =>"circle-close",
			);
		echo $this->jqgrid->get_DatosGrid(
			array(
				'modelo' => 'ObjProfesional',
				'metodo' => 'get_Profesionales',
				'criterios' =>'',
				'pkid' => 'nProId',
		        // 'cripto' => true,
				'opciones' =>$opcionesGrid,
				'columns' => array('cProNombre','cProCarrera','cProEmail','cProWeb','cProDescripcion','opcion'),
				)
			); 		
	}

	public function create(){
		$status = "";
		$msg = "";
		$file_element_name = 'txt_curriculum';
		$config['upload_path'] = './cv/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = 1024 * 10;
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload($file_element_name))
		{
			$status = 'error';
			// $msg = $file_element_name; 
		   $msg = $this->upload->display_errors('', '');
		}
		else
		{
			$data = $this->upload->data();
			$info = array(
				'cProCarrera'      => $this->input->post('txt_carrera'),
				'cProCurriculum'   => $data['file_name'],
				'cProDescripcion'  => $this->input->post('txt_presentacion'),
				'cProEmail'   	   => $this->input->post('txt_email'),
				'cProNombre'   	   => $this->input->post('txt_nombre'),
				'cProWeb'   	   => $this->input->post('txt_web'),
				'nProEstado'	   => '1'
				);
			$file_id = $this->ObjProfesional->create($info);
		   // $msg = json_encode($file_id);
			if($file_id)
			{
				$status = "success";
				$msg = "Profesional registrado";
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

	public function getById($id){
		if(isset($id))
			echo json_encode( $this->ObjProfesional->getById( $id ) );
	}

	public function read(){
		return $this->load->view('empleos/profesionales_qry_view',TRUE);
	}	

	public function update() {
		if( !empty( $_POST ) ) {
			$status = "";
			$msg = "";
			$file_element_name = 'txt_upd_curriculum';
			$config['upload_path'] = './cv/';
			$config['allowed_types'] = 'pdf';
			$config['max_size']  = 1024 * 10;
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
					'cProCarrera'      => $this->input->post('txt_upd_carrera'),
					'cProCurriculum'   => $data['file_name'],
					'cProDescripcion'  => $this->input->post('txt_upd_presentacion'),
					'cProEmail'   	   => $this->input->post('txt_upd_email'),
					'cProNombre'   	   => $this->input->post('txt_upd_nombre'),
					'cProWeb'   	   => $this->input->post('txt_upd_web')
					);
				$id = $this->input->post( 'txt_upd_nProId');
				$this->ObjProfesional->get_file($id);
				$file_id = $this->ObjProfesional->update($info,$id);
			   // $msg = json_encode($file_id);
				if($file_id)
				{
					$this->ObjProfesional->delete_file_by_name($this->ObjProfesional->get_cProCurriculum());
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

	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Identificación no proporcionada.';
			return;
		}
		
		$this->ObjProfesional->delete( $id );
		echo 'Los registros se han borrados con éxito';
	}		


}

/* End of file profesionales.php */
/* Location: ./application/backend/controllers/bolsa/profesionales.php */

?>