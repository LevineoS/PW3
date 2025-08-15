<?php

session_start();

if(isset($_SESSION['nome'])){

    $nome = $_SESSION['nome'];
    echo"Olá, $nome! Bem vindo à minha Página";

}else{
    echo "<script>
    alert('Você não está logado')
    </script>";
}

?>