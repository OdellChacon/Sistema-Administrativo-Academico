<?php
    if(isset($_SESSION["Docente"])){
        if($_SESSION["Docente"] != "ok"){
            echo "<script>window.location='index.php?action=ingreso'</script>";
            return;
        }
    }else{
        echo "<script>window.location='index.php?action=ingreso'</script>";
        return;
    }

    $ingreso = Registro_Ctr::Ingreso_Admin();
?>
<?php include "views/modules/menu_adm.php";?>
<div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Docente <small>(Inicio)</small></h1>
            </div>
        </div>
        <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=lista_salones"><i class="zmdi zmdi-male-female"></i></a></div>
                <div class="tile-name all-tittles" style="width: 90%;"><a href="index.php?action=lista_salones" style="color: black;"><strong>Aulas</strong></a></div>
                <div class="tile-num full-reset"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="index.php?action=Carga_Notas"><i class="zmdi zmdi-book"></i></a></div>
                <div class="tile-name all-tittles"><strong><a href="index.php?action=Carga_Notas" style="color: black;">Calificaciones</a></strong></div>
                <div class="tile-num full-reset"></div>
            </article>
            <article class="tile">
                <div class="tile-icon full-reset"><a href="horario/index.php" target="_black"><i class="zmdi zmdi-calendar"></i></a></div>
                <div class="tile-name all-tittles"><a href="horario/index.php" target="_black" style="color: black;"><strong>Horarios</strong></a></div>
                <div class="tile-num full-reset"></div>
            </article>
        </section>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "views/modules/footer.php"; ?>