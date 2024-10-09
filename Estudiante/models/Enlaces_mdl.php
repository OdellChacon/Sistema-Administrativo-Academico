<?php

    class Enlaces_Mdl{

        static public function Redirecciones($Enlaces){
            if($Enlaces == "ingreso" || $Enlaces == "salida" || $Enlaces == "calificaciones" || $Enlaces == "horarios" || $Enlaces == "lista_horarios" || $Enlaces == "rep_horario" || $Enlaces == "listados_menu" || $Enlaces == "boletin"){
                $modulo = "views/modules/".$Enlaces.".php";
            }

            elseif ($Enlaces == "index"){
                $modulo = "views/modules/Menu_Principal.php";
            }

            else{
                $modulo = "views/modules/error_404.php";
            }

            return $modulo;
        }


    }

?>