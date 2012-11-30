<?php
class Persona_model extends CI_Model {
    //atributos 
    private $nPerId='';
    private $nUbiId='';
    private $cPerApellidoPaterno='';
    private $cPerApellidoMaterno='';
    private $cPerNombres='';
    private $cPerEstado='';
    private $cUbiIdDepartamento='';
    private $cUbiIdProvincia='';
    private $cUbiIdDistrito='';
    private $cPerRandom='';
    function __construct($nPerId=null) {
        parent::__construct();
    }    
//Setter's
    public function set_nPerId($nPerId){
        $this->nPerId = $nPerId;
    }
    public function set_nUbiId($nUbiId){
        $this->nUbiId = $nUbiId;
    }
    public function set_cPerApellidoPaterno($cPerApellidoPaterno){
        $this->cPerApellidoPaterno = $cPerApellidoPaterno;
    }
    public function set_cPerApellidoMaterno($cPerApellidoMaterno){
        $this->cPerApellidoMaterno = $cPerApellidoMaterno;
    }
    public function set_cPerNombres($cPerNombres){
        $this->cPerNombres = $cPerNombres;
    }
    public function set_cPerEstado($cPerEstado){
        $this->cPerEstado = $cPerEstado;
    }
    public function set_cUbiIdDepartamento($cUbiIdDepartamento){
        $this->cUbiIdDepartamento = $cUbiIdDepartamento;
    }
    public function set_cUbiIdProvincia($cUbiIdProvincia){
        $this->cUbiIdProvincia = $cUbiIdProvincia;
    }
    public function set_cUbiIdDistrito($cUbiIdDistrito){
        $this->cUbiIdDistrito = $cUbiIdDistrito;
    }
    public function set_cPerRandom($cPerRandom){
        $this->cPerRandom = $cPerRandom;
    }
//Getter's
    public function get_nPerId(){
        return $this->nPerId;
    }
    public function get_nUbiId(){
        return $this->nUbiId;
    }
    public function get_cPerApellidoPaterno(){
        return $this->cPerApellidoPaterno;
    }
    public function get_cPerApellidoMaterno(){
        return $this->cPerApellidoMaterno;
    }
    public function get_cPerNombres(){
        return $this->cPerNombres;
    }
    public function get_cPerEstado(){
        return $this->cPerEstado;
    }
    public function get_cUbiIdDepartamento(){
        return $this->cUbiIdDepartamento;
    }
    public function get_cUbiIdProvincia(){
        return $this->cUbiIdProvincia;
    }
    public function get_cUbiIdDistrito(){
        return $this->cUbiIdDistrito;
    }
    public function get_cPerRandom(){
        return $this->cPerRandom;
    }
// Logica de la Clase
    function personaGet($nPerId){
        $query = $this->db->query("SELECT nPerId,nUbiId,cPerApellidoPaterno,cPerApellidoMaterno,cPerNombres,cPerEstado,cUbiIdDepartamento,cUbiIdProvincia,cUbiIdDistrito,cPerRandom FROM persona where nPerId = ?",$nPerId);
        if ($query->num_rows()>0) {
            $fila = $query->row();
            $this->set_nPerId($fila->nPerId);
            $this->set_nUbiId($fila->nUbiId);
            $this->set_cPerApellidoPaterno($fila->cPerApellidoPaterno);
            $this->set_cPerApellidoMaterno($fila->cPerApellidoMaterno);
            $this->set_cPerNombres($fila->cPerNombres);
            $this->set_cPerEstado($fila->cPerEstado);
            $this->set_cUbiIdDepartamento($fila->cUbiIdDepartamento);
            $this->set_cUbiIdProvincia($fila->cUbiIdProvincia);
            $this->set_cUbiIdDistrito($fila->cUbiIdDistrito);
            $this->set_cPerRandom($fila->cPerRandom);
            // return true;
        }else{
            return false;
        }
    }

}
?>