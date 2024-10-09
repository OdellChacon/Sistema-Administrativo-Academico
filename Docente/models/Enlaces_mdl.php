<?php

    class Enlaces_Mdl{

        static public function Redirecciones($Enlaces){
            if($Enlaces == "ingreso" || $Enlaces == "salida" || $Enlaces == "Carga_Notas" || $Enlaces == "calificaciones"
            || $Enlaces == "Calificar" || $Enlaces == "pag_pri" || $Enlaces == "horarios" || $Enlaces == "lista_horarios" || $Enlaces == "rep_horario" || $Enlaces == "asignar_grupos" 
            || $Enlaces == "listados_menu" || $Enlaces == "lista_salones" || $Enlaces == "boletin"){
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