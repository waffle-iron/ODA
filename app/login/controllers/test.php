<?php
namespace App\login\controllers;

use System\PrincipalController;

class Test extends PrincipalController
{
    public function index()
    {
        echo "<hr>";
        echo "Metodo index de el controlador LOGIN que es DEFAULT";
        echo "<hr>";
    }
}
