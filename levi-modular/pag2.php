<?php

session_start();

if(isset($_SESSION['nome'])){

$nome = $_SESSION['nome'];
echo "Bem Vindo $nome!";

}else{

echo"Você não está logado.";

}

?>