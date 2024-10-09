<?php

	class Registro_Ctr{

	//Ingreso Al Sistema
	public function Ingreso_Admin(){
		if (isset($_POST["ingreso_email"])) {

			$tabla = "estudiantes";
			$item =  "Correo";
			$valor = $_POST["ingreso_email"];

			$mdl_resp = Registro_Mdl::Vista_Datos_ADM($tabla,$item,$valor);
			
			if(is_array($mdl_resp)){

					if ($mdl_resp["Correo"] == $_POST["ingreso_email"] && $mdl_resp["Clave"] == $_POST["ingreso_password"]){
						
						$_SESSION["Estudiante"] = "ok";

						echo '<script>
								if(window.history.replaceState){
									window.history.replaceState( null, null, window.location.href );
								}
									window.location = "index.php?action=index"
							</script>';
					}else{
						echo "<br><p class='alert alert-danger'>(Correo y/o contraseña no coinciden)</p>";
					}
				}else{
					echo '<script>

						if(window.history.replaceState){
							window.history.replaceState( null, null, window.location.href );
						}

					</script>';

					echo "<br><p class='alert alert-danger'>(Correo y/o contraseña no coinciden)</p>";
				}
		}
	}

////////////////////////////////////////////////////////////////Estudiantes//////////////////////////////////////////////////////////////////////////

		static public function Vista_Datos($item,$valor){//Read
			$tabla = "estudiantes";

			$mdl_resp = Registro_Mdl::Vista_Datos_MDL($tabla,$item,$valor);

			return $mdl_resp;
		}

		public function Act_Datas(){//Update
			if (isset($_POST["act_nombre"])) {
				
				if ($_POST["new_clave"] != "") {
					$password = $_POST["new_clave"];
				}else{
					$password = $_POST["actual_clave"];
				}	

				$tabla = "estudiantes";
				$datos = array('id_estudiante' => $_POST["id_estudiante"] ,'nombre' => $_POST["act_nombre"] ,'Apellido' => $_POST["act_Apellido"], 'correo' => $_POST["act_correo"], 'clave' => $password, 'Edad' => $_POST["Edad"] , 'Cedula' => $_POST["act_Cedula"] , 'Telefono' => $_POST["Numero"] , 'Pais' => $_POST["Pais"] , 'Estado' => $_POST["Estado"] , 'Ciudad' => $_POST["Ciudad"] , 'Direccion' => $_POST["Direccion"]);


				$mdl_resp = Registro_Mdl::Actualizar_Datos($tabla,$datos);
				return $mdl_resp;

				if ($mdl_resp == "ok") {
					echo "Usuario Actualizado";
				}
			}
		}


	
//////////////////////////////////////////////////////////////////Docentes////////////////////////////////////////////////////////////////////////////


		static public function Vista_Datos_DOC($item,$valor){//Read
			$tabla = "docentes";

			$mdl_resp = Registro_Mdl::Vista_Datos_DOC($tabla,$item,$valor);

			return $mdl_resp;
		}


///////////////////////////////////////////////////////////////Administrador//////////////////////////////////////////////////////////////////////////

		static public function Vista_Datos_ADM($item,$valor){//Read
			$tabla = "administradores";

			$mdl_resp = Registro_Mdl::Vista_Datos_ADM($tabla,$item,$valor);

			return $mdl_resp;
		}

//////////////////////////////////////////////////////////////////////Padres//////////////////////////////////////////////////////////////////////////

		static public function Envio_Padre(){//Create

			if (isset($_POST["Nombre_Padre"])) {

				if (isset($_POST["Cedula_Padre"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Padre"];
				}


				$tabla = "padres";
				$datos = array('Nombre' => $_POST["Nombre_Padre"] , 'Apellido' => $_POST["Apellido_Padre"] , 'Edad' => $_POST["Edad_Padre"] , 'Cedula' => $CED , 'Nacionalidad' => $_POST["Nacionalidad_Padre"] , 'Telefono' => $_POST["Telefono_Padre"] , 'Direccion' => $_POST["Direccion_Padre"] , 'Ocupacion' => $_POST["Ocupacion_Padre"] , 'Lugar_Trabajo' => $_POST["Lug_Trabajo_Padre"] , 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Padre"]);

				$mdl_resp = Registro_Mdl::Envio_Padre_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}

//////////////////////////////////////////////////////////////////////Madres//////////////////////////////////////////////////////////////////////////

		static public function Envio_Madre(){//Create

			if (isset($_POST["Nombre_Madre"])) {

				if (isset($_POST["Cedula_Madre"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Madre"];
				}

				$tabla = "madres";
				$datos = array('Nombre' => $_POST["Nombre_Madre"] , 'Apellido' => $_POST["Apellido_Madre"] , 'Edad' => $_POST["Edad_Madre"] , 'Cedula' =>  $CED, 'Nacionalidad' => $_POST["Nacionalidad_Madre"] , 'Telefono' => $_POST["Telefono_Madre"] , 'Direccion' => $_POST["Direccion_Madre"] , 'Ocupacion' => $_POST["Ocupacion_Madre"] , 'Lugar_Trabajo' => $_POST["Lug_Trabajo_Madre"] , 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Madre"]);

				$mdl_resp = Registro_Mdl::Envio_Madre_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}

//////////////////////////////////////////////////////////////Representantes//////////////////////////////////////////////////////////////////////////

			static public function Envio_Representantes(){//Create

			if (isset($_POST["Nombre_Representante"])) {

				if (isset($_POST["Cedula_Representante"])) {
					$CED = $_POST["Tip_Ced"].$_POST["Cedula_Representante"];
				}

				$tabla = "representantes";
				$datos = array('Nombre' => $_POST["Nombre_Representante"], 'Apellido' => $_POST["Apellido_Representante"], 'Cedula' => $CED,'Edad' => $_POST["Edad_Representante"], 'Parentesco' => $_POST["Parentesco"], 'Nacionalidad' => $_POST["Nacionalidad_Representante"], 'Direccion' => $_POST["Direccion_Representante"], 'Telefono' => $_POST["Telefono_Representante"], 'Ocupacion' => $_POST["Ocupacion_Representante"], 'Lug_Trabajo' => $_POST["Lug_Trabajo_Representante"], 'Telefono_Trabajo' => $_POST["Telefono_Trabajo_Representante"], 'Numero_Emergencia' => $_POST["Numero_Emergencia"]);
				$mdl_resp = Registro_Mdl::Envio_Representante_mdl($tabla,$datos);

				return $mdl_resp;
			}

		}


////////////////////////////////////////////////////////Constancia_Conducta////////////////////////////////////////////////////////

		static public function Visualizar_Cursos_ctr(){
			$tabla = 'cursos';
			$mdl_resp = Registro_mdl::Visualizar_Cursos_mdl($tabla);
			return $mdl_resp;
		}

	}
?>