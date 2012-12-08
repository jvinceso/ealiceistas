<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

    class Serviciosofrecidos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('serviciosofrecidos/servicios_model','objServicios');        
    }

    public function index() {
        /*Config Paginator*/
        $config = array();
        $config["base_url"] = "http://localhost/ealiceistas/serviciosofrecidos/serviciosofrecidos/index";
        $config["total_rows"] = $this->objServicios->record_count()->filas;
        $config["per_page"] = 2;
        $config['num_links'] = 6;
        $config["uri_segment"] = 4;
        $config['full_tag_open'] = '<div class="holder"><ul class="gallery-pager">';
        $config['full_tag_close'] = '</ul></div>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><center><strong>';
        $config['cur_tag_close'] = '</strong></center></li>';        
        $config['last_tag_open'] = '<li class="last-child">';
        $config['last_tag_close'] = '</li>';

        $page = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        $data["registros"] = $this->objServicios->get_profesionales($config["per_page"], $page);       


        $data['main_content']  = 'serviciosofrecidos/serviciosofrecidos';
        $data['titulo']        = 'Serviciosofrecidos: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadoe'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}