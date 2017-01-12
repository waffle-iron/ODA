<?php
// Dividimos la URL.
require_once __DIR__ . '/vendor/autoload.php';
//Separando la cadena de la ruta en dos partes, la ruta para el modulo/clase/metodo y los parametros.
list($control,$parametros) = explode('?', $_SERVER['REQUEST_URI']);
$requestURI = explode( '/', $control );
// Eliminamos los espacios del principio y final
// y recalculamos los índices del vector.
$requestURI = array_values( array_filter( $requestURI ) );

//comprobamos si la baseUrl esta configurada.
//de no estarlo dara error.
if(baseUrl)
{
	//Verificando si la ruta MODULO -> CONTROLADOR -> METODO
	//esta completa.
	if($requestURI[1] and $requestURI[2])
	{
		//Modulo de hmvc
		$modulo = $requestURI[1];

		//controlador adentro de la carperta d e dicho modulo
		$controlador = $requestURI[2];

		//el metodo de ese controlador
		$metodo = $requestURI[3];

		list($nombreControlador,$ext) = explode('.', $controlador);
		//echo $requestURI[2];
		$nombreClase = ucfirst($nombreControlador);

		//colocamos la ruta completa de la clase haciendo uso de los namespace
		$cargarClase =  '\App\\'.$modulo.'\\controllers\\'.$nombreClase.'';

		//llamamos a la clase
		$controller = new $cargarClase();

		//Si no se pasa un tercer parametro URI entonces se sobre entiende de que 
		//el metodo a llamar es INDEX
		if (!$metodo) {
			$controller->index();
		}
		//llamamos al metodo
		$controller->$metodo();
	}
	else
	{
		/*
		Constantes para controlador default
		*/
		$controladorDefault = ClaseDefault;
		$metodoDefault = metodoDefault;

		//Verificamos si se configuro el controlador default que puede ser por ejemplo el login o alguna clase de verificador de roles.
		if($controladorDefault and $metodoDefault)
		{
			//llamamos al metodo.
			$controladorDefault::$metodoDefault();
		}
		else
		{
		    ob_start();
		    include('config/messages/controllerDefault.php');
		    echo ob_get_clean();
		}
	}
}
else
{
	//echo "Error, cofigure el baseUrl en config/config.php";
    ob_start();
    include('config/messages/baseUrl.php');
    echo ob_get_clean();
}


