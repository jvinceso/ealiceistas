<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

    class Empleosofrecidos extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content']  = 'empleosofrecidos/empleosofrecidos';
        $data['titulo']        = 'Empleosofrecidos: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadod'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}