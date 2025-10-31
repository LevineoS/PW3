<?php

require 'Produto.class.php';


$p = new Produto();

$con = $p -> __construct();

if($con){

    echo"<h1> Conexão feita</h1>";

}else{

    echo"<h1>Erro ao Conectar</h1>";

}