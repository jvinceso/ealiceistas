<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

    class Exalumnos extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content']  = 'exalumnos/exalumnos';
        $data['titulo']        = 'Exalumnos: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadoe'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}