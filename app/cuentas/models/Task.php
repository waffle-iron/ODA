<?php
namespace App\cuentas\models;
 
class Task extends Eloquent
{
    protected  $fillable = ['title','body'];

    public function index()
    {
    	echo "<hr>";
    	echo "TASKS CARGADA";
    	echo "<hr>";
    }
}