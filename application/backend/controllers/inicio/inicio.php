<?php
if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Inicio extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->_Esta_logeado(); 
    }

    public function index() {
        $data['main_content'] = 'inicio/inicio';
        $data['titulo'] = 'Inicio: Administración Asociación de Ex-Alumnos Liceistas';
        $this->load->view('layout/template',$data);
    }
    function _Esta_logeado() {
        $esta_logeado = $this->session->userdata('esta_logeado');
        $nPerID = $this->session->userdata('nPerID');
        if ($esta_logeado != true OR $nPerID = '') {
            redirect('login/logins');
        }
    }     
}