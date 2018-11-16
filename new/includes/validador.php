<?
//Array con las posibles cabeceras a utilizar por un spammer
        function ValidarDatos($campo){
         
          $badHeads = array("Content-Type:",
                                       "MIME-Version:",
                                       "Content-Transfer-Encoding:",
                                       "Return-path:",
                                       "Subject:",
                                       "From:",
                                       "Envelope-to:",
                                       "To:",
                                       "bcc:",
                                       "cc:");

          //Comprobamos que entre los datos no se encuentre alguna de
          //las cadenas del array. Si se encuentra alguna cadena se
          //dirige a una página de Forbidden
          foreach($badHeads as $valor){ 
            if(strpos(strtolower($campo), strtolower($valor)) !== false){ 
              header("HTTP/1.0 403 Forbidden"); 
              exit; 
            } 
		   }
          } 
    ?>