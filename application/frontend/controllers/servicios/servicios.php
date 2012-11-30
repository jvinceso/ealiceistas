<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Servicios extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content']  = 'servicios/servicios';
        $data['titulo']        = 'Servicios: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionados'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}