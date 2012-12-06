<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

    class Empleosofrecidos extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('empleosofrecidos/empleos_model','objEmpleo');
    }

    function index() {
        /*Config Paginator*/
        $config = array();
        $config["base_url"] = "http://localhost/ealiceistas/empleosofrecidos/empleosofrecidos/index";
        $config["total_rows"] = $this->objEmpleo->record_count()->filas;
        $config["per_page"] = 4;
        $config['num_links'] = 3;
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

        $data['main_content']  = 'empleosofrecidos/empleosofrecidos';
        $data['titulo']        = 'Empleosofrecidos: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadod'] = 'current_page_item';
        // $limit = ($post=="all") ? 1000 : 3;
        // $data['registros']     =  $this->objEmpleo->get_empleos($limit);
        $page = $this->uri->segment(4);
/*        echo "URI 1 : ";print_r($this->uri->segment(1));echo "<br>";
        echo "URI 2 : ";print_r($this->uri->segment(2));echo "<br>";
        echo "URI 3 : ";print_r($this->uri->segment(3));echo "<br>";
        echo "URI 4 :";print_r($this->uri->segment(4));echo "<br>";
        echo "config_perpage".$config["per_page"]; echo "<br>";
        echo "page".$page;echo "<br>";
        exit();*/
        $this->pagination->initialize($config);
        // $data["links"] = $this->pagination->create_links();

        $data["registros"] = $this->objEmpleo->get_empleos($config["per_page"], $page);

        
        // $this->load->view('empleosofrecidos/empleosofrecidos',$data);
        $this->load->view('layout/template',$data);




        // $this->load->view("example1", $data);

    }
    public function all(){
        // $result = $this->objEmpleo->record_count();
        echo $this->objEmpleo->record_count()->filas;
    }
    public function get_empleos(){
        $data['resultado']  = $this->objEmpleo->get_empleos();
    }
}