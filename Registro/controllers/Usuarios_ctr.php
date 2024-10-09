<?php

	require 'models/Usuarios_mdl.php';

	class Registro_Ctr{

////////////////////////////////////////////////////////////////Estudiantes//////////////////////////////////////////////////////////////////////////

		static public function Envio_Datos(){//Create

			if (isset($_POST["Nombre"])) {
					if (isset($_POST["Cedula"])) {
						$CED = $_POST["Tip_Ced"].$_POST["Cedula"];
					}
					$tabla = "estudiantes";
					$datos = array('nombre' => $_POST["Nombre"], 'apellido' => $_POST["Apellido"], 'edad' => $_POST["Edad"], 'cedula' => $CED, 'genero' => $_POST["Genero"] , 'numero' => $_POST["Numero"], 'correo' => $_POST["Correo"] , 'clave' => $_POST["Clave"] , 'nacimiento' => $_POST["Nacimiento"] , 'pais' => $_POST["Pais"] , 'ciudad' => $_POST["Ciudad"] , 'estado' => $_POST["Estado"] , 'direccion' => $_POST["Direccion"] , 'curso' => $_POST["Curso"] , 'condicion' => $_POST["Condicion"]);
	
					$mdl_resp = Registro_Mdl::Entrada_Datos($tabla,$datos);
	
					return $mdl_resp;
			}

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
	}
?>