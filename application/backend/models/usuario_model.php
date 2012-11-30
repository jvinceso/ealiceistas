<?php
require_once('persona/persona_model.php');

    class Usuario_model extends Persona_model {
        private $nUsuCodigo;
        // private $nPerId='';
        private $cUsuNick;
        private $cUsuClave;
        private $nUsuTipo;
        private $cUsuEstado;
        
        function __construct($idusuario=null){
            parent::__construct();
            if($idusuario!=null){
                $this->get_ObjUsuario($idusuario);
            } 
        }

        function set_nUsuCodigo($nUsuCodigo){
            $this->nUsuCodigo = $nUsuCodigo;
        }
/*        function set_nPerId($nPerId){
            $thi->nPerId = $nPerId;
        }*/
        function set_cUsuNick($cUsuNick){
            $this->cUsuNick = $cUsuNick;
        }
        function set_cUsuClave($cUsuClave){
            $this->cUsuClave = $cUsuClave;
        }
        function set_nUsuTipo($nUsuTipo){
            $this->nUsuTipo = $nUsuTipo;
        }
        function set_cUsuEstado($cUsuEstado){
            $this->cUsuEstado = $cUsuEstado;
        }
// Getters
        function get_nUsuCodigo(){
            return $this->nUsuCodigo;
        }
/*        function get_nPerId(){
            return $thi->nPerId;
        }*/
        function get_cUsuNick(){
            return $this->cUsuNick;
        }
        function get_cUsuClave(){
            return $this->cUsuClave;
        }
        function get_nUsuTipo(){
            return $this->nUsuTipo;
        }
        function get_cUsuEstado(){
            return $this->cUsuEstado;
        }
        public function get_ObjUsuario($idusuario){
            // echo "idusuario :_".$idusuario;
            if($idusuario != null){
                $query = $this->db->where( 'nUsuCodigo', $idusuario )->limit( 1 )->get( 'usuario' );
               if ($query){
                    $row = $query->row();
                    $this->set_nUsuCodigo($row->nUsuCodigo);
                    $this->set_cUsuNick($row->cUsuNick);
                    $this->set_cUsuClave($row->cUsuClave);
                    $this->set_nUsuTipo($row->nUsuTipo);
                    $this->set_cUsuEstado($row->cUsuEstado);
                    $this->personaGet($row->nPerId);
                }
                else{
                    echo "Errror";
                }
            }
        }   

        function autenticarx($data) {      
            // $query = $this->db->query("SELECT `nUsuCodigo`, `nPerId` FROM `usuario` WHERE cUsuNick=? AND cUsuClave=?",$data);
            $query = $this->db->query("CALL usp_s_usuario_login(?,?)",$data);
            if ($query->row()){
                $row = $query->row();
                $nPerId = $row->nPerId; 
                $this->set_nUsuCodigo($row->nUsuCodigo);
                $nUsuCodigo = $row->nUsuCodigo;
                // $this->personaGet($row->nPerId);
                $this->get_ObjUsuario($nUsuCodigo);
                $nUsuCodigo = $row->nPerId;

                return true;
            }
            return false;
        }
}

