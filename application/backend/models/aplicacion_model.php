<?php
//CODIGO AUTOGENERADO - renzot
//Fecha:12-09-2012 10:25:48
	class Aplicacion_model extends CI_Model {
		//DECLARACION DE VARIABLES
		private $cAplDescripcion ='';
		private $cAplEstado ='';
		private $cAplImagenUrl ='';
		private $nAplId	 ='';

		//CONSTRUCTOR DE LA CLASE
		function __construct($idaplicacion=null){
			parent::__construct();
			if($idaplicacion!=null){
				$this->get_ObjAplicacion($idaplicacion);
			}
		}

		//FUNCIONES SET
		function set_nAplId($nAplId){
			$this->nAplId = $nAplId;
		}
		function set_cAplDescripcion($cAplDescripcion){
			$this->cAplDescripcion = $cAplDescripcion;
		}
		function set_cAplEstado($cAplEstado){
			$this->cAplEstado = $cAplEstado;
		}
		function set_cAplImagenUrl($cAplImagenUrl){
			$this->cAplImagenUrl = $cAplImagenUrl;
		}

		//FUNCIONES GET
		function get_nAplId(){
			return $this->nAplId;
		}
		function get_cAplDescripcion(){
			return $this->cAplDescripcion;
		}
		function get_cAplEstado(){
			return $this->cAplEstado;
		}
		function get_cAplImagenUrl(){
			return $this->cAplImagenUrl;
		}

		//CONSTRUCTOR DEL OBJETO APLICACIÓN
        function get_ObjAplicacion($idaplicacion){
            $query = $this->db->query("SELECT * FROM APLICACION WHERE nAplId=? AND cAplEstado=1", array($idaplicacion));
            if ($query->num_rows() > 0){
                $row = $query->row();
                //CREANDO EL OBJETO
                $this->set_nAplId($row->nAplId);
                $this->set_cAplDescripcion($row->cAplDescripcion);
                $this->set_cAplEstado($row->cAplEstado);
                $this->set_cAplImagenUrl($row->cAplImagenUrl);
            }
        } 
	}
?>