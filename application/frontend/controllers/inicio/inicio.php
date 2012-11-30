<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Inicio extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content'] = 'inicio/inicio';
        $data['titulo'] = 'Inicio: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadoi'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}