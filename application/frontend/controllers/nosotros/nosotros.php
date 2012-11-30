<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Nosotros extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
//        echo "eres un puto genius" ;
        $data['main_content'] = 'nosotros/nosotros';
        $data['titulo'] = 'Nosotros: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadon'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}