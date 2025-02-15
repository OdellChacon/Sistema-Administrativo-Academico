<?php


function horariostable($page){
         $conexion = Conexion::singleton_conexion();

         $RowCount = "SELECT * FROM horarios";
         $counsentence = $conexion -> prepare($RowCount);
         $counsentence -> execute();
         $cuantos = $counsentence -> rowCount();

         $resultados = 15;
         $totalpaginas = ceil($cuantos / $resultados);
         $articuloInicial = ($page - 1) * $resultados;

         if ($page == 1) {
            $SQL = "SELECT * FROM horarios LIMIT 10";
            $paginaActual = 1;
         }else{
            $SQL = "SELECT * FROM horarios LIMIT ".$articuloInicial.", ".$resultados."";
            $paginaActual = $page;
         }

         $sentence = $conexion -> prepare($SQL);
         $sentence -> execute();
         $results = $sentence -> fetchAll();
         if (empty($results)){
         }else{

                 echo'
                   <table class="table table-striped">
                      <thead class="messages-table-header">
                         <tr>
                           <th><i class="fa fa-angle-double-right"></i> Nombre</th>
                           <th><i class="fa fa-angle-double-right"></i> Descripción</th>
                           <th><i class="fa fa-angle-double-right"></i> Fecha</th>
                           <th><i class="fa fa-angle-double-right"></i> Acciones</th>
                         </tr>
                      </thead>
                      <tbody>
                     ';

          foreach ($results as $key){

            $fecha = str_replace('-', '/', date("d-m-Y", strtotime($key['fecha'])));

            echo '
              <tr id="trhorario'.$key['id'].'">
                <td>'.$key['nombre'].'</td>
                <td>'.$key['descripcion'].'</td>
                <td>'.$fecha.'</td>
                <td>
                  <a target="_blank" href="imprimir.php?horario='.$key['id'].'" class="verhorario btn btn-sm btn-success"><i class="fa fa-print"></i>Ver Horario</a>
                </td>
              </tr>
            ';
          }

          echo'
            </tbody>
          </table>
          ';


         }
echo'
<p></p>
<div class="col-md-12 text-right" style="margin-top: 0px;margin-bottom: 10px;padding: 0px 5px;">
<div class="btn-group" role="group" >
';

for ($i=1; $i <= $totalpaginas; $i++) { 
    if($i == $paginaActual){
        echo '<a class="btn btn-warning active">'.$i.'</a>';
    }
    else if($i == 1){
         echo '<a class="btn btn-warning" href="lista.php?page='.$i.'"><i class="glyphicon glyphicon-chevron-left"></i><i class="glyphicon glyphicon-chevron-left"></i> </a>';
     }elseif ($i == $totalpaginas) {
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'"><i class="glyphicon glyphicon-chevron-right"></i><i class="glyphicon glyphicon-chevron-right"></i> </a>';
     }elseif ($i >= $paginaActual && $i <= $paginaActual + 2) {
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'">'.$i.'</a>';
     }elseif ($i >= $paginaActual && $i <= $paginaActual + 3) {
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'">'.$i.'</a>';
     }elseif ($i >= $paginaActual && $i <= $paginaActual + 4) {
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'">'.$i.'</a>';
     }elseif ($i == $paginaActual - 1 ){
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'"><i class="glyphicon glyphicon-chevron-left"></i></a>';
     }elseif ($i == $paginaActual + 5 ){
       echo '<a class="btn btn-warning" rel="nofollow" href="lista.php?page='.$i.'"><i class="glyphicon glyphicon-chevron-right"></i></a>';
     }
}

echo'
</div>
</div>
';

}


function printhorario($data){
$conexion = Conexion::singleton_conexion();

$SQL = 'SELECT * FROM horarios WHERE id = :id LIMIT 1';
$sentence = $conexion -> prepare($SQL);
$sentence -> bindParam(':id',$data,PDO::PARAM_INT);
$sentence -> execute();
$resultados = $sentence -> fetchAll();
if (empty($resultados)){
}else{
   foreach ($resultados as $key){

       echo $key['horario'];
       
   }
  }  
}