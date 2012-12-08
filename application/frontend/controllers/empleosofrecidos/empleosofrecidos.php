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
        $config["total_rows"] = $this->objEmpleo->record_count_paginator_fechas()->filas;
        $config["per_page"] = 4;
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

        $data['main_content']  = 'empleosofrecidos/empleosofrecidos';
        $data['titulo']        = 'Empleosofrecidos: Asociación de Ex-Alumnos Liceistas';
        $data['seleccionadod'] = 'current_page_item';

        $page = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();

        $data["registros"] = $this->objEmpleo->get_empleos($config["per_page"], $page);

        $this->load->view('layout/template',$data);

    }
    public function anuncio($nEofId,$nTitle){
        $data['main_content']  = 'empleosofrecidos/empleosofrecidos';
        $data['more']  = 'ok';
        $data['titulo']        = 'Empleosofrecidos: Asociación de Ex-Alumnos Liceistas';
        $data["fila"] = $this->objEmpleo->getById($nEofId);
        /*getById*/
        $this->load->view('layout/template',$data);        
    }
    public function get_empleos(){
        $data['resultado']  = $this->objEmpleo->get_empleos();
    }
    public function download($nombre){
        if(isset($nombre)){
            $root = "./files/";
            $file = basename($nombre);
            $path = $root.$file;
            $file2 = realpath($path);
            $type = '';
            $size = filesize($path);
            print_r($size);echo"<br>";
            print_r($size);echo"<br>";
            print_r($file2);echo"<br>";
        } else {
           die("Falta el parametro nombre.");
       }
   }
}