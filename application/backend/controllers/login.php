<?php

if (!defined('BASEPATH'))
    exit('No esta permitido el acceso');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->model('usuario_model', 'objUsuario');
    }

    function logins() {
        // echo "SDVS";
        $data['titulo'] = 'Login: Administración Asociación de Ex-Alumnos Liceistas';
        $this->load->view('login/login', $data);
    }

    function autenticar() {
        // echo "SAO";
        $this->form_validation->set_rules('username', 'Nick', 'required|trim');
        $this->form_validation->set_rules('pass', 'Contraseña', 'required|trim|md5');
        $this->form_validation->set_message('required', 'El %s es requerido');
        if ($this->form_validation->run() == true) {
            $data['cUsuNick']= $this->input->post('username');
            $data['cUsuClave']= $this->input->post('pass');
            // print_r($data);exit();
           $login = $this->objUsuario->autenticarx($data);
            if ($login) {
                $data = array(
                    'esta_logeado' => true,
                    'nick' => $this->objUsuario->get_cUsuNick(),
                    'Nombres' => $this->objUsuario->get_cPerApellidoPaterno() . ' ' . $this->objUsuario->get_cPerApellidoMaterno() . ', ' . $this->objUsuario->get_cPerNombres(),
                    'IDUsu' => $this->objUsuario->get_nUsuCodigo(),
                    'IDPer' => $this->objUsuario->get_nPerId()
                     );
                $this->session->set_userdata($data);
                redirect('inicio/inicio');
            } else {
                $this->logins();
            }
        } else {
            $this->logins();
        }
    }
    function get_ObjUsuarios($param){
        // echo "K";
        print_r($this->objUsuario->get_ObjUsuario($param));
        echo"<br>";
        print_r($this->objUsuario->get_cUsuClave());
    }
    function personaGets($param){
        echo "I";
        var_dump($this->objUsuario->personaGet($param));
        print_r($this->objUsuario->get_cPerApellidoPaterno());        
    }
}