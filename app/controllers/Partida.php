<?php  
namespace App\Controllers;
use System\PrincipalController;

class Partida extends PrincipalController
{
	function hola2()
	{
		echo "<hr>";
		echo "partida";
		echo "<hr>";
		$this->principal();
		echo "<hr>";
	}
}
