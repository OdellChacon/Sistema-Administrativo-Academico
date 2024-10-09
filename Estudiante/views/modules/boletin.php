<?php

if(isset($_SESSION["Estudiante"])){
    if($_SESSION["Estudiante"] != "ok"){
        echo "<script>window.location='index.php?action=ingreso'</script>";
        return;
    }
}else{
    echo "<script>window.location='index.php?action=ingreso'</script>";
    return;
}

$ingreso = Registro_Ctr::Ingreso_Admin();

	if (isset($_GET["id"])) {

		$item = "id_estudiante";
		$valor = $_GET["id"];

		$Usuario = Registro_Ctr::Vista_Datos($item,$valor);

	}

	$materias = Calificaciones_ctr::Visualizar_Calificaciones_ctr(null);
?>
<?php
    include "views/modules/menu_adm.php";
?>	
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                	<h2>Calificaciones</h2>
                	<hr>
                    <form method="POST">
                        <div class="p-t-20">
                <center>             	
                	<table class=div-table>
                		<thead>
                			<tr class="div-table-row div-table-head">
                				<th class="div-table-cell">Materia</th>
                				<th class="div-table-cell">Nota Final</th>
                				<th class="div-table-cell">Estado</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php foreach ($materias as $key => $value): ?>
                				<tr> 
                					<td class="div-table-cell"><?php echo $value["nombre_materia"] ?></td>
                					<td class="div-table-cell"><?php echo $value["Promedio"] ?></td>
									<td class="div-table-cell"><?php 
										if($value["Promedio"] >= 16){
											echo "<h6 class='alert alert-success'>Aprobado</h6>";
										}elseif ($value["Promedio"] >= 12){
											echo "<h6 class='alert alert-warning'>Aprobado</h6>";
										}else{
											echo "<h6 class='alert alert-danger'>REPROBADO</h6>";
										}
									?></td>
                				</tr>
                			<?php endforeach ?>
                		</tbody>
                	</table>
                </center>		
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>	