<?php
require_once('Aplicacion_model.php');
//CODIGO AUTOGENERADO - renzot
//Fecha:12-09-2012 10:24:48
	class Objeto_model extends Aplicacion_model{
		//DECLARACION DE VARIABLES
		private $nObjId = '';
		private $cObjNombre = '';
		private $cObjNombreArchivo = '';
		private $nObjIdPadre = '';
		private $cObjEstado = '';
		private $bObjTipo = '';
		//CONSTRUCTOR DE LA CLASE
		function __construct($idobjeto=null){
			parent::__construct();
			if($idobjeto!=null){
				$this->get_ObjObjeto($idobjeto);
			}
		}

		//FUNCIONES SET
		function set_nObjId($nObjId){
			$this->nObjId = $nObjId;
		}
		// function setnAplId($nAplId){
		// 	$this->nAplId = $nAplId;
		// }
		function set_cObjNombre($cObjNombre){
			$this->cObjNombre = $cObjNombre;
		}
		function set_cObjNombreArchivo($cObjNombreArchivo){
			$this->cObjNombreArchivo = $cObjNombreArchivo;
		}
		function set_nObjIdPadre($nObjIdPadre){
			$this->nObjIdPadre = $nObjIdPadre;
		}
		function set_cObjEstado($cObjEstado){
			$this->cObjEstado = $cObjEstado;
		}
		function set_bObjTipo($bObjTipo){
			$this->bObjTipo = $bObjTipo;
		}

		//FUNCIONES GET
		function get_nObjId(){
			return $this->nObjId;
		}
		// function getnAplId(){
		// 	return $this->nAplId;
		// }
		function get_cObjNombre(){
			return $this->cObjNombre;
		}
		function get_cObjNombreArchivo(){
			return $this->cObjNombreArchivo;
		}
		function get_nObjIdPadre(){
			return $this->nObjIdPadre;
		}
		function get_cObjEstado(){
			return $this->cObjEstado;
		}
		function get_bObjTipo(){
			return $this->bObjTipo;
		}

		//CONSTRUCTOR DEL OBJETO OBJETO
        function get_ObjObjeto($idobjeto){
            $query = $this->db->query("SELECT * FROM OBJETO WHERE nObjId=? AND cObjEstado=0", array($idobjeto));
            if ($query->num_rows() > 0){
                $row = $query->row();
                //CREANDO EL OBJETO
                $this->set_nObjId($row->nObjId);
                $this->set_cObjNombre($row->cObjNombre);
                $this->set_cObjNombreArchivo($row->cObjNombreArchivo);
                $this->set_nObjIdPadre($row->nObjIdPadre);
                $this->set_cObjEstado($row->cObjEstado);
                $this->set_bObjTipo($row->bObjTipo);

                $this->get_ObjAplicacion($row->nAplId);
            }
        }

        //LISTA DE MENU CON OPCIONES
        function listaMenuOpciones(){
        	$resultado = array(); 
        	$cabecera="";
        	$menu="";
        	$ul="";
        	$active="";
        	$opciones="";
        	$iduser = $this->session->userdata('IDUsu');
        	$url = $this->session->userdata('url');        	
			$query = $this->db->query("SELECT * FROM aplicaciones WHERE cAplEstado='1'"); 			
        	$apl='';  
        	foreach ($query->result() as $row){
        		$opt = $this->listaSubMenus('W',$iduser,$row->nAplId);
				if($opt != null){

					$cabecera = '
					<a href="#" class="light toggle-collapsed">
						<div class="ico">
							<i class="icon-th-large icon-white"></i>
						</div>'.
						$row->cAplNombre.'<img src="'.URL_IMG.'dashboard/toggle-subnav-down.png" alt="">
					</a>';
					$opciones="";
					$ul='<ul class="collapsed-nav closed">';
					$active = "<li>";
					foreach ($opt->result() as $opcion){
						if($url){
							if($opcion->cOdetNombreArchivo==$url){
								$active = "<li class=\"active open\">";
								$ul='<ul class="collapsed-nav closed" style="display:block">';
								$opciones .= '<li class="active">';
							}
							else{
							$opciones .= '<li>';
							}
						}
						// $menu .= '<li><a onclick="'.$opcion->cObjNombreArchivo.'" href="#">'.$opcion->cObjNombre.'</a></li>'; 
						// $opciones .= '<a class="transition" href="'.$opcion->cOdetNombreArchivo.'">'.$opcion->cObjNombre.'</a></li>';
						$opciones .= '<a href="'.$opcion->cOdetNombreArchivo.'">'.$opcion->cObjNombre.'</a></li>';
						$array[] = array(
	        				"url" => $opcion->cOdetNombreArchivo,
	        				"value" => $opcion->cObjNombre
	        			);
					}
					$menu .= $active;
					$menu .= $cabecera;
					$menu .= $ul;
					$menu .= $opciones;
					$menu .= '</ul>';
					$menu .= "</li>"; 

					$resultado[$row->cAplNombre] =  $array;
				}
			}
			// var_dump($resultado);        	
            return $menu;
        }

        function listaMenuOpciones2(){
        	$resultado = array();  
        	$ul="";
        	$active="";
        	$opciones="";
        	$url = $this->session->userdata('url');       
        	// echo"URL_SESSION<br>";print_r($url);echo"<br>END<br>";
			$query = $this->db->where("cAplEstado","1")->get("aplicaciones");  
        	foreach ($query->result() as $row){
        		$opt = $this->listaSubMenus('W',$row->nAplId);
				if($opt != null){ 
					$active ='';
					$opciones='';
					$body='class="accordion-body collapse" style="height:0;" ';
					$array = array();
					foreach ($opt->result() as $opcion){
						if($url){
							// print_r($opcion->cOdetNombreArchivo);echo"<br>";
							if(!strcmp($opcion->cOdetNombreArchivo, $url)){
								$active = 'sdb_h_active';
								// echo $active;
								$body='class="accordion-body in collapse" style="height:auto;"';
								$opciones = '';
								// $opciones = 'class="sdb_h_active"';
							}
/*							else{
								$opciones = '';
								$active = '';
								$body='class="accordion-body collapse"';
							}*/
						}
						$array[] = array(
	        				"value" => $opcion->cObjNombre,
	        				"url" => $opcion->cOdetNombreArchivo,
	        				"li" => $opciones
	        			);
					}

					$resultado[] =  array(
						'menu' => $row->cAplDescripcion,
						'datos' => $array,
						'icon' => $row->cAplImagenUrl,
						'active' => $active,
						'ul' => $ul,
						'body' => $body
						);
				}
			}        	
            return $resultado;
        }
        
        //LISTA DE SUBMENUS
        function listaSubMenus($plataforma, $idaplicacion){
        	$idusuario = $this->session->userdata('IDUsu');
        	$query = $this->db->query("call usp_s_menu_todos (?,?,?)", array($plataforma, $idusuario, $idaplicacion));

            if($query->num_rows() > 0){
            	return $query;
            }
            return null;
        }
	}
?>