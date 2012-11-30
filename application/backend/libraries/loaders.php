<?php
class Loaders {
    public function get_menu() {
        $CI = & get_instance();
        $CI->load->model('objeto_model', 'objObjeto');
        $url = '../'.$CI->uri->segment(1) . '/' . $CI->uri->segment(2);
        $data=array('url' => $url);
        
        $CI->session->set_userdata($data); 
        return $CI->objObjeto->listaMenuOpciones2();
    } 

/*    //VERIFICAR ACCESO DE USUARIO
    public function verificaAcceso($plataforma) {
        $CI = & get_instance();
        $iduser = $CI->session->userdata('IDUsu');
        if($iduser){
            $url = $CI->uri->segment(1) . '/' . $CI->uri->segment(2);
            $iduser = $CI->session->userdata('IDUsu');
            $query = $CI->db->query("EXEC USP_GEN_S_VALIDA_ACCESO_MENU ?,?,?", array($plataforma, $iduser, $url));

            if ($query->num_rows() > 0) {
                return true;
            }
            show_error(utf8_decode('<center><div style="display: table-cell;vertical-align: middle;position: relative;"><center><br/><p><img src="http://172.20.1.50/oficinavirtual/img/dashboard/error.gif"/><h2 style="color:black;">No cuenta con los privilegios suficientes para acceder a esta pagina.</h2><h4 style="color:black;"><i>Su intento ha sido registrado, y conocemos a su familia. JA JA JA!</i><br/>Si vuelve a intentarlo, gringasho visitará mañana su hogar.</h4></p></center></div></center>'), 500);
        }
        else{
            redirect('usuario/login');
        }
    }*/

    //EVITAR INYECCION SQL probando
    public function FiltrarTexto($str, $html=true, $e='ISO-8859-15'){
        if(is_array($str))
        {
            $final = array();
            
            foreach($str as $param => $value)
                $final[$param] = self::FilterText($value, $html, $e);
                
            return $final;
        }
        
        if(!is_string($str))
            return $str;
            
        if(self::isUtf8($str))
            $e = 'UTF-8';
        
        $str = stripslashes(trim($str));
        
        if($html)
            $str = htmlentities($str, ENT_QUOTES, $e, false);
            
        $str = self::escape($str);
        $str = str_replace('&amp;', '&', $str);
        $str = iconv($e, 'ISO-8859-15//TRANSLIT//IGNORE', $str);
        
        return nl2br($str);
    }

    public function isUtf8($str){ 
        $len = strlen($str); 
        
        for($i = 0; $i < $len; $i++)
        { 
            $c = ord($str[$i]);
            
            if ($c > 128) 
            { 
                if(($c > 247)) 
                    return false; 
                else if($c > 239) 
                    $bytes = 4; 
                else if($c > 223) 
                    $bytes = 3; 
                else if($c > 191)
                    $bytes = 2; 
                else 
                    return false; 
            
                if(($i + $bytes) > $len) 
                    return false; 
                    
                while ($bytes > 1) 
                { 
                    $i++; 
                    $b = ord($str[$i]); 
                    
                    if($b < 128 || $b > 191) 
                        return false;
                        
                    $bytes--; 
                } 
            } 
        }
        
        return true; 
    }

    function escape($str, $magic_quotes = false){
        switch ( gettype ( $str ) )
        {
        case 'string'   :
        $replaceQuote = "\\'"; /// string to use to replace quotes
        if ( ! $magic_quotes ) {
         
        if ( $replaceQuote [ 0 ] == '\\' ){
        // only since php 4.0.5
        //$str = seo_str_replace ( array ( '\\', "\0" ), array ( '\\\\', "\\\0" ), $str );
        $str = str_replace("\0","\\\0", str_replace('\\','\\\\',$str));
        }
        return "'" . str_replace ( "'", $replaceQuote, $str ) . "'";
        }
         
        // undo magic quotes for "
        $str = str_replace ( '\\"','"', $str );
         
        if ( $replaceQuote == "\\'" ) {// ' already quoted, no need to change anything
        return "'$str'";
        }
        else {// change \' to '' for sybase/mssql
        $str = str_replace ( '\\\\','\\', $str );
        return "'" . str_replace ( "\\'", $treplaceQuote, $str ) . "'";
        }
        break;
        case 'boolean'  :   $str = ($str === FALSE) ? 0 : 1;
        return $str;
        break;
        case 'integer'  :   $str = ($str === NULL) ? 'NULL' : $str;
        return $str;
        break;
        default :   $str = ($str === NULL) ? 'NULL' : $str;
        return $str;
        break;
        }
    }

    function encrypt($string) {
       $result = '';
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr(KEY_ENCRIPT, ($i % strlen(KEY_ENCRIPT))-1, 1);
          $char = chr(ord($char)+ord($keychar));
          $result.=$char;
       }
       return base64_encode($result);
    }

    function decrypt($string) {
       $result = '';
       $string = base64_decode($string);
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr(KEY_ENCRIPT, ($i % strlen(KEY_ENCRIPT))-1, 1);
          $char = chr(ord($char)-ord($keychar));
          $result.=$char;
       }
       return $result;
    }

}