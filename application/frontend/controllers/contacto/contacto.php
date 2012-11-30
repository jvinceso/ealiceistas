<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

    class Contacto extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['main_content']  = 'contacto/contacto';
        $data['titulo']        = 'Contacto: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadoc'] = 'current_page_item';
        $this->load->view('layout/template',$data);
    }
}